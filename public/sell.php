<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        // validate submission
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("You left a field blank! Please enter the symbol for the stock you wish to sell and the number of shares to sell.");
        }
        
        else
        {
            $row = query("SELECT symbol, shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            $stock = lookup($_POST["symbol"]);
            
            // query to see if it exists stringtoupper is used to ensure both strings are same case) 
            if (!$row || ($row[0]["symbol"] !== $_POST["symbol"]))
            {
                apologize("You don't own that stock!");
            }
            
            // if quantity trying to sell is more than what is owned - apologize
            else if ($row[0]["shares"] < $_POST["shares"])
            {
                apologize("You don't own that many shares!");
            }
              
            // if quantity owned is enough to sell
            else if ($row[0]["shares"] >= $_POST["shares"])
            { 
                // reduce the quantity of shares owned
                query("UPDATE portfolio SET shares = (shares - ?) WHERE id = ? AND symbol = ?", $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);
                
                // update cash to reflect sale
                query("UPDATE users SET cash = (cash + ? * ?) WHERE id = ?", $_POST["shares"], $stock["price"], $_SESSION["id"]);
                
                // update history table
                query("INSERT INTO history (id, time, type, symbol, name, shares, price) VALUES (?, NOW(), ?, ?, ?, ?, ?)",
                    $_SESSION["id"], "sell", strtoupper($stock["symbol"]), $stock["name"], $_POST["shares"], $stock["price"]);
                
                // redirect to portfolio
                redirect("/");
            }            
        }
    }
    else
    {
        // else render form
        render("sell_form.php", ["title" => "Sell"]);
    }

?>

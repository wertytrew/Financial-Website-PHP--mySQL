<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
        // don't allow blank form fields
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("You left a field blank! Please enter a stock symbol and the number of shares you wish to purchase.");
        }
        
        $stock = lookup($_POST["symbol"]);
        
        // stock doesn't exist or incorrectly typed
        if ($stock === false)
        {
            apologize("Symbol not found");
        }
          
        // can they afford it?
        $cash = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        if ($cash[0]["cash"] < ($stock["price"] * $_POST["shares"]))
        {
            apologize("You don't have enough funds!");
        }
          
        // update portfolio table with condition 
        query("INSERT INTO portfolio (id, symbol, shares) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + ?", 
            $_SESSION["id"], strtoupper($_POST["symbol"]), $_POST["shares"], $_POST["shares"]);
            
        // update user table cash
        query("UPDATE users SET cash = cash - (? * ?) WHERE id = ?", $_POST["shares"], $stock["price"], $_SESSION["id"]);
        
        // update history table
        query("INSERT INTO history (id, time, type, symbol, name, shares, price) VALUES (?, NOW(), ?, ?, ?, ?, ?)",
            $_SESSION["id"], "buy", strtoupper($stock["symbol"]), $stock["name"], $_POST["shares"], $stock["price"]);
        
        // redirect to portfolio
        redirect("/");
    }
    
    else
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }

?>

<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // user left username or password blank or password and confirmation password do not match
        if ((empty($_POST["username"]) || empty($_POST["password"])) || ($_POST["password"] !== $_POST["confirmation"]))
        {
            // apologize
            apologize("Please try again. A field was blank or the password and confirmation did not match.");
        }

        // add user to database
        $result = query("INSERT INTO users (username, hash, cash) VALUES (?, ?, 10000.0000)", $_POST["username"], crypt($_POST["password"]));
        
        // apologize if duplicate
        if ($result === false)
        {
            apologize("That username is taken. Please try another.");
        }
        
        else
        {
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $rows[0]["id"];
            
            // redirect to portfolio
            redirect("/");
        }
            
        // log the user in      
    }
    
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

?>

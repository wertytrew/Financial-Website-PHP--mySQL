<?php

    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // user left a field blank or password and confirmation password do not match
        if (empty($_POST["password"]) || empty($_POST["confirmation"]))
        {
            // apologize
            apologize("Please try again. A field was blank.");
        }
        
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            // apologize
            apologize("Please try again. The fields did not match.");
        }

        else if ($_POST["password"] === $_POST["confirmation"])
        {
            // change password
            query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["password"]), $_SESSION["id"]);

            // redirect to portfolio
            redirect("/"); 
        }  
    }
    
    else
    {
        // else render form
        render("reset_form.php", ["title" => "Reset Password"]);
    }

?>

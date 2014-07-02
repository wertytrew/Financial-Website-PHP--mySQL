<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if lookup was not successful
        if (lookup($_POST["symbol"]) === false)
        {
            apologize("Symbol not found");
        }
        
        else
        {
            // render stock quote display
            render("display_stock_form.php", ["title" => "Price"]);
        }
    }
    
    else
    {
        // else render form
        render("submit_stock_form.php", ["title" => "Stock Quote"]);
    }

?>

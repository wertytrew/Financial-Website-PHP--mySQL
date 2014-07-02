<?php

    // configuration
    require("../includes/config.php");
    
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);
    $balance = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => strtoupper($row["symbol"]),
                "total" => number_format(($stock["price"] * $row["shares"]), $decimals = 2 , $dec_point = "." , $thousands_sep = ","),
                "cash" => number_format($balance[0]["cash"], $decimals = 2 , $dec_point = "." , $thousands_sep = ",")
            ];
        }
    }

    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio"]);

?>

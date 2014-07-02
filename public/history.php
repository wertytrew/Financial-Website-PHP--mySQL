<?php

    // configuration
    require("../includes/config.php");
    
    $balanceRows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $balance = number_format($balanceRows[0]["cash"], $decimals = 2 , $dec_point = "." , $thousands_sep = ",");
    $histRows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    $histories = [];
    foreach ($histRows as $histRow)
    {
        $histories[] = [
            "time" => $histRow["time"],
            "symbol" => strtoupper($histRow["symbol"]),
            "name" => $histRow["name"],
            "shares" => $histRow["shares"],
            "price" => $histRow["price"],
            "type" => $histRow["type"],
            "total" => number_format(($histRow["price"] * $histRow["shares"]), $decimals = 2 , $dec_point = "." , $thousands_sep = ",")
        ];
    }

    // render portfolio
    render("history_view.php", ["balance" => $balance, "histories" => $histories, "title" => "History"]);

?>

<!-- 
    portfolio.php
    This handles grabbing the stocks in the user's portfolio. 
-->

<?php 

    // configuration
    require("../includes/config.php");
    
    // create an array of stocks
    $positions = [];
    
    // quert the table to select the user who is currently logged in 
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);
    
    // make sure the query does not return false
    if ($rows === false)
    {
        apologize("The stocks cannot be found.");
        
    }
    
    // create a table of the stock and shares the user owns
    foreach($rows as $row)
    {
        // lookup the stock
        $stock = lookup($row["symbol"]);
        
        // define each entry on the table before passing to portfolio.php
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    
    // select the user's cash
    $rows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    // make sure the query does not return false
    if ($rows === false)
    {
        apologize("There is no cash.");
    }
    
    // store the cash 
    $cash = $rows[0]["cash"];
    
    // render the portfolio_form 
    render("../forms/portfolio_form.php", ["cash" => $cash, "positions" => $positions]);
    

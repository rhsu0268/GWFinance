<!-- 
    sell.php
    This handles selling of a stock.  
-->

<?php 

    // configuration
    require("../includes/config.php");
    
    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // make sure the user selects a stock to sell
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a stock to sell.");
        }
        
        // lookup the price of the stock that the user whats to sell 
        $stock = lookup($_POST["symbol"]);
        
        // select the shares the user has
        $rows = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"],
        $_POST["symbol"]);
        
        // make sure the query is not false
        if ($rows == false)
        {
            apologize("The shares of stock cannot be found.");
        } 
        
        // store the shares
        $shares = $rows[0]["shares"];
        
        // update the cash
        $balance = query("UPDATE users SET CASH = cash + ? WHERE id = ?", 
        $shares * $stock["price"], $_SESSION["id"]);
        
        // make sure the query does not return false
        if ($balance === false)
        {
            apologize("The cash cannot be updated.");
        }

        // delete the stock from the user's portfolio 
        $transaction = query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], 
        $_POST["symbol"]);
        
        // make sure the query does not return false
        if ($transation === false)
        {
            apologize("The stock cannot be deleted from the portfolio.");
        }
        
        // update the history table
        $record = query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)",
        $_SESSION["id"], 'SELL', $stock["symbol"], $shares, $stock["price"]);
            
        // make sure the query does not return false
        if ($record === false)
        {
            apologize("The history table cannot be updated.");
        }
        
        // redirect the user to portfolio for processing
        redirect("portfolio.php");
    }
    else 
    {
        // execute a query to figure out the stocks the user owns
        $rows = query("SELECT symbol FROM portfolio WHERE id = ? ORDER BY symbol", $_SESSION["id"]);
        
        // make sure the query is not false
        if ($rows === false)
        {
            apologize("The stock symbols cannot be found.");
        }
        
        // define an array for the stock symbols
        $symbols = []; 
        
        // store the stock symbols
        foreach($rows as $row)
        {
            // add the stock symbol to the symbols array
            $symbols[] = $row["symbol"];
        }
        
        // render sell_form.php  
        render("sell_form.php", ["symbols" => $symbols]);
    }

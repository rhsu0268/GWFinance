<!-- 
    buy.php
    This handles the buying of a stock. 
-->

<?php 

    // configuration
    require("../includes/config.php");
    
    // else if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate the fields 
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("You must enter a valid symbol and shares to buy.");
        }
        
        // make sure the shares is not a fraction or negative
        if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            apologize("You must enter a valid number of shares to buy.");
        }
        
        // lookup the stock the user wants to buy
        $stock = lookup($_POST["symbol"]);
        
        // lookup the cash the user has
        $rows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // make sure the query is not false
        if ($rows === false)
        {
            apologize("The cash cannot be found.");
        }
        
        // store the user's cash 
        $cash = $rows[0]["cash"];
        
        // make sure the user can afford it 
        if (($stock["price"] * $_POST["shares"]) > $cash)
        {
            apologize("You cannot afford to buy this stock.");
        }
        
        // add the stock to the portfolio 
        else
        {
        
            $purchase = query("INSERT INTO portfolio (id, symbol, shares) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], 
            $stock["symbol"], $_POST["shares"]);
            
            // make sure the query does not return false
            if ($purchase === false)
            {
                apologize("The stock cannot be added to the portfolio");
            }
            
            // update the user's cash 
            $balance = query("UPDATE users SET CASH = cash - ? WHERE id = ?", 
            $stock["price"] * $_POST["shares"], $_SESSION["id"]);
            
            // make sure the query does not return false
            if ($balance === false)
            {
                apologize("The cash cannot be updated.");
            }
            
            // update the history table
            $record = query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)",
            $_SESSION["id"], 'BUY', $stock["symbol"], $_POST["shares"], $stock["price"]);
            
            // make sure the query does not return false
            if ($record === false)
            {
                apologize("The history table cannot be updated.");
            }
            
            // direct the user to portfolio for processing
            // redirect the user to the portfolio page
            redirect("portfolio.php");
        }
    }
    else 
    {
        // render form 
        header("Location: ../forms/buy_form.php");
    }

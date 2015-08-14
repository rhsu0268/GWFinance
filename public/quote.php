<!-- 
    quote.php
    This handles looking up a stock to give the user a quote. 
-->

<?php 

    // configuration 
    require("../includes/config.php"); 
    
    // if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate the input
        if (empty($_POST["symbol"]))
        {
            apologize("You must enter a stock symbol");
        }
        // lookup the stock quote
        $stock = lookup($_POST["symbol"]);
        
        if ($stock === false)
        {
            apologize("The stock cannot be found.");
        }
        else
        {
            // render the quote 
            render("quote.php", ["stock" => $stock, "title" => "Quote"]);
        }
    }
    else 
    {
        // render form 
        header("Location: ../forms/quote_form.php");
    }

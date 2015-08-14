<!-- sell_form.php -->
<!-- This is a file that displays the interface for selling stocks. -->
<html>
<head>
    <title>GW Finance</title>
    
   
    <link rel="stylesheet" type="text/css" href="../public/sell_form.css"/>
    
</head>
<body>
    <h1 id="title"><a href="../public/portfolio.php">GW Finance</a></h1>
    
    <form id="buy" action="../public/sell.php" method="post">
        <fieldset class="account-info">   
        <label>
            Stock:
        <select class="menu" name="symbol">
            <option value=""></option>
                <?php 
                    
                    // for each stock symbol, we can print the value
                    foreach ($symbols as $symbol)
                    {
                        print("<option value ='{$symbol}'>" . $symbol . "</option>");
                    }
                ?>
        </select> 
        </label>  
        </fieldset>
        <fieldset class="account-action">
        <input class="btn" type="submit" name="submit" value="Sell">
        <br>
        <br>
        
      
        </fieldset>
        
    </form>
    <br>
   
       
    
   
</body>

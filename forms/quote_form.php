<!-- apology.php -->
<!-- This is a file that dispalys the form for getting a quote on a stock.å -->

<html>
<head>
    <title></title>
    
   
    <link rel="stylesheet" type="text/css" href="../public/quote.css"/>
    
</head>
<body>
    <h1 id="title"><a href="../public/portfolio.php">GW Finance</a></h1>
    
    <form id="quote" action="../public/quote.php" method="post">
        <fieldset class="account-info">
        <label>
            Stock:<input type="text" name="symbol">
        </label>
        </fieldset>
        <fieldset class="account-action">
        <input class="btn" type="submit" name="submit" value="Look Up">
        <br>
        <br>
        
      
        </fieldset>
        
    </form>
    <br>
  
</body>
</html>

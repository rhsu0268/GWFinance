<!-- buyForm.php -->
<!-- This is a file that displays the interface of the buy_form. -->

<html>
<head>
    <title>GW Finance</title>
    
   
    <link rel="stylesheet" type="text/css" href="../public/buy_form.css"/>
    
</head>
<body>
    <h1 id="title"><a href="../public/portfolio.php">GW Finance</a></h1>
    
    <form id="buy" action="../public/buy.php" method="post">
        <fieldset class="account-info">
        <label>
            Stock:<input type="text" name="symbol">
        </label>
        <label>
            Shares:
        <input type="shares" name="shares">
        </label>
        </fieldset>
        <fieldset class="account-action">
        <input class="btn" type="submit" name="submit" value="Buy">
        <br>
        <br>
        
      
        </fieldset>
        
    </form>
    <br>
   
       
    
   
</body>
</html>

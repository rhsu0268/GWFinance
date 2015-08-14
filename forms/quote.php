<!-- quote.php -->
<!-- This is a file displays information about the quote to the user. -->

<html>
<head>
    <title>GW Finance</title>
    
   
    <link rel="stylesheet" type="text/css" href="../public/quote2.css"/>
    
</head>
<body>
    <h1 id="title"><a href="../public/portfolio.php">GW Finance</a></h1>
    
    <form id="quote2" action="../public/quote.php" method="post">
        <div class="account-info">
        <label>
            Stock:
        </label>
            <div id ="statement">
            <?php 
                print("A share of &nbsp" . $stock["name"] . 
                "&nbsp(" .$stock["symbol"] . ")&nbsp costs &nbsp$" . 
                number_format($stock["price"], 2) . ".");
                
                print("<br>" . "<br>");
             ?>
            </div>
        
        </div>
        <div class="account-action">
        <a href="../forms/quote_form.php"><input class="btn" type="back" name="back" value="Back"></a>
        <br>
        <br>
        
      
        </div>
        
    </form>
    <br>
   
       
    
   
</body>
</html>

<!-- portfolio.php -->
<!-- This is a file that displays the user's portfolio. -->

<html>
    <title>GW Finance</title>
    <style>
    h1
    {
        text-align: center;
        font-size: 40px;
    }
    #menu
    {
        text-align: center;
      
        
      
    }
    ul#menu li
    {
        display: inline;
        border: 4px solid #256F5C;
        background-color: #6FA698;
     
       
      
    }
    ul#menu li a
    {
        padding: 10px 20px;
        text-decoration: none;
        color: black;
           
        
    }
    
    table
    {
        border-collapse: collapse;
        border: 1px solid green;
       
    }
    
    table td
    {
        color: green;
    }
    
    /* center the table */
    table.center
    {
        margin-left: auto;
        margin-right: auto;
    }
    </style>
<body>
    <h1>GW Finance</h1>
    <!-- create the menu at the top -->
    <ul id ="menu">
        <li><a href="../public/quote.php">Quote</a></li>
        <li><a href="../public/buy.php">Buy</a></li>
        <li><a href="../public/sell.php">Sell</a></li>
        <li><a href="../public/history.php">History</a></li>
        <li><a href="../public/logout.php">Logout</a></li>
    </ul>
    <br>
    
    <!-- formats the table -->
    <table class="center" border "10" style "width: 100%">
    <col width = "180">
    <col width = "180">
    <col width = "180">
    <col width = "180">
    <col width = "180">
    <tr>
        <td><b>Symbol</b></td>
        <td><b>Name</b></td>
         <td><b>Shares</b></td>
        <td><b>Price</b></td>
        <td><b>TOTAL</b></td>
    </tr>
    
    <!-- skip a line -->
    
        <?php 
            // print out the stock table for the user
            foreach ($positions as $position)
            {
                print("<tr>");
                print("<td>" . $position["symbol"] . "</td>");
                print("<td>" . $position["name"] . "</td>");
                print("<td>" . $position["shares"] . "</td>");
                print("<td>$" . number_format($position["price"], 2) . "</td>");
                print("<td>$" . number_format($position["price"] * $position["shares"] , 2) . "</td>");
                print("</tr>");
            }
        ?>
        
        <!-- display the cash -->
        <tr>
            <td><b>CASH<b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php print(number_format($cash, 2)); ?></td>
        
    </table>

   
</body>

</html>

<!-- history_form.php -->
<!-- This is a file that displays the user's transactions. -->

<html>
    <title>GW Finance</title>
    <style>
    h1
    {
        text-align: center;
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
    <h1 id="title"><a href="../public/portfolio.php">GW Finance</a></h1>
    
    <!-- create the menu at the top -->
    
    <!-- formats the table -->
    <table class="center" border "10" style "width: 100%">
    <col width = "180">
    <col width = "180">
    <col width = "180">
    <col width = "180">
    <col width = "180">
    <tr>
        <td><b>Transaction</b></td>
        <td><b>Date/Time</b></td>
        <td><b>Symbol</b></td>
        <td><b>Shares</b></td>
        <td><b>Price</b></td>
    </tr>
    
    <!-- skip a line -->
        <?php 
            foreach ($transactions as $transaction)
            {
                print("<tr>");
                print("<td>" . $transaction["transaction"] . "</td>");
                print("<td>" . date('m/d/y, g:i A', strtotime($transaction["date"])) . "</td>");
                print("<td>" . $transaction["symbol"] . "</td>");
                print("<td>" . $transaction["shares"] . "</td>");
                print("<td>$" . number_format($transaction["price"], 2) . "</td>");
                print("</tr>");
            }
        ?>
        
    </table>

   
</body>

</html>

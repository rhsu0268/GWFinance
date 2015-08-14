<!-- 
    history.php
    This handles displaying the history table. 
-->

<?php

    // configuration
    require("../includes/config.php");
   
    // query the table to select the user's history 
    $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    // make sure the query does not return false
    if ($rows === false)
    {
        apologize("The transaction history cannot be found.");
    }

    // render portfolio
    render("history_form.php", ["transactions" => $rows]);

?>


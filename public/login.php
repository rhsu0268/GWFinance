<!-- 
    login.php
    This handles logging in the user. 
-->

<?php

    // configuration
    require("../includes/config.php"); 

    // check to make sure that the form fields are filled in 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate the submission 
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("You must provide a username and password!\n");
            
        }
      
        // query the database for the user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        
        if (count($rows) == 1)
        {
            $row = $rows[0];
        }
        
        // compare the hash of the user's password to that stored in the table 
        if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
        {
            // remember the user is logged in 
            $_SESSION["id"] = $row["id"];
            
            // redirect to portfolio
            redirect("../public/portfolio.php");
        }
        else
        {
            print("Invalid username/password!");
        }
        
    }

?>

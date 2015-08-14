 <!-- 
    register.php
    This handles registering the user. 
-->
<?php
    
    // configuration 
    require("../includes/config.php");

    // check to make sure that the form fields are filled in 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate the submission 
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username!");
           
        }
        
        if (empty($_POST["password"]) || empty($_POST["confirmation"]))
        {
            apologize("You must provide a password and confirm it!");
           
        }
        
        // make sure the passwords match 
        if (($_POST["password"]) !== ($_POST["confirmation"]))
        {
            apologize("The passwords did not match.");
        }
        
        // make sure the password is six characters long
        if (strlen($_POST["password"]) != 6)
        {   
            apologize("Your password must contain six characters!");
       
        }
        
        // make sure the password is not entirely alphabetic or numeric
        if (is_numeric($_POST["password"]))
        {
            apologize("Your password must not contain only numeric characters!");
        }
        
        if (ctype_alpha($_POST["password"]))
        {
            apologize("Your password must not contain only alphabetical characters!");
        }
        
        // if valid, add the user to the database
        $result = query("INSERT INTO users (username, hash, cash) VALUES (?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
       
        // check the query to make sure it is not false
        if ($result === false)
        {
            apologize("Your username matches one in the database");
        }
        
        // log them in 
        // find out which id is assigned to the user
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        
        // store the id 
        $_SESSION["id"] = $rows[0]["id"];
        
        // redirect the user to the portfolio form
        redirect("portfolio.php");
    }

?>

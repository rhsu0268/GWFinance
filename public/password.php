 <!-- 
    password.php
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
        
        if (empty($_POST["new_password"]) || empty($_POST["confirmation"]))
        {
            apologize("You must provide a new password and confirm it!");
           
        }
        
        // make sure the passwords match 
        if (($_POST["new_password"]) !== ($_POST["confirmation"]))
        {
            apologize("The passwords did not match.");
        }
        
        // make sure the password is six characters long
        if (strlen($_POST["new_password"]) != 6)
        {   
            apologize("Your password must contain six characters!");
       
        }
        
        // make sure the password is not entirely alphabetic or numeric
        if (is_numeric($_POST["new_password"]))
        {
            apologize("Your password must not contain only numeric characters!");
        }
        
        if (ctype_alpha($_POST["new_password"]))
        {
            apologize("Your password must not contain only alphabetical characters!");
        }
        
        // select the user from the database 
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        
        if (count($rows) == 1)
        {
            $row = $rows[0];
        }
        
        // if valid, update the user's password
        $result = query("UPDATE users SET hash = ? WHERE username = ?", crypt($_POST["new_password"]), $row["username"]);
       
        // check the query to make sure it is not false
        if ($result === false)
        {
            apologize("Your password cannot be updated.");
        }
        
        // log them in
        // store the id 
        $_SESSION["id"] = $row["id"];
        
        // redirect the user to the portfolio form
        redirect("portfolio.php");
    }

?>

<!-- 
    logout.php
    This handles logging out the user. 
-->

<?php

    // configuration
    require("../includes/config.php"); 

    // log out current user, if any
    logout();

    // redirect user
    redirect("index.php");

?>


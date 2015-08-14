<!-- password_form.php -->
<!-- This is a file that displays the register interface. -->

<html>
<head>
    <title>GW Finance</title>
    
   
       <link rel="stylesheet" type="text/css" href="../public/index.css">
    
</head>
<body>
    <h1 id="title">GW Finance</h1>
    
    <form id="login" action="../public/password.php" method="post">
        <fieldset class="account-info">
        <label>
            Username<input type="text" name="username">
        </label>
        <label>
            New Password
        <input type="password" name="new_password">
        </label>
         <label>
            New Password (ReType)
        <input type="password" name="confirmation">
        </label>
        </fieldset>
        <fieldset class="account-action">
        <input class="btn" type="submit" name="submit" value="Submit">
      
        </fieldset>
    </form>

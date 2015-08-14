<!-- register_form.php -->
<!-- This is a file that displays the registration form to the user -->

<html>
<head>
    <title>GW Finance</title>
    
   
       <link rel="stylesheet" type="text/css" href="../public/index.css">
    
</head>
<body>
    <h1 id="title">GW Finance</h1>
    
    <form id="login" action="../public/register.php" method="post">
        <fieldset class="account-info">
        <label>
            Username<input type="text" name="username">
        </label>
        <label>
            Password
        <input type="password" name="password">
        </label>
         <label>
            Password (ReType)
        <input type="password" name="confirmation">
        </label>
        </fieldset>
        <fieldset class="account-action">
        <input class="btn" type="submit" name="submit" value="Register">
      
        </fieldset>
    </form>

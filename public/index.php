<!-- 
    index.php
    This displays the login form to the user. 
-->

<html>
<head>
    <title>GW Finance</title>
    
   
       <link rel="stylesheet" type="text/css" href="index.css"/>
    
</head>
<body>
    <h1 id="title">GW Finance</h1>
    
    <form id="login" action="login.php" method="post">
        <fieldset class="account-info">
        <label>
            Username<input type="text" name="username">
        </label>
        <label>
            Password
        <input type="password" name="password">
        </label>
        </fieldset>
        <fieldset class="account-action">
        <input class="btn" type="submit" name="submit" value="Login">
        <br>
        <br>
        <a href="../forms/register_form.php"><input class="btn" type="register" name="register" value="Register"></a>
       
        
        </fieldset>
        
    </form>
    <br>
    <div style="text-align: center">
        <a href="../forms/password_form.php">Forgot your password?</a>
    </div>    
    
   
</body>
</html>

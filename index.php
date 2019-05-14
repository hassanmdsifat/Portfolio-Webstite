<?php
    session_start();
    $msg1="";
    $msg2="";
    $msg3="";
    ///validating if any error occurs
    if(isset($_GET['e']))
    {
        if($_SESSION['name']==1)
            $msg1="*Email Cannot be empty!!";
        else if($_SESSION['pass']==1)
            $msg2="Password cannot be empty!!";
        else if($_SESSION['error']==1)
        {
            $msg3="*Invalid name or Password!!";
        }
    }
    $_SESSION["name"]="";
    $_SESSION["pass"]="";
    $_SESSION["error"]="";


?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body align="center">
        <fieldset>
            <legend>LogIn</legend>
            <form method="post" action="valid.php">
                <input type="text" name="name" placeholder="Enter your Email">
                <br><?=$msg1?><br>
                <input type="password" name="pass" placeholder="Enter Your Password">
                <br><?=$msg2?><?=$msg3?><br>
                <input type="submit" name="submit" id="one">
                <br> <span class="reg"> <a href="register.php" >Register!!!</span>
            </form>
        </fieldset>
    </body>
</html>
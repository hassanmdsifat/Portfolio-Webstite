<?php
    $msg0="";
    $msg1="";
    $msg2="";
    $msg3="";
    $msg4="";
    $msg5="";
    $msg6="";
    $msg7="";
    $msg8="";
    $msg9="";
    $msg10="";
    $msg11="";
    session_start();
    if(isset($_GET['e']))
    {
        if($_SESSION["msg0"]==1)
        {
            $msg0="First Name cannot be empty!!";
        }
        if($_SESSION["msg1"]==1)
        {
            $msg1="First Name must contain at least 5 character";
        }
        
        if($_SESSION["msg2"]==1)
        {
            $msg2="Last Name cannot be empty!!";
        }
        if($_SESSION["msg3"]==1)
        {
            $msg3="Last Name must contain at least 5 character";
        }
        if($_SESSION["msg4"]==1)
        {
            $msg4="Email Cannot be empty!!";
        }
        if($_SESSION["msg5"]==1)
        {
            $msg5="Select Date Of Birth";
        }
        if($_SESSION["msg6"]==1)
        {
            $msg6="Password Must contain 1 small,captial,number and 8 character atleast!!";
        }
        if($_SESSION["msg7"]==1)
        {
            $msg7="Password cannot be empty!!";
        }
        if($_SESSION["msg8"]==1)
        {
            $msg8="Password and Repeat Password doesnot match!!";
        }
        if($_SESSION["msg9"]==1)
        {
            $msg9="Phone number cannot be empty!!";
        }
        if($_SESSION["msg10"]==1)
        {
            $msg10="Phone number should be 11 character";
        }
        if($_SESSION["msg11"]==1)
        {
            $msg11="User Already Exist!!";
        }

    }
    $_SESSION["msg0"]=$_SESSION["msg1"]=$_SESSION["msg2"]=$_SESSION["msg3"]=$_SESSION["msg4"]=$_SESSION["msg5"]=$_SESSION["msg6"]=$_SESSION["msg7"]="";
    $_SESSION["msg8"]=$_SESSION["msg9"]=$_SESSION["msg10"]=$_SESSION["msg11"]="";
?>

<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body align="center">
        <fieldset>
            <legend>SIGN UP</legend>
            <form method="post" action="regvalid.php">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname">
                <br><?=$msg1?><?=$msg0?><br>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname">
                <br><?=$msg2?><?=$msg3?><br>
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
                <br><?=$msg4?><br>
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone">
                <br><?=$msg9?><?=$msg10?><br>
                <label for="dob">Date of Birth</label>
                <input id="dob" type="date" name="bday">
                <br><?=$msg5?><br>
                <label for="pass">Password</label>
                <input id="pass" type="Password" name="pass">
                <br><?=$msg6?><?=$msg7?><br>
                <label for="Rpass">Repeat Password</label>
                <input id="Rpass" type="Password" name="rpass">
                <br><?=$msg8?><br>
                <input type="submit" name="submit">
                <br><?=$msg11?>
            </form>
        </fieldset>
    </body>
</html>
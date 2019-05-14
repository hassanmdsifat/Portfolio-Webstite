<?php
    ///logout from current session
    if(isset($_SESSION["id"]))
    {
        $_SESSION["id"]="";
        $_SESSION["name"]="";
        session_destroy();
        header("Location:index.php");
    }
    else
    {
        header("Location:index.php");
    }
?>
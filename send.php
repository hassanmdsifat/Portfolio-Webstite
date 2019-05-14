<?php
    session_start();
    if($_SESSION["name"]=="")
        header("Location:logout.php");
    else
    {
        $message=trim($_POST["message"]);
        if($message!="")
        {
            $con = mysqli_connect("localhost","root","","final");
	        if($con->connect_error)
                die("Error in Connection:".$con->connect_error());
            
                $sql = "INSERT INTO chat (user,message,reply,status) VALUES (?,?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssss", $email, $mes, $reply,$status);
                $email = $_SESSION["name"]; $mes=$message;$reply="";$status="P";
                $stmt->execute();
                //echo $email;
                //echo $mes;
                //echo $status;
                echo "<script> sleep(1);alert('Send Successfuly');</script>";
                header("Location:portfolio.php");
        }
        else
        {
            header("Location:contact.php?e=0");
        }
    }
?>
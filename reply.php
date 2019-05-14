<?php
    session_start();
    if($_SESSION["name"]=="")
    {
        header("Location:logout.php");
    }
    else
    {
        if(isset($_POST["submit"]))
        {
            $id=$_GET["msg"];
            $msg=$_POST["$id"];
            if($msg=="")
            {
                header("Location:admin.php?e=0");
            }
            else
            {
                $con = mysqli_connect("localhost","root","","final");
	            if($con->connect_error)
                    die("Error in Connection:".$con->connect_error());
                $sql="update chat set reply='$msg',status='R' where id='$id'";
                $result = $con->query($sql);
                header("Location:admin.php");
            }
        }
        if(isset($_POST['delete']))
        {
            echo $id=$_GET["msg"];
            $con = mysqli_connect("localhost","root","","final");
	        if($con->connect_error)
                    die("Error in Connection:".$con->connect_error());
            $sql="update chat set status='D' where id='$id'";
            $result = $con->query($sql);
            header("Location:admin.php");
        }
    }
?>
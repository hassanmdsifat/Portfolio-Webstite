<?php
    session_start();
    if($_SESSION["name"]=="")
    {
        header("Locaion:logout.php");
    }
    $msg="";
    if(isset($_GET['e']))
    {
        echo "<script> alert('Reply Box Empty');</script>";
    }
?>
<html>
    <head>
        <title>Messages</title>
        <link rel="stylesheet" href="style/style4.css">
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
        <?php
            $con = mysqli_connect("localhost","root","","final");
            if($con->connect_error)
                die("Error in Connection:".$con->connect_error());
                $sql = "select * from chat where status='P' order by id desc";
	            $result = $con->query($sql);
                $countOfRow =  $result->num_rows;
                if($countOfRow>0)
                {
                    $name="";
                    while($row = $result->fetch_assoc()){
                        $name=$row["id"];
                        echo "<div class='chatbox'>";
                        echo "<form method='post' action='reply.php?msg=$name' >";
                            echo "User Name: ".$row["user"]."<br>";
                            echo "Message: ".$row["message"]."<br>";
                            $_SESSION["cmsg"]=$name;
                            echo "<textarea row='4' cols='50' placeholder='reply message' name=$name></textarea>";
                            echo "<input type='submit' name='submit'>";
                            echo "<input type='submit' name='delete' value='delete'>";
                            echo $msg;
                        echo "</form>";
                        echo "</div>";

                    }
                }
        ?>
        <a href="logout.php" align="center">Logout!!</a>
    </body>
</html>
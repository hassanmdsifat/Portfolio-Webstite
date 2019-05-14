<?php

    $msg1="";
    session_start();
    if($_SESSION["name"]=="")
        header("Location:logout.php");
    if(isset($_GET['e']))
    {
        $msg1="*Message Field Cannot be empty!!";
    }
?>
<html>
    <head>
        <title>Contact US!</title>
        <link rel="stylesheet" href="style/style3.css">
    </head>
    <body>
        <div class="main-box" style="width:800px">
            <form method="post" action="send.php">
                <textarea rows="4" cols="50" name="message" placeholder="Enter Your Text.." class="box"></textarea>
                <br><?=$msg1?><br>
                <input type="submit" name="submit">
            </form>
        </div>
        <?php
            $con = mysqli_connect("localhost","root","","final");
            if($con->connect_error)
                die("Error in Connection:".$con->connect_error());
                $sql = "select * from chat where status='P' or status='R' order by id desc";
	            $result = $con->query($sql);
                $countOfRow =  $result->num_rows;
                if($countOfRow>0)
                {
                    $name="";
                    while($row = $result->fetch_assoc()){
                        $name=$row["id"];
                        echo "<div class='chatbox' style='margin-left:200px;font-size:20px;color:white;background:blue;width:800px;margin-top:5px;padding:2px;'>";
                        echo "<form method='post' action='reply.php?msg=$name' >";
                            echo "User Name: ".$row["user"]."<br>";
                            echo "Message: ".$row["message"]."<br>";
                            if($row["reply"]!="")
                            {
                                echo "Reply: ".$row["reply"];
                            }
                            $_SESSION["cmsg"]=$name;
                        echo "</form>";
                        echo "</div>";

                    }
                }
        ?>
    </body>
</html>

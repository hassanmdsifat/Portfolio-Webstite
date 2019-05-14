<?php
    $con = mysqli_connect("localhost","root","","final");
    if(isset($_POST['submit']))
    {
       $n=trim($_POST['name']);
       $p=trim($_POST['pass']);
       $name=mysqli_real_escape_string($con,$n);
       $pass=mysqli_real_escape_string($con,$p);
       $cnt=0;
       //if name is empty or not
       if($name=="")
       {
           $cnt=1;
           $_SESSION["name"]=1;
       }

       //if password field is empty or not
       if($pass=="")
       {
           $cnt=1;
           $_SESSION["pass"]=1;
       } 
       else
       {
            if($con->connect_error)
                die("Error in Connection:".$con->connect_error());
            $sql = "select * from login where mail='$name' and password='$pass' and status='V'";
            $result = $con->query($sql);
            $countOfRow =  $result->num_rows;
            session_start();
            if($countOfRow==1)
            {
                $type;
                while($row=$result->fetch_assoc())
                {
                    $_SESSION['id']=$row['id'];
                    $_SESSION['name']=$row['mail'];
                    $type=$row['type'];
                }
                ///if user type is user redirect to portfolio page
                if($type=='U')
                {
                    //session_start();
                    $_SESSION["type"]="user";
                    echo $_SESSION["name"];
                    header("Location:portfolio.php");
                }
                ///redirect to admin page
                else
                {
                    $_SESSION["type"]="admin";
                    header("Location:admin.php");
                }
            }
            else
            {
                $cnt=1;
                $_SESSION["error"]=1;
            }
       }
       if($cnt==1)
       {
           header("Location:index.php?e=1");
       }
    }
?>
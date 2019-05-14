<?php
    session_start();
    if(isset($_POST['submit']))
    {
        $fname=trim($_POST["fname"]);
        $lname=trim($_POST["lname"]);
        $email=trim($_POST["email"]);
        $dob=trim($_POST["bday"]);
        $pass=trim($_POST["pass"]);
        $rpass=trim($_POST["rpass"]);
        $phone=trim($_POST["phone"]);
        $cnt=0;
        //if first name is okay or not
        if($fname!="")
        {
            if(strlen($fname)<=4)
            {
                $cnt=1;
                $_SESSION["msg1"]=1;
                echo $cnt;
            }
        }
        else
        {
            $cnt=1;
            $_SESSION["msg0"]=1;
            echo $cnt;
        }
        //if last name is empty or more than 4 character
        if($lname!="")
        {
            if(strlen($lname)<=4)
            {
                $cnt=1;
                $_SESSION["msg3"]=1;
                echo $cnt;
            }
        }
        else
        {
            $cnt=1;
            $_SESSION["msg2"]=1;
            echo $cnt;
        }
        //email cannot be valid
        if($email=="")
        {
            $cnt1=1;
            $_SESSION["msg4"]=1;
        }

        //date of birth should be valid
        if($dob=="")
        {
            $cnt=1;
            $_SESSION["msg5"]=1;
        }

        //password should contain 1 small,1 boro, 1 number and minimum of 8 character
        if($pass!="")
        {
            $boro=0;$choto=0;$let=0;
            $len=strlen($pass);
            for($i=0;$i<$len;$i++)
            {
                if($pass[$i]>="A"&& $pass[$i]<="Z")
                {
                    echo "BORO";
                    $boro=$boro+1;
                }
                else if($pass[$i]>="a"&& $pass[$i]<="z")
                {
                    echo "CHOTO";
                    $choto=$choto+1;
                }
                else if($pass[$i]>='0'&& $pass[$i]<='9')
                {
                    echo "number";
                    $let=$let+1;
                }
            }
            if($boro==0||$choto==0||$let==0||$len<=7)
            {
                $cnt=1;
                $_SESSION["msg6"]=1;
            }
        }
        else
        {
            $cnt=1;
            $_SESSION["msg7"]=1;
        }
        ///password and confirm password should match
        if($rpass!=$pass)
        {
            $cnt=1;
            $_SESSION["msg8"]=1;

        }
        if($phone!="")
        {
            $len=strlen($phone);
            $num=0;
            for($i=0;$i<$len;$i++)
            {
                if($phone[$i]>="0"&&$phone[$i]<="9")
                    $num=$num+1;
            }
            if($num!=11||$len!=11)
            {
                $cnt=1;
                $_SESSION["msg10"]=1;
            }
        }
        else
        {
            $cnt=1;
            $_SESSION["msg9"]=1;
        }

        if($cnt==1)
        {
            header("Location:register.php?e=1");
        }
        else
        {
            //stroing user info into login table
            $con = mysqli_connect("localhost","root","","final");
            if($con->connect_error)
            die("Error in Connection:".$con->connect_error());
        $sql = "select * from login where mail='$email'and status='V'";
        $result = $con->query($sql);
        $countOfRow =  $result->num_rows;
        if($countOfRow==0)
        {
            $sql = "INSERT INTO login (mail,password,status,type) VALUES (?,?,?,?)";
	        $stmt = $con->prepare($sql);
	        $stmt->bind_param("ssss",$uname,$upass,$status,$utype);
	        $uname = $email; $upass = $pass; $utype = "U";$status="V";
            $stmt->execute();
            $stmt->close();
            
            $sql = "select * from login where mail='$email' and password='$pass' and status='V'";
            $r = $con->query($sql);
            $countOfrow =  $r->num_rows;
            if($countOfrow==1)
            {
                $type;
                while($row=$result->fetch_assoc())
                {
                    $_SESSION['id']=$row['id'];
                    $_SESSION['name']=$row['name'];
                    $type=$row['type'];
                }
                $_SESSION["type"]=$type;

                header("Location:portfolio.php");
            }
        }
        else
        {
            $_SESSION["msg11"]=1;
            header("Location:register.php?e=1");
        }
    }

    }
?>

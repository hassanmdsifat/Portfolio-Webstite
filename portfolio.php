
<?php
    session_start();
    if($_SESSION["name"]=="")
    {
        header("Location:logout.php");
    }
?>
<html>
    <head>
        <title>Portfolio</title>
        <link rel="stylesheet" href="style/style2.css">
        <link href="https://fonts.googleapis.com/css?family=Dokdo" rel="stylesheet">
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
    <header class="header">
            <div class="text-box">
                    <h1 class="heading-primary">
                            <span class="heading-primary-main">MD.Sifat Hassan</span>
                            <span class="heading-primary-sub">Phone: 01688736454<br>Email:hassansifat97@gmail.com</span>
                    </h1>
                    <img src="images/propic.jpg" height="220px" width="160px" class="btn btn-white btn-animated">
            </div>
    </header>
    <div class="other-box">
        <div class="skill">
            <h1>Skills</h1>
            <br>
            <ol class="list">
                <li>C</li>
                <li>C++</li>
                <li>JAVA</li>
                <li>Python</li>
                <li>Django</li>
            </ol>
        </div>
        <div class="skill">
            <h1>Achievements</h1>
            <ul class="list">
                <li>5th in AIUB CS fest Programming Contest 2016</li>
                <li>8th in AIUB CS fest Progamming Contest 2017</li>
                <li>Different Programming Contest</li>
            </ul>
        </div>

        <div class="skill">
            <h1>Projects</h1>
            <ul class="list">
                <li>Algorithm Simulator using JAVA</li>
                <li>Destination A Parcel Service using C#</li>
                <li>PhotoWeb using PHP</li>

            </ul>
        </div>
     </div>

     <div class="photo-box">
         <h1 class="Heading" align="center">SOME MEMORIES</h1>
         <br>
         <figure align="center">
				<img src="images/railline.jpg" width="30%" style="border:1px" alt="Forest" name="railline" onclick="getcaption(this)">
				<figcaption id="railline"></figcaption>
        </figure>
			<figure align="center">
				<img src="images/iphone10.jpg" width="30%" style="border:1px" alt="iphone10" name="iphone10" onclick="getcaption(this)">
				<figcaption id="iphone10"></figcaption>
            </figure>
            <figure align="center">
				<img src="images/metalica.jpg" width="30%" style="border:1px" alt="iphone10" name="metalica" onclick="getcaption(this)">
				<figcaption id="metalica"></figcaption>
            </figure>
            <div style="width:95%;color:green">
                <a href="contact.php">Contact Us</a>
                <a href="logout.php">Log Out <?php echo $_SESSION["name"] ?></a>
            </div>
     </div>
    </body>
</html>
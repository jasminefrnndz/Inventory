<?php
session_start();

$currentPage = 'user.php';
?>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=10" >
        

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Latest compiled JavaScript -->
        <link rel="stylesheet" type="text/css" href="../css/product.css">
        <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    </head>

    <body scroll="yes" >
        <div class="indextopnav">
            <div class="col-sm-10">
            <p class = "txt"><button class="openbtn" onclick="openNav()">☰ &nbsp</button> <img src = "../img/cgLogo.jpg"> &nbsp Cha Guan House of Tea</p>
            </div>
            <div class="col-sm-1">
                <a href="login.php">
                    <input  type="button" class="btn btn-danger pull-right" value="&nbsp Login &nbsp">
                </a>
            </div>

            <div class="col-sm-1">
                <a href="registration.php">
                    <input  type="button" class="btn btn-danger pull-left" value="Register">
                </a>
            </div>
        </div>
        <div class= "bg">
           
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a><br>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
        </div>
        <script>
            function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
            }

            function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
            }
        </script>
    <?php include('../model/footer.php')?>
    
    </body>
    

</html>
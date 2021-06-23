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

    <body scroll="no" class = "bg">
      <br>
        <div class="col-sm-11">
            <a href="login.php">
                <input  type="button" class="btn btn-danger pull-right" value="Login">
            </a>
        </div>

        <div class="col-sm-1">
            <a href="registration.php">
                <input  type="button" class="btn btn-danger pull-left" value="Register">
            </a>
        </div>
    <span class="brlarge"></span>
    <?php include('../model/footer.php')?>
    
    </body>
    

</html>
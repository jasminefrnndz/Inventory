<?php
    session_start();

    $currentPage = 'customer.php';

    include "navigation.php";
    $conn= connect();

    $id= $_SESSION['userid'];

   if(isset($_GET['id'])){
        $id= $_GET['id'];
    } elseif($_POST['Submit']){
        $id= $_POST['id'];
        $sql= "DELETE FROM customers_info WHERE id='$id' limit 1";
        $conn->query($sql);
        header("Location: customer.php");
    }

    $sql= "SELECT * from customers_info WHERE id=$id limit 1";
    $res= mysqli_fetch_assoc($conn->query($sql));

    $img= $res['image'];

    if($thisUser['is_admin']!=1){
        header("Location: customer.php");
    }

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=10" >

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/product.css">
        <link rel="stylesheet" type="text/css" href="../css/navigation.css">
        <title> Products </title>
    </head>

    <body>
        <div class="row" style="padding: 50px;">
            <div class="leftcolumn">
                <?php include('product_cards.php')?>
                <div class="pt-20 pl-20">
                    <div class="col-sm-12" style="background-color: white; border: solid rgb(0, 162, 255);">
                        <div class="text-center">
                            <h2 style="color:red;"> The customer will be deleted!!!</h2>
                        </div>
                        <div class="row p-20" >
                        <div class="row col-sm-6">
                                <div class="col-sm-6 p-20 pull-left" >
                                    <img src="<?php echo $img; ?>" height="250" width="250">
                                </div>
                            </div>
                            <div class="row col-sm-6">
                                <h4 class="pull-left col-sm-6">Name:</h4>
                                <div class="col-sm-6">
                                    <h4  class="pull-left" style="color: black;"><?php echo ucwords($res['branch_name']) ?></h4>
                                </div>
                            </div>
                            <div class="row col-sm-6">
                                <h4 class="pull-left col-sm-6">Email:</h4>
                                <div class="col-sm-6">
                                    <h4  class="pull-left" style="color: black;"><?php echo $res['email']?></h4>
                                </div>
                            </div>
                            <div class="row col-sm-6">
                                <h4 class="pull-left col-sm-6">Type:</h4>
                                <div class="col-sm-6">
                                    <h4  class="pull-left" style="color: black;">
                                        <?php 
                                            echo '<td>'. $res['type'].'</td>';
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="row col-sm-6">
                                <h4 class="pull-left col-sm-6">Current Orders:</h4>
                                <div class="col-sm-6">
                                    <h4  class="pull-left" style="color: black;">
                                        <?php 
                                            echo '<td>'. $res['current_orders'].'</td>';
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="row  col-sm-6">
                                <h4 class="pull-left col-sm-6">Shipping Address:</h4>
                                <div class="col-sm-6">
                                    <h4  class="pull-left" style="color: black;">
                                        <?php 
                                            echo '<td>'. $res['shipping_address'].'</td>';
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="row col-sm-6 text-center" style="padding: 20px">
                                <form method="POST" action="deleteProduct.php">
                                    <input type="hidden" value="<?php echo $res['id']; ?>" name="id">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <br><br>
                                                <input class="btn btn-danger" type="submit" name="Submit" value="Delete">
                                                <a href = "customer.php"  class="btn btn-warning">Cancel</a>
                                                <br><br>
                                            </div>
                                        </div>
                                </form>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('side_info.php')?>
        </div>
        <?php include('footer.php')?>
    </body>
</html>
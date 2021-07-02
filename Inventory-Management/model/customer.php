<?php
    session_start();

    $currentPage = 'customer.php';

    include "navigation.php";
    $m='';
    $conn=connect();

    if(isset($_POST['submit'])){
        $cName= $_POST['cname'];
        $type= $_POST['type'];
        $shippingadd = $_POST['shippingadd'];
        $img = $_FILES['cimage'];
        $iName= $img['name'];
        $tempName= $img['tmp_name'];
        $format= explode('.', $iName);
        $actualName= strtolower($format[0]);
        $actualFormat= strtolower($format[1]);
        $allowedFormats= ['jpg', 'png', 'jpeg', 'gif'];

        if(in_array($actualFormat, $allowedFormats)){
            $location= 'Customers/'.$actualName.'.'.$actualFormat;
            $sql= "INSERT INTO customers_info(branch_name, type, shipping_address, avatar) VALUES ('$cName', '$type', '$shippingadd', '$location')";
            if($conn->query($sql)===true){
                move_uploaded_file($tempName, $location);
                $m= "Customer Inserted!";
            }
        }

    }

    $sql= "SELECT * from customers_info";
    $res= $conn->query($sql);
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
        <title> Customers </title>
    </head>
    <body>
    <div class="row" style="padding: 40px;">
        <div class="leftcolumn">
            <?php include('product_cards.php')?>
            <div class="card">
               
                <div class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomer">
                            Add New Customer
                    </button>
                    <h4 style="color: green"><?php echo $m; ?></h4>
                        <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button style="background-color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h2 class="modal-title" id="exampleModalScrollableTitle" style="color: white;">Add New Customer</h2>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="customer.php" enctype="multipart/form-data">
                                            <div class="form-group pt-20">
                                                <div class="col-sm-4">
                                                    <label for="name" class="pr-10"> Customer Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input name="cname" type="text" class="login-input" placeholder="Customer Name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group pt-20">
                                                <div class="col-sm-4">
                                                    <label for="type" class="pr-10"> Type </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input name="type" type="text" class="login-input" placeholder="Type" id="type" required>
                                                </div>
                                            </div>
                                            <div class="form-group pt-20">
                                                <div class="col-sm-4">
                                                    <label for="shippingadd" class="pr-10"> Shipping Address </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input name="shippingadd" type="text" class="login-input" placeholder="Shipping addrress" id="shippingadd" required>
                                                </div>
                                            </div>
                                            <div class="form-group pt-20">
                                                <div class="col-sm-4">
                                                    <label for="cimage" class="pr-10"> Avatar </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input name="cimage" class="pl-20" type="file" id="cimage" required>
                                                </div>
                                            </div>
                                            <div class="form-group" style="text-align: center;">
                                                <button type="submit" value="submit" name="submit" class="btn btn-success">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="table_container">
                    <h1 style="text-align: center; color:white;">Customers Table</h1>             
                    <div class="table-responsive">
                        <table class="table table-dark" id="table" data-toggle="table" data-search="true" data-filter-control="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead class="thead-light">
                                <tr>
                                    <th data-field="date" data-filter-control="select" data-sortable="true">Customer</th>
                                    <th data-field="note" data-filter-control="select" data-sortable="true">Type</th>
                                    <th data-field="examen" data-filter-control="select" data-sortable="true">Email</th>
                                    <th data-field="note" data-sortable="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   if(mysqli_num_rows($res)>0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo '<tr>';
                                        echo '<td style ="color :black;">'. $row['branch_name'].'</td>';
                                        echo '<td style ="color :black;">'. $row['type'].'</td>';
                                        echo '<td style ="color :black;">'. $row['email'].'</td>';
                                        echo "<td><a href='viewCustomer.php?id=".$row['id']."' class='btn btn-success btn-sm'>".
                                                "<span class='glyphicon glyphicon-eye-open'></span> </a>";
                                        if($thisUser['is_admin']==1) {
                                            echo "<a href='deleteCustomer.php?id=".$row['id']."' class='btn btn-danger btn-sm'>".
                                                "<span class='glyphicon glyphicon-trash'></span> </a></td>";
                                        }
                                        echo '</tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include('side_info.php')?>
    </div>
    <?php include('footer.php')?>
    </body>
</html>
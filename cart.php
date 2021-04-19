<!--database connection-->
<?php  include('include/config.php');   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Navigate Printers and Advertising</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="apple-touch-icon" href="assets/img/apple-icon.png"> -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/small.jpg">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styleHome.css">
  <!-- Font CSS -->
  <link href="assets/css/boxicon.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="vendor/owl.carousel.min.css">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
  <?php
    session_start();
    $_SESSION['basePath'] = "./assets/img/";
  ?>

</head>
<body>

<!-- Header -->
<?php  include('include/nav.php');   ?>
<!-- Close Header -->

<div id="content">
    <div class="container">
        
        <div class="row">
            <div id="cart" class="col-md-9">
                <div class="box">
                <br>
                    <form action="controller/cart.php" method="post" enctype="multipart/form-data">
                        <h1>Shopping Cart</h1>

                        <?php 
                            //session_start();

                            $total = 0 ;

                            $userID = $_SESSION['userID'];
                            $sql ="SELECT A.id,  B.image , A.product_qty , A.sellingPrice , B.product
                                FROM web_order A 
                                INNER JOIN  web_trending_products B 
                                ON A.itemid = B.id WHERE A.userID = '$userID';";
                            $result=mysqli_query($conn,$sql);
                            $count =mysqli_num_rows($result); 

                        ?>
                        <p class="text-muted"><?php echo $count; ?> items</p>
                    
                        <div class="table-responsive">
                            <table class="table">
                                <thread>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Qty.</th>
                                        <th>Unit Price</th>
                                        <th></th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>
                                    </tr>
                                </thread>

                                <?php

                                  if($count > 0) {

                                    while($row = mysqli_fetch_assoc($result)) {

                                        echo ' <tbody>';
                                            echo ' 
                                                <tr>
                                                    <td>
                                                        <img src='.$_SESSION['basePath'] . $row['image'].' alt="'.$row['product'].'" style="width:40px; height:40px;" class="img-responsive">
                                                    </td>
                                                    <td>'.$row['product'].'</td>
                                                    <td>'.$row['product_qty'].'</td>
                                                    <td>'.$row['sellingPrice'].'</td>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" name="remove[]" value='.$row['id'].'>
                                                    </td>
                                                    <td>
                                                        Rs. '.$row['sellingPrice']*$row['product_qty'].'
                                                    </td>
                                                </tr>
                                            ';
                                        echo ' </tbody>';

                                        $total = ($row['sellingPrice']*$row['product_qty']) + $total;
                                    }
                                }
                                ?>
                                <tfoot>
                                    <tr>
                                        <th colspan="6">Total</th>
                                        <th colspan="1">Rs. <?php echo $total; ?></th>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>
                        <div class="box-footer" style="display: flex; justify-content: space-between;">
                            <div class="pull-left">
                                <a href="features" class="btn btn-success btn-sm">
                                    <!-- <i class="bx-bx-chevron-left-circle bx-sm text-primary"></i> -->
                                    Continue Shopping
                                </a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="updates" value="Update Cart" class="btn btn-danger btn-sm">
                                    <!-- <i class="bx-bx-refresh bx-sm text-primary"></i> -->
                                    Update Cart
                                </button>
                                
                                
                            </div>
                        </div><br><br>
                    </form>
                    <form action="controller/cart.php" method="post">
                        <?php
                            $userID = $_SESSION['userID'];
                            $sql ="SELECT * FROM customertb WHERE id = '$userID';";
                            $result=mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);
                         ?>
                         <div class="form-row">
                            <div class="col">
                               <label for="name">Name</label>
                               <input type="text" class="form-control" id="name" name="name" value='<?php echo $row['customerName'] ?>' placeholder="Name">
                            </div>
                            <div class="col">
                               <label for="contactNo">Contact No</label>
                               <input type="text" class="form-control" name="contactNo" id="contactNo" value='<?php echo $row['contactNo'] ?>' placeholder="Contact No">
                            </div>
                        </div>                              
                        <br>
                        <label for="dAddress">Delivery Address</label>
                        <textarea class="form-control" id="dAddress" name="dAddress" rows="3" required></textarea>
                        <br>
                        <button type="submit" class="btn btn-info btn-sm" name="confirmOrder">Confirm Order</button>
                    </form>
                </div>
            </div>
            
            <div class="col-md-3" >
                <div id="order-summary" class="box">
                        <br>                      
                    <div class="box-header">
                        <h3>Order Summary</h3>
                    </div>
                    
                    <p class="text-muted">
                        Shipping and Additional costs are calculated based on value you have entered
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order Sub-Total</td>
                                    <th>Rs. <?php echo $total; ?></th>
                                </tr>
                                
                                <tr>
                                    <td>Shipping and Handling</td>
                                    <td>Rs.0</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>Rs.0</td>
                                </tr>
                                
                                <tr>
                                    <td>Total</td>
                                    <td>Rs. <?php echo $total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="vendor/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        autoplay:true,
        autoplayHoverPause: true,
        items:4,
        nav:true,
        dots:true,
        loop:true,

    });
</script>
</body>
</html> 









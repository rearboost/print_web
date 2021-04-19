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
  <!-- <link rel="stylesheet" type="text/css" href="styleHome.css"> -->
  <!-- Font CSS -->
  <link href="assets/css/boxicon.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" type="text/css" href="vendor/owl.carousel.min.css"> -->
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
  <?php
    session_start();
    $_SESSION['basePath'] = "./assets/img/";
  ?>

</head>
<body>

<?php  include('include/nav.php'); ?>

<div class="container">

<?php

if (isset($_GET['itemID'])){
                  
    $pID = $_GET['itemID'];
    $query = "SELECT * from web_trending_products where id='$pID'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $itemID = $row['id'];
    $itemName = $row['product'];
    $sellingPrice = $row['price'];
    $description = $row['type'];
    $itemImage = $_SESSION['basePath'] . $row['image'];
   
?>    
    <div class="row justify-content-center p-4">
        <section class="contact spad">
            <div class="container">
              <div class="row">
                    <div class="col-sm">
                        <img src="<?php echo $itemImage ; ?>" alt="<?php echo $itemName ; ?>" class="img-responsive">
                    </div>
                    <div class="col-sm">
                        <h1><?php echo $itemName; ?></h1>
                        <form action="details.php?addCart='<?php echo $itemID?>'" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label>Quantity</label>
                                <select style="width:50%" name="product_qty" id="product_qty" class="form-control">
                                    <option value="1" selected="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <span class="price">Unit Price :  <?php echo $sellingPrice; ?></span>
                            <p></p>
                            <p style="text-align: justify;">Category : <?php echo $description; ?></p>

                            <?php if (empty($_SESSION["userID"])): ?>
                            <p class="buttons">
                                <span class="btn btn-primary" onclick="loginPage()">
                                    Add to Cart
                                </span>
                            </p>
                            <?php else: ?>
                              <p class="buttons">
                                <span class="btn btn-primary" onclick="addCart('<?php echo $itemID; ?>','<?php echo $sellingPrice; ?>')">
                                    Add to Cart
                                </span>
                             </p>
                            <?php endif ?>  
                        </form>
                    </div>
                </div>   
                <?php } ?>                  
            </div>

        </section> 
    </div>
    <br>
</div>

    <!-- Start Footer -->
    <?php include('include/footer.php');?>
    <!-- End Footer -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="vendor/owl.carousel.min.js"></script>
<script>


    // Add to the Cart 
    function addCart(itemid,sellingPrice){

       var product_qty =document.getElementById('product_qty').value; 

       $.ajax({
            url:"./controller/order.php",
            method:"POST",
            data:{"itemid":itemid,sellingPrice:sellingPrice,product_qty:product_qty},
            success:function(data){
                //alert(data)
            }
        });
    }

    //Url Login To the 
    function loginPage(){
      window.location.href = "./login.php";
    }

</script>
</body>
</html> 
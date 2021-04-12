<?php
include('../include/config.php');

    if(isset($_POST['login']))
    {
         foreach($_POST['remove'] as $index => $val){

            $delete = "DELETE FROM web_order WHERE  id='$val';";

            $result = mysqli_query($conn,$delete);

         }
        echo "<script type='text/javascript'>window.location.href='../cart.php';</script>";
    }

    if(isset($_POST['confirmOrder']))
    {
        $userID = $_SESSION['userID'];
        $name =$_POST['name'];
        $contactNo =$_POST['contactNo'];
        $dAddress =$_POST['dAddress'];
        $createdDate = date("Y-m-d");
        $order_from = "Web";

        $query ="INSERT INTO  customer_ordertb (userID,customerName,order_from,contactNo,deliveryAddress,createdDate)  VALUES ('$userID','$name','$order_from','$contactNo','$dAddress','$createdDate')";
        $result=mysqli_query($conn,$query);
        
        $sql ="SELECT * FROM customer_ordertb ORDER BY orderId DESC limit 1";
        $result_get=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result_get);
        $orderId = $row['orderId'];

         $sql_items ="SELECT  A.product_qty , A.sellingPrice , B.itemName
                                    FROM web_order A 
                                    INNER JOIN  web_trending_products B 
                                    ON A.itemid = B.id WHERE A.userID = '$userID';";

        $result_items=mysqli_query($conn,$sql_items);
        $count =mysqli_num_rows($result_items); 

         if($count > 0) {

            while($row = mysqli_fetch_assoc($result_items)) {

                $sellingPrice = $row['sellingPrice'];
                $product_qty = $row['product_qty'];
                $itemName = $row['itemName'];
                $query_Item ="INSERT INTO  customer_orderitemstb (orderId,itemName,quantity,price)  VALUES ('$orderId','$itemName','$product_qty','$sellingPrice')";
                mysqli_query($conn,$query_Item);
            }
         }
         
        $delete = "DELETE FROM web_order WHERE  userID='$userID';";
        $result = mysqli_query($conn,$delete);

        $message = "Successfully Place Order !! ";
        echo "<script type='text/javascript'>alert('$message'); </script>";
        echo "<script type='text/javascript'>window.location.href='../features.php';</script>";

    }
   

  
<?php
include('../include/config.php');
session_start();

    /////////////// remove items from cart ///////////////
    if(isset($_POST['updates']))
    {
         foreach($_POST['remove'] as $index => $val){

            $delete = "DELETE FROM web_order WHERE id='$val';";

            $result = mysqli_query($conn,$delete);

         }
        $message = "Removed Selected Item!";
        echo "<script type='text/javascript'>alert('$message'); </script>";
        echo "<script type='text/javascript'>window.location.href='../cart.php';</script>";
    }

    ////////////// place order ///////////////////
    if(isset($_POST['confirmOrder']))
    {


        $userID = $_SESSION['userID'];
        $name =$_POST['name'];
        $contactNo =$_POST['contactNo'];
        $dAddress =$_POST['dAddress'];
        $createdDate = date("Y-m-d");
        $order_from = "Web";


        // insert to the database //
        $query ="INSERT INTO  customer_ordertb (userID,customerName,order_from,contactNo,deliveryAddress,createdDate)  VALUES ('$userID','$name','$order_from','$contactNo','$dAddress','$createdDate')";
        $result=mysqli_query($conn,$query);
        
        $sql ="SELECT * FROM customer_ordertb ORDER BY orderId DESC limit 1";
        $result_get=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result_get);
        $orderId = $row['orderId'];

         $sql_items ="SELECT  A.product_qty , A.sellingPrice , B.product
                                    FROM web_order A 
                                    INNER JOIN  web_trending_products B 
                                    ON A.itemid = B.id WHERE A.userID = '$userID';";

        $result_items=mysqli_query($conn,$sql_items);
        $count =mysqli_num_rows($result_items); 

         if($count > 0) {

            while($row = mysqli_fetch_assoc($result_items)) {

                $sellingPrice = $row['sellingPrice'];
                $product_qty = $row['product_qty'];
                $itemName = $row['product'];
                $query_Item ="INSERT INTO  customer_orderitemstb (orderId,itemName,quantity,price)  VALUES ('$orderId','$itemName','$product_qty','$sellingPrice')";
                mysqli_query($conn,$query_Item);
            }
            ///// send mail //////
            $product=[];
            for ($x = 0; $x < $count; $x++) {
              for ($y = 0; $y < 3; $y++) {
                $product[$x][$y];
              }
            }

            $to = ""; // incoming mail address     
            $subject    = "New Order";    
            $message    = "Product   | Qty   | Unit Price \n" ;
                            for ($row = 0; $row < $count; $row++) {                            
                              for ($col = 0; $col < 3; $col++) {
                                $product[$row][$col]."\t\t";
                              }
                              ."\n";
                            }
                          . "\nFrom : ".$name."\nPhone : ".$contactNo;

            $headers    = "From : " .$name . "\r\n";
            mail($to,$subject,$message,$headers);
         
        }

        $delete = "DELETE FROM web_order WHERE  userID='$userID';";
        $result = mysqli_query($conn,$delete);

        $message = "Successfully Place Order!! ";
        echo "<script type='text/javascript'>alert('$message'); </script>";
        echo "<script type='text/javascript'>window.location.href='../features.php';</script>";

    }
   

  
<?php
		
// Database Connection
include('../include/config.php');
session_start();
//ADD FUNCTION
// form submit btn insert details php code strat
if(isset($_POST['itemid']))
{
    $itemid =$_POST['itemid'];
	$sellingPrice =$_POST['sellingPrice'];
	//$product_qty =$_POST['product_qty'];
    $userID = $_SESSION["userID"];

    $query ="INSERT INTO  web_order (itemid,sellingPrice,product_qty,userID)  VALUES ('$itemid','$sellingPrice','1','$userID')";
    $result=mysqli_query($conn,$query);
    if($result){

        echo "Successfully Added";
    }
    else{
        echo "Unsuccessful Added";
    }
}





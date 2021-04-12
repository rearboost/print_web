<?php

    // database Connection
    include('../include/config.php');

    session_start();

   
    if(isset($_SESSION["userID"])){
    	$userID = $_SESSION["userID"];
    	$query = "SELECT * FROM  web_order WHERE userID ='$userID'";

	    $result = mysqli_query($conn ,$query);

	    echo mysqli_num_rows($result);
    }

   

 ?> 
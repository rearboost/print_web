<?php
error_reporting(0);		
// Database Connection
require '../include/config.php';

session_start();
//ADD FUNCTION
// form submit btn insert details php code strat
if(isset($_POST['login']))
{
    $username =$_POST['username'];
	$password =md5($_POST['password']);

    $sql ="SELECT * FROM customertb WHERE username = '$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
	$count =mysqli_num_rows($result); 

    if($count != 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['userID'] = $row['id'];
        $message = "Login Successful !!! ";
        echo "<script type='text/javascript'>alert('$message'); </script>";
        echo "<script type='text/javascript'>window.location.href='../features.php';</script>";

    }else{
        $message = "Incorrect Credentials, Try again...";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href='../login.php';</script>";
    }
}

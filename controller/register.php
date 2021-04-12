<?php    		
// Database Connection
require '../include/config.php';
//ADD FUNCTION
// form submit btn insert details php code strat
if(isset($_POST['register']))
{
    $name =$_POST['name'];
	$contact =$_POST['contact'];
	$username =$_POST['username'];
	$nic =$_POST['nic'];
    $password_1 =$_POST['password_1'];
    $password_2 =$_POST['password_2'];

    if($password_1 == $password_2){

    $sql ="SELECT * FROM customertb WHERE nic = '$nic'";
    $result=mysqli_query($conn,$sql);
	$count =mysqli_num_rows($result); 

    $password = md5($password_2);
	
        if($count == 0){

            $query ="INSERT INTO  customertb (nic,customerName,contactNo,username,password)  VALUES ('$nic','$name','$contact','$username','$password')";
            $result=mysqli_query($conn,$query);
            if($result){
                $message = "Successfully Registered";
                echo "<script type='text/javascript'>alert('$message'); </script>";
                 echo "<script type='text/javascript'>window.location.href='../login.php';</script>";
            }
            else{
                $message = "Unsuccessful Insert Customer";
                echo "<script type='text/javascript'>alert('$message'); </script>";
                echo "<script type='text/javascript'>window.location.href='../register.php';</script>";
            }
        }else{
                $message = "This Customer is exits Please Login !!";
                echo "<script type='text/javascript'>alert('$message');</script>";
        }

    }else{
        $message = "Passwords Not Matched Try Again !!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script type='text/javascript'>window.location.href='../register.php';</script>";
    }
}

<?php 
// session_start();

$username = "";
$email = "";
$contact = "";
$nic = "";
$errors = array();

$db= mysqli_connect('localhost', 'root', '', 'jobinfor');

if(isset($_POST['register'])){

  $username = mysql_real_escape_string($_POST['username']);
  $nic = mysql_real_escape_string($_POST['nic']);
  $contact = mysql_real_escape_string($_POST['contact']);
  $password_1 = mysql_real_escape_string($_POST['password_1']);
  $password_2 = mysql_real_escape_string($_POST['password_2']);

 

  if($password_1 != $password_2){
    array_push($errors, "Please enter same Passwords.");
  }

  if(count($errors) == 0){
    $password = md5($password_1);
    $sql = "INSERT INTO customertb (id, nic, customerName, contactNo, branch, password) Values ('','$nic','$username','$contact','','$password')";
    mysqli_query($db, $sql);

$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location: index.php');
  }

}

if(isset($_POST['login'])){
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  
  if(empty($username)){
    array_push($errors, "Username is required");
  }

  if(empty($password)){
    array_push($errors, "Password is required");
  }
  

  if(count($errors) == 0){
    $password = md5($password);
    $query = "SELECT * FROM  customertb WHERE customerName='$username' and password='$password'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result)== 1){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else{
      array_push($errors, "Wrong username/password combination");
      header('location: login.php');
    }
    
}
}

if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location: index.php');
}
?>
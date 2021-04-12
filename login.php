<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- <head>
  <title>Navigate Printers - Login</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/styleHome.css">

  <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> 
</head> -->

<!-- Header -->
<?php  include('include/head.php');   ?>
<!-- Close Header -->

<body>
<!-- Header -->
<?php  include('include/nav.php');   ?>
<!-- Close Header -->

<div class="header">
    <h2>Login</h2>
</div>

  <form class="form" method="post" action="controller/login.php">

    <?php include('errors.php'); ?> 

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" required>
    </div>

    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" required>
    </div>

    <div class="text-center">
      <button type="submit" name="login" class="btn_login btn-secondary btn-sm btn-color">Login</button>
    </div>
     <br>
    <p class="text-left">
      Not yet a member? <a href="register.php">Register</a>
    </p>

  </form>
<br><br><br><br>
<!-- Start Footer -->
<?php include('include/footer.php');?>
<!-- End Footer -->

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
<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php  include('include/head.php');   ?>
<!-- Close Header -->

<body>
<!-- Header -->
<?php  include('include/nav.php');   ?>
<!-- Close Header -->
  <div class="header">
    <h2>Register</h2>
  </div>

  <form method="post" action="controller/register.php">

    <?php include('errors.php'); ?>    

   <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" required>
    </div>
   
    <div class="input-group">
      <label>Contact No.</label>
      <input type="text" name="contact"  required>
    </div>

    <div class="input-group">
      <label>NIC No.</label>
      <input type="text" name="nic"  required>
    </div>

     <div class="input-group">
      <label>Username</label>
      <input type="text" name="username"  required>
    </div>

    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1" required>
    </div>

    <div class="input-group">
      <label>Confirm Password</label>
      <input type="password" name="password_2" required>
    </div>

    <div class="text-center ">
      <button name="register" type="submit" class="btn_login btn-secondary btn-sm btn-color">Register</button>
    </div>
     <br>
    <p class="text-left ">
      Already a member? <a href="login.php">Login</a>
    </p>

  </form>
<br><br><br>
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
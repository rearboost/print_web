<?php 
//database connection
include('include/config.php'); 

$con = mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD);
    mysqli_select_db($con,DB_NAME);

    if (!$con) 
    {
        die('Could not connect: ' . mysqli_error($con));
    }

  if(isset($_POST['submit'])){
    $to = ""; // incoming mail address
    $name       = $_POST['inputname'];
    $email      = $_POST['inputemail'];       
    $phone      = $_POST['inputphone'];       
    $company    = $_POST['inputcompany'];       
    $subject    = $_POST['inputsubject'];    
    $message    = $_POST['inputmsg']." ". "\nFrom : ".$name."\nPhone : ".$phone."\nCompany : ".$company;
    $headers    = "From : " .$email . "\r\n";
    mail($to,$subject,$message,$headers);
    
    }
?>



<!DOCTYPE html>
<html lang="en">

<!--start head-->
<?php  include('include/head.php');   ?>
<!--end head-->

<body>
    <!-- Header -->
    <?php  include('include/nav.php');   ?>
    <!-- Close Header -->


    <!-- Start Banner Hero -->
    <section class="bg-light">
        <div class="container py-4">
            <div class="row align-items-center justify-content-between">
                <div class="contact-header col-lg-4">
                    <h1 class="h2 pb-3 text-primary">Get in touch..</h1>
                    <h3 class="h4 regular-400">Have a question? </h3>
                    <p class="light-300">
                        Create Success campaign with us to know more details.
                    </p>
                </div>
                <div class="contact-img col-lg-5 align-items-end col-md-4">
                    <img src="./assets/img/banner-img-01.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->


    <!-- Start Contact -->
    <section class="container py-5">
        <div class="row pb-4">
            <div class="col-lg-6">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6667.773001802624!2d79.9914217634439!3d6.434934153837272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sNo%3A170%2C%20Welipanna%20Rd%2C%20Aluthgama!5e0!3m2!1sen!2slk!4v1617319468552!5m2!1sen!2slk" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Start Contact Form -->
            <div class="col-lg-6">
                <form class="contact-form row" method="post" action="" role="form">

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="floatingname" name="inputname" placeholder="Name" required="">
                            <label for="floatingname light-300">Name</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="floatingemail" name="inputemail" placeholder="Email" required="">
                            <label for="floatingemail light-300">Email</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="floatingphone" name="inputphone" placeholder="Phone" required="">
                            <label for="floatingphone light-300">Phone</label>
                        </div>
                    </div><!-- End Input Phone -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="floatingcompany" name="inputcompany" placeholder="Company Name">
                            <label for="floatingcompany light-300">Company Name</label>
                        </div>
                    </div><!-- End Input Company Name -->

                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="floatingsubject" name="inputsubject" placeholder="Subject" required="">
                            <label for="floatingsubject light-300">Subject</label>
                        </div>
                    </div><!-- End Input Subject -->

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control light-300" rows="8" placeholder="Message" id="floatingtextarea" name="inputmsg" required=""></textarea>
                            <label for="floatingtextarea light-300">Message</label>
                        </div>
                    </div><!-- End Textarea Message -->

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="submit">Send Message</button>
                    </div>

                </form>
            </div>
            <!-- End Contact Form -->


        </div>
    </section>
    <!-- End Contact -->


    <!-- Start Footer -->
    <?php include('include/footer.php');?>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
<!--idatabase connection-->
<?php  include('include/config.php');   ?>

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
    <div class="banner-wrapper bg-light">
        <div id="index_banner" class="banner-vertical-center-index container-fluid pt-5">

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    <strong>Navigate Printers</strong>
                                </h1>
                                <h4 class="banner-body text-muted py-3">
                                    Welcome to Navigate printers <br> and Advertising
                                </h4>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="work" role="button">Get Started</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    <strong>Design Services</strong>
                                </h1>
                                <h4 class="banner-body text-muted py-3">
                                    We are able to design your item <br> to suite your requirement. 
                                </h4>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="work" role="button">Get Started</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    <strong>Printing Services</strong>
                                </h1>
                                <h4 class="banner-body text-muted py-3">
                                    We are your <strong> one stop</strong> printing <br>solution provider.
                                </h4>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="work" role="button">Get Started</a>
                            </div>
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <i class='bx bx-chevron-left'></i>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <i class='bx bx-chevron-right'></i>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <!-- End slider -->

        </div>
    </div>
    <!-- End Banner Hero -->



    <!-- Start Service -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">

        </div>
    </section>
    <!-- End Service -->

    <!-- Start View Work -->
    <section class="bg-secondary">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-12 text-light align-items-center">
                    <i class='display-1 bx bxs-box bx-lg'></i>
                </div>
                <div class="col-lg-7 col-12 text-light pt-2">
                    <h3 class="h4 light-300">Book Your Product Now.</h3>
                    <p class="light-300">Just drop a message to book your product now.</p>
                </div>
                <div class="col-lg-3 col-12 pt-4">
                    <a href="features" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">See Trending Products</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End View Work -->

    <!-- Start Recent Work -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="recent-work-header row text-center pb-5">
                <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Our Works</h2>
            </div>
            <div class="row gy-5 g-lg-5 mb-4">
            <?php
            $type_sql = mysqli_query($conn,"SELECT * FROM web_product_type");
            $count = mysqli_num_rows($type_sql);
            if($count > 0) {
              while($row = mysqli_fetch_assoc($type_sql)) {

                $type_id = $row['id'];
                $type    = $row['type'];
            ?>
                <div class="col-md-4 mb-3">
                    <a href="#" class="recent-work card border-0 shadow-lg overflow-hidden">
                        <img class="recent-work-img card-img" src="<?php echo $_SESSION['basePath'] . $row['image']; ?>" alt="Card image">
                        <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                            <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                <h3 class="card-title light-300"><?php echo $row['type']; ?></h3>
                            </div>
                        </div>
                    </a>
                </div>
            <?php  
              }
            }
            ?>

            </div>
        </div>
    </section>
    <!-- End Recent Work -->



    <!-- Start Footer -->
    <?php include('include/footer.php');?>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
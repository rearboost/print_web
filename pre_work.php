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
    <div id="work_banner" class="banner-wrapper bg-light w-100 py-5">
        <div class="banner-vertical-center-work container text-light d-flex justify-content-center align-items-center py-5 p-0">
            <div class="banner-content col-lg-8 col-12 m-lg-auto text-center">
                <h1 class="banner-heading h2 display-3 pb-5 semi-bold-600 typo-space-line-center">Our Work</h1>
                <h3 class="h4 pb-2 regular-400">Welcome to <strong> NAVIGATE PRINTERS</strong></h3>
                <p class="banner-body pb-2 light-300">
                    We provide great service to fullfill your creative needs. <br>
                    Scroll down and have a look at our products and services.
                </p>
            </div>
        </div>
    </div>
    
    <!-- End Banner Hero -->

    <!-- Start Our Work -->
    <section class="container py-5">
        <div class="row justify-content-center my-5">
            <div class="filter-btns shadow-md rounded-pill text-center col-auto">
                <?php
            $type_sql = mysqli_query($conn,"SELECT * FROM web_product_type");
            $count = mysqli_num_rows($type_sql);
            if($count > 0) {
              while($row = mysqli_fetch_assoc($type_sql)) {

                $type_id = $row['id'];
                $type    = $row['type'];
            ?>
                
                <a 
                <?php if ($type=='Design')
                    {
                     echo 'class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active"';
                     echo 'data-filter='.".".$type.'';
                     //echo 'data-filter="'.$row["type"].'"';
                    } else {
                     echo 'class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4"'; 
                     echo 'data-filter='.".".$type.'';
                     //echo 'data-filter="'.$row["type"].'"';
                    }
                ?>
                  href="#"> <?php echo $row['type']; ?> </a>


            <?php  
              }
            }
            ?>
            <!--  <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".other" href="#">Other</a>  -->
            </div>
        </div>
                <!-- <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4 active" data-filter=".Design" href="#">Design</a>
                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".digital" href="#">Digital Printing</a>
                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".laser" href="#">Laser Printing</a>
                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".Offset" href="#">Offset printing</a>
                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".sublimation" href="#">Sublimation Printing</a>
                <a class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4" data-filter=".other" href="#">Other</a> -->
            </div>
        </div>

                <!-- <div class="row designs gx-lg-5"> -->
            <!-- <?php
             //   $pro_sql = mysqli_query($conn,"SELECT * FROM web_products P INNER JOIN web_product_rel R ON R.product_id=P.id WHERE R.type_id='$type_id'");
            //    $count = mysqli_num_rows($pro_sql);
            //    if($count > 0) {
            //      while($data = mysqli_fetch_assoc($pro_sql)) {
            ?> -->
            <!-- <a href="#" class="col-sm-6 col-lg-4 text-decoration-none" <?php  // echo $type; ?>>
            <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                <img class="card-img-top" src="<?php //  echo $data['image'];?>" alt="...">
                <div class="card-body">
                    <h5 class="card-title light-300 text-dark"><?php //  echo $data['name'];?></h5>
                </div>
            </div>
            </a> -->
            <!-- <?php
            //      }
            //    }
            ?> -->



        <div class="row designs gx-lg-5">
            <?php
            $pro_sql = mysqli_query($conn,"SELECT R.type_id as type_id, P.name as name FROM web_product_rel R INNER JOIN web_products P ON R.product_id=P.id");
            $count = mysqli_num_rows($pro_sql);
            if($count > 0) {
              while($data = mysqli_fetch_assoc($pro_sql)) {
                $type_id = $data['type_id'];
            ?>
            
            <a href="#" class="col-sm-6 col-lg-4 text-decoration-none Others">
                <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                    <img class="card-img-top" src="./assets/img/works-1.png" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark"><?php $data['name'] ?></h5>
                    </div>
                </div>
            </a>
            <?php
                }
            }
            ?>
            <!-- <a href="#" class="col-sm-6 col-lg-4 text-decoration-none 2">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/works-2.png" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Digital</h5>
                    </div>
                </div>
            </a>
            <a href="#" class="col-sm-6 col-lg-4 text-decoration-none 6">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/works-3.png" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Laser</h5>
                    </div>
                </div>
            </a>
            <a href="#" class="col-sm-6 col-lg-4 text-decoration-none 4">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/works-4.png" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Offset</h5>
                    </div>
                </div>
            </a>
            <a href="#" class="col-sm-6 col-lg-4 text-decoration-none 3">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/works-5.png" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Sublimation</h5>
                    </div>
                </div>
            </a>
            <a href="#" class="col-sm-6 col-lg-4 text-decoration-none 2">
                <div class="service-work overflow-hidden card mx-5 mx-sm-0 mb-5">
                    <img class="card-img-top" src="./assets/img/works-6.png" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark">Other</h5>
                    </div>
                </div>
            </a> -->
        </div>
        <div class="row">
            <div class="btn-toolbar justify-content-center pb-4" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary text-white">Previous</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-light">1</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">2</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary text-white">Next</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Work -->

    <!-- Start Feature Work -->
    <!-- <section class="bg-light py-5">
        <div class="feature-work container my-4">
            <div class="row d-flex d-flex align-items-center">
                <div class="col-lg-5">
                    <h3 class="feature-work-title h4 text-muted light-300">Featured Work</h3>
                    <h1 class="feature-work-heading h2 py-3 semi-bold-600">Transform with us</h1>
                    <p class="feature-work-body text-muted light-300">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse
                        ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                    </p>
                    <p class="feature-work-footer text-muted light-300">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="col-lg-6 offset-lg-1 align-left">
                    <div class="row">
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-1-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-1.jpg">
                        </a>
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-2-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-2.jpg">
                        </a>
                    </div>
                    <div class="row pt-4">
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-3-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-3.jpg">
                        </a>
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-4-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-4.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Feature Work -->


    <!-- Start Footer -->
    <?php include('include/footer.php');?>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox -->
    <script src="assets/js/fslightbox.js"></script>
    <script>
        fsLightboxInstances['gallery'].props.loadOnlyCurrentSource = true;
    </script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $designs = $('.designs').isotope({
                itemSelector: '.Design',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $designs.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
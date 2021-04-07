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
    <!-- data-filter does not work properly  -->
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
                     echo 'data-filter="'.$row["id"].'"';
                    } else {
                     echo 'class="filter-btn btn rounded-pill btn-outline-primary border-0 m-md-2 px-md-4"'; 
                     echo 'data-filter="'.$row["id"].'"';
                    }
                ?>
                  href="#" id="<?php echo $row['id']; ?>"> <?php echo $row['type']; ?> </a>


            <?php  
              }
            }
            ?>
            </div>
        </div>

        <div class="row designs gx-lg-5">
            <!-- need to fetch below data according to the above types -->

            <?php

            $pro_sql = mysqli_query($conn,"SELECT P.name as name, P.image as image, T.type as type, T.id AS type_id FROM web_products P JOIN web_product_rel R ON P.id = R.product_id JOIN web_product_type T ON T.id = R.type_id");

            $count = mysqli_num_rows($pro_sql);

            if($count > 0) {
              while($data = mysqli_fetch_assoc($pro_sql)) {
            ?>

            <!-- <a href="#" class="col-sm-6 col-lg-4 text-decoration-none Design <?php //echo $data['type']; ?>" style="padding-bottom: 10px;"> -->
            <a href="#" class="col-sm-6 col-lg-4 text-decoration-none <?php echo $data['type_id']?>" style="padding-bottom: 10px;">
                <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                    <img class="card-img-top" src="<?php echo $_SESSION['basePath'] . $data['image']; ?>" alt="...">
                    <div class="card-body">
                        <h5 class="card-title light-300 text-dark"><?php echo $data['name'];?></h5>
                    </div>
                </div>
            </a>
        <?php
                }
            }
        ?>
        </div>

        <!-- <div class="show"></div> -->

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
                itemSelector: '.1',
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

        // load products according to thier type
        // $('.view').on('click', function() {

        //     $.ajax({
        //       url:"products.php",
        //       method:"POST",
        //       data:{"id":this.value},
        //       success:function(data){
        //         $('#show').html(data);
        //       }
        //     });
        // });
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
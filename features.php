<!--database connection-->
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
    <div id="feature_banner" class="banner-vertical-center-index container-fluid pt-5"></div>
    <!-- End Banner Hero -->

    <!-- Start features -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row">
                <h2 class="h2 text-center col-12 py-5 semi-bold-600">Trending Products</h2>
                <div class="service-header col-2 col-lg-3 text-end light-300">
                    <i class='bx bx-gift h1 mt-1'></i>
                </div>
                <div class="service-heading col-10 col-lg-9 text-start float-end light-300">
                    <h2 class="h3 pb-4 typo-space-line">Book your item now.</h2>
                </div>
            </div>
            <p class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
                Drop a message to Book your item today. It only takes a minute.
            </p>
        </div>

        <!-- data-filter does not work properly  -->
        <div class="service-tag py-5 bg-secondary">
            <div class="col-md-12">
                <ul class="nav d-flex justify-content-center">
                    <?php
                    $type_sql = mysqli_query($conn,"SELECT DISTINCT(type) AS type FROM web_trending_products");
                    $count = mysqli_num_rows($type_sql);
                    if($count > 0) {
                      while($row = mysqli_fetch_assoc($type_sql)) {
                        $type    = $row['type'];
                    ?>
                
                <li class="nav-item mx-lg-4"> 
                <a
                <?php if ($type=='Design')
                    {
                     echo 'class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300 view"';
                     //echo 'data-filter="'.$row["type"].'"';
                     echo 'data-filter=".'.strtolower($row["type"]).'"';
                    } else {
                     echo 'class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300 view"'; 
                     //echo 'data-filter="'.$row["type"].'"';
                     echo 'data-filter=".'.strtolower($row["type"]).'"';
                    }
                ?>href="#"  id='<?php echo $row['type']; ?>'> <?php echo $row['type']; ?> </a> 
                </li>
                <?php  
                  }
                }
                ?>
                </ul>
            </div>
        </div>

    </section>

    <section class="container overflow-hidden py-5">
        <div id="show"></div>
    </section>
    
    <!-- End features -->

    <!-- Start Footer -->
    <?php include('include/footer.php');?>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox -->
    <script src="assets/js/fslightbox.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {

            getFeatures('Design')

            var $designs = $('.designs').isotope({
                itemSelector: '.design',
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
            // init Isotope
          
        });

        // load products according to thier type

        $('.view').on('click', function() {
            getFeatures(this.id)
        });

        function getFeatures(id){

             $.ajax({
              url:"trending.php",
              method:"POST",
              data:{"id":id},
              success:function(data){
                $('#show').html(data);
              }
            });
        }

        // $('#myModal').modal(options)
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>




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
                     echo 'class="filter-btn nav-link btn-outline-primary active shadow rounded-pill text-light px-4 light-300"';
                     //echo 'data-filter='.".".$type.'';
                     echo 'data-filter="'.$row["type"].'"';
                    } else {
                     echo 'class="filter-btn nav-link btn-outline-primary rounded-pill text-light px-4 light-300"'; 
                     //echo 'data-filter='.".".$type.'';
                     echo 'data-filter="'.$row["type"].'"';
                    }
                ?>href="#"> <?php echo $row['type']; ?> </a> 
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
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3">

            <?php

            $pro_sql = mysqli_query($conn,"SELECT * FROM web_trending_products ");

            $count = mysqli_num_rows($pro_sql);

            if($count > 0) {
              while($data = mysqli_fetch_assoc($pro_sql)) {
            ?>
            <!--need to fetch data according to the type but here does not load data properly -->
            <div class="col-xl-3 col-md-4 col-sm-6 <?php echo $data['type']; ?>">

                <a href="#" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                    <img class="service card-img" src="<?php echo $_SESSION['basePath'] . $data['image']; ?>" alt="Card image">
                    <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                        <div class="service-work-content text-left text-light">
                            <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300" data-toggle="modal" data-target="#myModal">Order Now</span>
                            <p class="card-text"><?php echo $data['product']; ?></p>
                            <p class="card-text"><?php echo $data['price']; ?> LKR</p>
                        </div>
                    </div>
                </a>
            </div> 
            <?php
                }
            }
            ?>
        </div>

        <!-- start message form modal-->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog" style="max-width: 500px;">
             <div class="modal-content" style="height : auto;">
                <div class="modal-header" style="background-color: #507183;">
                     <span style="font-size: 23px; font-family: monospace;"><b style="color: white;letter-spacing: 1.3px;"></b></span>
                     <span class="close" data-dismiss="modal">&times;</span>
                </div>
                <div class="modal-body" style="background-color: #d6e1e9;">
                 <form method="post" id="msg_form">

                  <div class="col-sm-12" style="display: inline-flex;">
                   <div class="col-sm-6">
                     <input type="text" name="name" id="name" class="form-control" style="margin-bottom: 10px;" placeholder="Name...">
                     <input type="hidden" name="id" id="id"/>
                   </div>
                    <div class="col-sm-6">
                      <input type="text" name="email" id="email" class="form-control" style="margin-bottom: 10px;" placeholder="E-mail...">
                    </div>
                  </div>

                  <div class="col-sm-12" style="display: inline-flex;">
                   <div class="col-sm-6">
                      <input type="text" name="contact" id="contact" class="form-control" style="margin-bottom: 10px;" placeholder="Contact...">
                    </div>
                   <div class="col-sm-6">
                     <input type="text" name="qty" id="qty" class="form-control" style="margin-bottom: 10px;" placeholder="Quantity...">
                   </div>
                  </div>

                  <div class="col-sm-12" style="display: inline-flex;">
                      <textarea rows="4" cols="70" placeholder="Message..." class="form-control" style="margin-bottom: 10px;" name="msg" id="msg"></textarea>
                  </div>
                  <div class="col-sm-12">
                      <button type="button" id="submit_msg" name="submit_msg"  onclick="SendMsg()" class="btn btn-primary" style="height: 35px; width: 100px; color: white; border-color: #2CA8FF; background-color: #2CA8FF; font-size: 16px; padding: 4px 10px; margin-top: 0px; margin-left: 1.5%;">Send</button>
                  </div>
                 </form>
                </div>
             </div>
            </div>
        </div>

        <!-- end message form -->

    </section>
    
    <!-- End features -->

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
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.Design',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });

        $('#myModal').modal(options)
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>




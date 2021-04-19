<?php  include('include/config.php');   ?>
<!--start head-->
<?php  include('include/head.php');   ?>
<!--end head-->


<div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3">
    
    <?php
    $type = $_POST['id'];

    if(isset($_POST['id'])){

        $pro_sql = mysqli_query($conn,"SELECT * FROM web_trending_products WHERE type='$type' ");
     }

    $count = mysqli_num_rows($pro_sql);

    if($count > 0) {
      while($data = mysqli_fetch_assoc($pro_sql)) {
    ?>

        <div class="col-xl-3 col-md-4 col-sm-6">
            <?php echo 
            '<a href="details.php?itemID='.$data['id'].'" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">';
            ?>
                <img class="service card-img" src="<?php echo $_SESSION['basePath'] . $data['image']; ?>" alt="<?php echo $data['product']; ?>">
                <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                    <div class="service-work-content text-left text-light">
                        <p class="card-text"><?php echo $data['product']; ?><br>
                        <?php echo $data['price']; ?> LKR</p>

                        <?php 
                        ?> 
                        <?php if (empty($_SESSION["userID"])): ?>
                            <p class="text-right buttons">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300" onclick="loginPage()">Add to Cart</span>
                            </p>
                        <?php else: ?>
                             <p class="text-right buttons">
                                <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300">Add to Cart</span>
                            </p> 
                        <?php endif ?>
                    </div>
                </div>
            </a>
        </div> 
        
    <?php
        }
    }else{
    ?>
        <h3 class="feature-work-title h4 text-muted light-300">Not available products under this category..</h3>
    <?php
    }
    ?>

 </div>
 <script>
     
    // Add to the Cart 
    // function addCart(itemid){

    //   // var product_qty =document.getElementById('product_qty').value; 
    //    $.ajax({
    //         url:"details.php",
    //         method:"POST",
    //         data:{"itemid":itemid},
    //         success:function(data){
    //             alert(data)
    //         }
    //     });
    // }

    //Url Login To the 
    function loginPage(){
      window.location.href = "./login.php";
    }
 </script>
<?php  include('include/config.php');   ?>
<!--start head-->
<?php  include('include/head.php');   ?>
<!--end head-->

<div class="row designs gx-lg-5">
    <?php
    $id = $_POST['id'];

    if(isset($_POST['id'])){

        $pro_sql = mysqli_query($conn,"SELECT P.name as name, P.image as image FROM web_product_rel R INNER JOIN web_products P ON R.product_id=P.id WHERE R.type_id='$id' ");
    }else{
        $pro_sql = mysqli_query($conn,"SELECT P.name as name, P.image as image FROM web_product_rel R INNER JOIN web_products P ON R.product_id=P.id WHERE R.type_id='1' ");
    }

    $count = mysqli_num_rows($pro_sql);

    if($count > 0) {
      while($data = mysqli_fetch_assoc($pro_sql)) {
    ?>

        <a href="#" class="col-sm-6 col-lg-4 text-decoration-none"style="padding-bottom: 10px;">
            <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                <?php
                    $pic = $data['image'];
                    if(empty($pic)){
                ?>
                <img class="card-img-top" src="./assets/img/works-1.png" alt="<?php echo $data['name']; ?>">
                <?php
                    }else{
                ?>
                <img class="card-img-top" src="<?php echo $_SESSION['basePath'] . $data['image']; ?>" alt="<?php echo $data['name']; ?>">
                <?php
                    }
                ?>
                <div class="card-body">
                    <h5 class="card-title light-300 text-dark"><?php echo $data['name']; ?></h5>
                </div>
            </div>
        </a>
        
    <?php
        }
    }else{
    ?>
        <h3 class="feature-work-title h4 text-muted light-300">Not available products under this category..</h3>
    <?php
    }
    ?>
</div>
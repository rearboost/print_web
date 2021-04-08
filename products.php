<?php  include('include/config.php');   ?>

<div class="row designs gx-lg-5">
    <?php
    $id = $_POST['id'];

    $pro_sql = mysqli_query($conn,"SELECT * FROM web_product_rel R INNER JOIN web_products P ON R.product_id=P.id WHERE R.type_id='$id' ");

    $count = mysqli_num_rows($pro_sql);

    if($count > 0) {
      while($data = mysqli_fetch_assoc($pro_sql)) {
    ?>

        <a href="#" class="col-sm-6 col-lg-4 text-decoration-none Design">
            <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                <img class="card-img-top" src="./assets/img/works-1.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title light-300 text-dark"><?php $data['name']; ?></h5>
                </div>
            </div>
        </a>
        
    <?php
        }
    }
    ?>
</div>
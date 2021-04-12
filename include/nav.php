<?php
// session_start(); 
?>
<link rel="stylesheet" type="text/css" href="Cart_icon.css">
<nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand h1" href="index">
            <!-- <i class='bx bx-buildings bx-sm text-dark'></i> -->
            <img src="./assets/img/nav_img.png" alt="Navigate Printers & Advertising" style="height:30px; width:30px;">
            <span class="text-dark h5">NAVIGATE </span> <span class="text-primary h5"> PRINTERS</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
            <div class="flex-fill mx-xl-5 mb-2">
                <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="work">Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="features">Trending Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary rounded-pill px-3" href="contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <a class="nav-link" href="cart"><i class='bx bx-cart bx-sm text-primary'></i>
                <span class='badge badge-warning' id='lblCartCount'></span></a>
                <!-- <a class="nav-link" href="#"><i class='bx bx-user-circle bx-sm text-primary'></i></a>
                <a class="nav-link" href="#"><i class='bx bx-power-off bx-sm text-primary'></i></a>
 -->
                <?php
                    if(empty($_SESSION['userID'])){
                        echo '<a href="login.php"><i class="bx bx-user-circle bx-sm text-primary"></i></a>';
                    }else{
                        echo '<a href="logout.php"><i class="bx bx-power-off bx-sm text-primary"></i></a>';
                    }
                 ?>
            </div>
        </div>
    </div>
</nav>

<script>
 function loadDoc() {

        setInterval(function(){ 

            var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("lblCartCount").innerHTML = this.responseText;
                      //  document.getElementById("noti_text").innerHTML = this.responseText;    
                    }
                };
                xhttp.open("GET", "./controller/common.php", true);
                xhttp.send();

            }, 1500);
  }

  loadDoc();
</script>
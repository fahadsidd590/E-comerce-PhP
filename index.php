<!DOCTYPE html>
<?php require_once('./dbconn.php') ?>
<?php 
        if(isset($_GET['name'])){
            session_destroy();
            header("location:./index.php");
            // session_cache_expire();
        }
    ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
  
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="index.php">
            <img src="./images/logo/pageHeaderTitleImage_en_US.png" width="110" height="100" class="d-inline-block  align-top img-fluid" alt="UCLAN">
            <h3 class="d-inline-block linka">Student Shop</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item  active ">
                    <a class="nav-link linka" href="./index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link linka" href="./products.php">Products</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link linka" href="./cart.php">Cart</a>
                </li>
                <?php
                if(!isset($_SESSION['user_name'])){
                ?>
                <li class="nav-item ">
                    <a class="nav-link linka" href="./Signup.php">Signup</a>
                </li>
                <?php } else{?>
                    <li class="nav-item ">
                    <a class="nav-link linka" href="./index.php?name=logout">Logout</a>
                </li><?php }?>
            </ul>
        </div>
    </nav>

    <!-- banner section -->
    <!-- Hero Banner Section -->
    <section class="hero-banner ">
        <div class="container-fluid main-section">
            <div class="row">
                <div class="offset-lg-2 col-lg-8 section-part text-center">
                    <h1>Welcome to Student Shop</h1>
                    <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore eta. Ut enim ad minim veniam,
                        quis nostrud exercgiat nulla deserunt mollit anim id est laborum.</P>
                    <button class="btn btn-danger">Click Me</button>
                </div>
            </div>
            <i class="fa fa-angle-double-down blink" aria-hidden="true"></i>
        </div>
    </section>
    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <h3>Offers</h3>
            </div>
        </div>
        <div class="row p-auto m-auto">
            <?php
            $sql = "SELECT * FROM tbl_offers";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="col-12 col-lg-4 py-3">
                        <div class="card card1" style="width: 18rem;">
                            <div class="card-body">
                                <h3 class="card-title" style="    color: yellow;"><?php echo $row["offer_title"]; ?></h3>
                                <p class="card-text"><?php echo $row["offer_dec"]; ?></p>

                            </div>
                        </div>

                    </div>
                    <!-- echo "id: " . $row["offer_id"]. " - Name: " . $row["offer_title"]. " " . $row["offer_dec"]. "<br>"; -->
            <?php }
            } else {
                echo "<script>alert('0 results')</script>";
            }
            mysqli_close($conn);
            ?>

        </div>
    </section>
    <!-- banner section end -->
    <section class="container py-4">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-12 embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/r4W6gen0s-g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-12 col-lg-6 col-12">
                <video class="embed-responsive" controls poster="/images/w3html5.gif">
                    <source src="./video/together.mp4" type="video/mp4">

                </video>
            </div>
        </div>
    </section>
    <footer class="w-100 py-4 flex-shrink-0 bg-dark">
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white">Student Shop.</h5>
                    <img src="./images/logo/pageHeaderTitleImage_en_US.png" width="110" height="100" class="d-inline-block  align-top img-fluid" alt="UCLAN">

                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="cart.html">Cart</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-white mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Get started</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-white mb-3">Newsletter</h5>
                    <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
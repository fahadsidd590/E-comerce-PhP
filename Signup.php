<!DOCTYPE html>
<?php require_once('./dbconn.php') ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/31ea70eb0f.js" crossorigin="anonymous"></script>
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
                <li class="nav-item ">
                    <a class="nav-link linka" href="./Signup.php">Signup</a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if (isset($_POST['submit'])) {
        date_default_timezone_set("America/New_York");
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $date = date('m/d/Y h:i:s ', time());
        $sql = "INSERT INTO `tbl_users`( `user_full_name`, `user_address`, `user_email`, `user_pass`, `user_timestamp`) 
            VALUES ('$name','$address','$email','$password','$date')";
        if (mysqli_query($conn, $sql)) {
          echo '<div class="alert alert-success">
          <strong>Success!</strong> Account created.
        </div>';
            header("./Signup.php");
           
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }
    ?>
    <!-- banner section -->
    <!-- signup form -->
    <section class="container">
        <h1>Sign Up</h1>
        <form method="POST" action="./Signup.php" class="form1">
            <div class="form-group">
                <label for="exampleFormControlInput2">Full Name</label>
                <input type="text" name="fullname" class="form-control form-control-lg" id="exampleFormControlInput2" required placeholder="Enter Full name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" name="email" class="form-control form-control-lg" id="exampleFormControlInput1" required placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput3">Password</label>
                <p>Must At least one number and one uppercase and one lowercase letter and at least 8 character or more</p>
                <input type="password" onclick="show()" onkeyup="validate()" name="password" class="form-control form-control-lg" id="exampleFormControlInput3" required>
            </div>
            <div class="card card2 bg-light p-3">
                <h4>Password must contain the following</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text"><i class="icon fa fa-times fa-fw" aria-hidden="true"></i> A lowercase letter</li>
                    <li class="list-group-item text"><i class="icon fa fa-times fa-fw" aria-hidden="true"></i> A capital (uppercase) letter</li>
                    <li class="list-group-item text"><i class="icon fa fa-times fa-fw" aria-hidden="true"></i> A number</li>
                    <li class="list-group-item text"><i class="icon fa fa-times fa-fw" aria-hidden="true"></i> Minmun 8 character</li>
                </ul>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput4">Confirm Password</label>
                <input type="password" onfocusout="passvalidate()" class="form-control form-control-lg" id="exampleFormControlInput4" required placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control form-control-lg" required name="address" id="exampleFormControlTextarea1" rows="3" placeholder="Enter address"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control form-control-lg btn btn-primary" id="exampleFormControlInput5" name="submit" value="submit">
            </div>
        </form>
    </section>


    <!-- end form -->
    <!-- footer -->
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
    <script src="./js/script.js"></script>

</body>

</html>
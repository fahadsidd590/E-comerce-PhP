<!DOCTYPE html>
<?php require_once('./dbconn.php') ?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
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
        <li class="nav-item  ">
          <a class="nav-link linka" href="./index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active ">
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

  <!-- navbar bar t filter data  -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link pro active" onclick="showproduct(0)">All item</a>
    </li>
    <li class="nav-item">
      <a class="nav-link pro " onclick="showproduct(1)">Hoodie</a>
    </li>
    <li class="nav-item">
      <a class="nav-link pro" onclick="showproduct(2)">Jumper</a>
    </li>
    <li class="nav-item">
      <a class="nav-link pro" onclick="showproduct(3)">Tshirt</a>
    </li>
  </ul>
  

  <!-- end -->
  <!-- products -->
  <section class="container product">
  <input type="text" class="m-5 form-control-lg" style=" border-radius: 20px;" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="search my name">
    <div class="row products two mt-5">

      <?php
      $sql = "SELECT * FROM tbl_products";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $i=0;
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-12 cards1 col-lg-4 py-3">
            <div  class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo$row["product_image"];?>" alt="Card image cap">
              <div class="card-body bg-light">
                <h3 class="card-title"><?php echo $row["product_title"];?></h3>
                <p class="card-text"><?php echo $row["product_desc"];?><a href="./item.php?product_id=<?php echo $row["product_id"];?>">Read more.</a></p>
                <h5><?php echo $row["product_price"];?></h5>
                <a onclick="addcart(<?php echo $i;?>)"  class="btn btn-primary">Buy Now</a>
              </div>
            </div>

          </div>
          <!-- echo "id: " . $row["offer_id"]. " - Name: " . $row["offer_title"]. " " . $row["offer_dec"]. "<br>"; -->
      <?php $i=$i+1;}
      } else {
        echo "<script>alert('0 results')</script>";
      }

      ?>
    </div>

  </section>
  <section class="hoodie container  notshow products ">
    <div class="row hoodies  two mt-5">
    <?php
      $sql = "SELECT * FROM tbl_products WHERE product_type='UCLan Hoodie'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-12 col-lg-4 py-3">
            <div class="card" id="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo$row["product_image"];?>" alt="Card image cap">
              <div class="card-body bg-light">
                <h3 class="card-title"><?php echo $row["product_title"];?></h3>
                <p class="card-text"><?php echo $row["product_desc"];?><a href="./item.php?product_id=<?php echo $row["product_id"];?>">Read more.</a></p>
                <h5><?php echo $row["product_price"];?></h5>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>
          <!-- echo "id: " . $row["offer_id"]. " - Name: " . $row["offer_title"]. " " . $row["offer_dec"]. "<br>"; -->
      <?php }
      } else {
        echo "<script>alert('0 results')</script>";
      }
      ?>
    </div>
  </section>
  <section class="jumper container notshow products ">
    <div class="row jumpers two mt-5">
    <?php
      $sql = "SELECT * FROM tbl_products WHERE product_type='UCLan Logo Jumper'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-12 col-lg-4 py-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo$row["product_image"];?>" alt="Card image cap">
              <div class="card-body bg-light">
                <h3 class="card-title"><?php echo $row["product_title"];?></h3>
                <p class="card-text"><?php echo $row["product_desc"];?><a href="./item.php?product_id=<?php echo $row["product_id"];?>">Read more.</a></p>
                <h5><?php echo $row["product_price"];?></h5>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>
          <!-- echo "id: " . $row["offer_id"]. " - Name: " . $row["offer_title"]. " " . $row["offer_dec"]. "<br>"; -->
      <?php }
      } else {
        echo "<script>alert('0 results')</script>";
      }
      ?>
    </div>
  </section>
  <section class="tshirt container notshow products ">
    <div class="row tshirts  two mt-5">
    <?php
      $sql = "SELECT * FROM tbl_products WHERE product_type='UCLan Logo Tshirt'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-12 col-lg-4 py-3">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="<?php echo$row["product_image"];?>" alt="Card image cap">
              <div class="card-body bg-light">
                <h3 class="card-title"><?php echo $row["product_title"];?></h3>
                <p class="card-text"><?php echo $row["product_desc"];?><a href="./item.php?product_id=<?php echo $row["product_id"];?>">Read more.</a></p>
                <h5><?php echo $row["product_price"];?></h5>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>
          <!-- echo "id: " . $row["offer_id"]. " - Name: " . $row["offer_title"]. " " . $row["offer_dec"]. "<br>"; -->
      <?php }
      } else {
        echo "<script>alert('0 results')</script>";
      }
      ?>
    </div>
  </section>
  <!-- end -->

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
          <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt.</p>
          <form>
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
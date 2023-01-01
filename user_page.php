<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "css/css.php"; ?>
   <title>Halaman Pengguna - Furious Garage</title>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   <style>
      .dropdown-toggle::after {
         content: none;
      }
   </style>
</head>

<body>
   <!-- NAVBAR -->
   <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white d-flex justify-content-around">
      <div class="container">
         <a class="navbar-brand" href="#">
            <h1 class="fs-4 mb-0">Furious Garage</h1>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                  <span class="nav-link" href="">Hi,
                     <?php echo $_SESSION['user_name'] ?>
                  </span>
               </li>
            </ul>
            <div class="btn-group">
               <button type="button" class="btn btn-primary ms-lg-3 dropdown-toggle d-flex align-items-center gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bx bxs-cog"></i>settings
               </button>
               <ul class="dropdown-menu">
                  <li><a class="dropdown-item d-flex align-items-center gap-2" href="user_profile.php"><i class="bx bxs-user"></i> Profile</a></li>
                  <li>
                     <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item d-flex align-items-center gap-2" href="logout.php"><i class='bx bxs-log-out'></i> Logout</a></li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
   <!-- END NAVBAR -->

   <!-- PRODUCT -->
   <section id="product" class="bg-light">
      <div class="container">
         <div class="row mb-4">
            <a class="nav-link" href="#product">
               <h4>Product</h4>
            </a>
         </div>
         <div class="row g-4">
            <?php
            $sql = "SELECT * FROM products";
            $results = mysqli_query($conn, $sql);
            if ($results) {
               while ($row =  mysqli_fetch_assoc($results)) {
                  $namaKos = $row['name'];
                  $hargaKos = $row['price'];
                  echo '<div class="col-md-4">
                  <div class="products-post card-effect">
                     <img src="uploads/' . $row['img'] . '" alt="">
                     <h5 class="mt-4"> ' . $namaKos . '</h5>
                     <p>Rp' . $hargaKos . '</p>
                     <a href="desc_product.php?id=' . $row['id'] . '" class="btn btn-primary">See Details</a>
                  </div>
               </div>';
               }
            }
            ?>

         </div>
      </div>
   </section>
   <!-- END PRODUCT -->

   <!-- FOOTER -->
   <?php include "views/footer.php"; ?>
   <!-- END FOOTER -->
</body>

</html>
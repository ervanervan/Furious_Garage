<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['pemilikbengkel_name'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "css/css.php"; ?>
    <title>Pemilikbengkel page - Furious Garage</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand logo-fg" href="#">
                <img src="img/FuriousGarageSolid.png" alt="FuriousGarageSolid.png">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">Hi,
                            <?php echo $_SESSION['pemilikbengkel_name'] ?>
                        </span>
                    </li>
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary ms-lg-3 dropdown-toggle d-flex align-items-center gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bxs-cog"></i>settings
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item d-flex align-items-center gap-2" href="bengkel_profile.php"><i class="bx bxs-user"></i> Profile</a></li>
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
    <section class="bg-light">
        <div class="container">
            <div class="btn-group">
                <a class="btn btn-primary mb-3 d-flex align-items-center gap-2" href="product.php"><i class="bx bxs-plus-circle"></i> Add Product</a>
            </div>

            <div class="table-bengkel container mx-auto">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar Sparepart</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">


                        <?php
                        $sql = "SELECT * from products";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $desc = $row['desc'];
                                $price = $row['price'];
                                $img = $row['img'];

                                echo '<tr>
                                    <th scope="row">' . $no . '</th>
                                    <td > <img class="img-bengkel" src="uploads/' . $img . '" /></td>
                                    <td>' . $name . '</td>
                                    <td>' . $price . '</td>
                                    <td>' . $desc . '</td>
                        
                                    <td>
                                        <div class="d-flex gap-2">
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#update_product" href="product_update.php?id=' . $id . '" class="text-light"><i class="bx bxs-edit-alt"></i></a>
                                        <a class="btn btn-danger" href="product_delete.php?id=' . $id . '" class="text-light"><i class="bx bxs-trash-alt"></i></a>
                                        </div>
                                    </td>
                                    </tr>';
                                $no = $no + 1;
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- END PRODUCT -->

    <!-- FOOTER -->
    <?php include "views/footer.php"; ?>
    <!-- END FOOTER -->
</body>

</html>
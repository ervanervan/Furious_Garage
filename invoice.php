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
    <title>Invoice - Furious Garage</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white d-flex justify-content-around">
        <div class="container">
            <a class="navbar-brand logo-fg" href="#">
                <img src="img/FuriousGarageSolid.png" alt="FuriousGarageSolid.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">Hi,
                            <?php echo $_SESSION['user_name'] ?>
                        </span>
                    </li>
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary ms-lg-3 dropdown-toggle d-flex align-items-center gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bxs-cog"></i> settings
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
    <section class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 mx-auto text-center">
                    <h1>Invoice</h1>
                </div>
            </div>
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id ='$id'";

            $gotResuslts = mysqli_query($conn, $sql);

            if ($gotResuslts) {
                if (mysqli_num_rows($gotResuslts) > 0) {
                    while ($row = mysqli_fetch_array($gotResuslts)) {
            ?>
                        <div class="row g-4">
                            <div class="col">
                                <div class="d-flex flex-column">
                                    <div id="print" class="d-flex gap-5">
                                        <div style="flex:0.5;" class="mb-3">
                                            <img src="uploads/<?php echo $row['img'] ?>" alt="" style="width: 100%; height:400px">
                                        </div>
                                        <div style="flex:0.5;">
                                            <h5><?php echo $row['name'] ?></h5>
                                            <p>Rp<?php echo $row['price'] ?></p>

                                            <h5 class="mt-4">Invoice number:</h5>
                                            <p>
                                                <?php
                                                function generateCode($limit)
                                                {
                                                    $code = '';
                                                    for ($i = 0; $i < $limit; $i++) {
                                                        $code .= mt_rand(0, 9);
                                                    }
                                                    return $code;
                                                }
                                                echo generateCode(16);
                                                ?>
                                            </p>
                                            <h5 class="my-3">Bayar ke:</h5>
                                            <div class="d-flex align-items-center gap-5">
                                                <div class="logoBank">
                                                    <img src="./img/BRI.png" alt="">
                                                    <p>051601044996509</p>
                                                </div>
                                                <div class="logoBank">
                                                    <img src="./img/logoBNI.png" alt="">
                                                    <p>2002032727</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <button class="btn btn-secondary" onclick="document.location='user_page.php'">Cari product lain</button>
                                <input type="button" class="btn btn-primary" onclick="printPageArea('print')" value="Cetak" />
                            </div>
                        </div>
            <?php
                    }
                }
            }

            ?>
        </div>
    </section>
    <!-- END PRODUCT -->

    <!-- FOOTER -->
    <?php include "views/footer.php"; ?>
    <!-- END FOOTER -->

</body>

</html>
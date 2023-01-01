<?php
include './config.php';

session_start();

if (!isset($_SESSION['pemilikbengkel_name'])) {
    header('location:login.php');
}

if (isset($_POST['create'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $name =  $_POST['name'];
    $price =  $_POST['price'];
    $desc =  $_POST['desc'];
    $img =  $_FILES["fileToUpload"]["name"];

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $insert = "INSERT INTO `products`( `name`, `price`, `desc`, `img`) VALUES ( '$name', '$price', '$desc', '$img')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        // echo "Data inserted succesfull";
        header('location:bengkel_page.php');
    } else {
        die(mysqli_error($conn));
    }
}
if (isset($_POST["batal"])) {
    header("location:admin_page.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <?php include "css/css.php"; ?>
    <title>Tambah Product - Furious Garage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .dropdown-toggle::after {
            content: none;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h1 class="fs-4 mb-0">Furious Garage</h1>
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
    <section class="update_card">
        <div class="d-flex justify-content-center">
            <div class="card bg_card w-50">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div class="container my-5">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row mb-4">
                                    <h4 class="text-center ">Tambah Product</h4>
                                </div>
                                <div class="row g-3 justify-content-center">
                                    <div class="col-md-12">
                                        <label style="font-weight : 600; color : black">Nama Product</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nama Product" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label style="font-weight : 600; color : black">Harga</label>
                                        <input type="text" name="price" class="form-control" placeholder="Harga" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label style="font-weight : 600; color : black">Deskripsi</label>
                                        <input type="text" name="desc" class="form-control" placeholder="Deskripsi" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label style="font-weight : 600; color : black">Gambar Product</label>
                                        <br>
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end gap-2">
                                        <a class="btn btn-danger" value="Batal" href="bengkel_page.php"> Batal </a>
                                        <input class="btn btn-primary" href="admin_page.php" type="submit" name="create" value="Create"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "views/footer.php"; ?>
    <!-- END FOOTER -->

</body>

</html>
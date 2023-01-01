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
    <title>Update Product - Furious Garage</title>
    <link rel="stylesheet" href="./css/style.css">
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
                <div class="card-body py-5">
                    <div class="col-md-8 mx-auto text-center">
                        <h1 class="fs-2">Edit Product</h1>
                    </div>
                    <?php
                    if (isset($_POST["update"])) {
                        $target_dir = "uploads/";
                        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        $id = $_GET['id'];
                        $name =  $_POST['name'];
                        $price =  $_POST['price'];
                        $desc =  $_POST['desc'];
                        $img =  $_FILES["fileToUpload"]["name"];
                        if ($_FILES["fileToUpload"]["name"]) {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if ($check !== false) {
                                echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                                print_r($_POST['old-img']);
                                $img = $_POST['old-img'];
                            }
                        }

                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                                $updte = "UPDATE `products` SET `name` = '$name', `price` ='$price', `desc` ='$desc', `img` ='$img' WHERE `id`= '$id'";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                                $updte = "UPDATE `products` SET `name` = '$name', `price` ='$price', `desc` ='$desc' WHERE `id`= '$id'";
                            }
                        }
                        $results = mysqli_query($conn, $updte);
                        // print_r($results);

                        header('location:bengkel_page.php');
                    }
                    ?>
                    <?php
                    if (isset($_POST["batal"])) {
                        header("location:bengkel_page.php");
                    }
                    ?>
                    <div class="d-flex justify-content-center mt-4">
                        <form method="post" enctype="multipart/form-data" class="">
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM products WHERE id ='$id'";

                            $gotResuslts = mysqli_query($conn, $sql);

                            if ($gotResuslts) {
                                if (mysqli_num_rows($gotResuslts) > 0) {
                                    while ($row = mysqli_fetch_array($gotResuslts)) {
                                        // print_r($row['name']);
                            ?>
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label style="font-weight : 600; color : black">Nama Product</label>
                                                <input type="text" name="name" class="form-control" placeholder="Nama Product" required value="<?php echo $row['name']; ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label style="font-weight : 600; color : black">Harga</label>
                                                <input type="text" name="price" class="form-control" placeholder="Harga" required value="<?php echo $row['price']; ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label style="font-weight : 600; color : black">Deskripsi</label>
                                                <input type="text" name="desc" class="form-control" placeholder="Deskripsi" required value="<?php echo $row['desc']; ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label style="font-weight : 600; color : black">Gambar Product</label>
                                                <br>
                                                <img src="uploads/<?php echo $row['img'] ?>" alt="" name="old-img" style="width: 300px">
                                            </div>
                                            <div class="col-md-12">
                                                <label style="font-weight : 600; color : black">Update Gambar Product</label>
                                                <br>
                                                <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row['img']; ?>">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-end gap-2 mt-3">
                                                <input class="btn btn-danger" value="Batal" name="batal" type="submit"></input>
                                                <input class="btn btn-primary" type="submit" name="update" value="Update"></input>
                                            </div>
                                        </div>

                            <?php
                                    }
                                }
                            }


                            ?>

                        </form>
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
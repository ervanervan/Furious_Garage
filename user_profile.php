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
    <title>User Profiles - Furious Garage</title>
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

    <section class="update_card">
        <div class="d-flex justify-content-center">
            <div class="card bg_card w-50">
                <div class="card-body py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 mx-auto text-center">
                                <h4>Edit Profil</h4>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST["update"])) {
                            $userNewName  =    $_POST['updateUserName'];
                            $userNewEmail =    $_POST['userEmail'];
                            $loggedInUser = $_SESSION['user_name'];

                            $sql = "UPDATE user SET name = '$userNewName', email ='$userNewEmail' WHERE name = '$loggedInUser'";

                            $results = mysqli_query($conn, $sql);
                            $_SESSION['user_name'] = $userNewName;
                            header('location:user_page.php');
                        }
                        ?>
                        <?php
                        if (isset($_POST["batal"])) {
                            header("location:user_page.php");
                        }
                        ?>
                        <div class="d-flex justify-content-center mt-4">
                            <form method="post">
                                <?php
                                $currentUser = $_SESSION['user_name'];
                                $sql = "SELECT * FROM user WHERE name ='$currentUser'";

                                $gotResuslts = mysqli_query($conn, $sql);

                                if ($gotResuslts) {
                                    if (mysqli_num_rows($gotResuslts) > 0) {
                                        while ($row = mysqli_fetch_array($gotResuslts)) {
                                ?>
                                            <div class="row g-3 justify-content-center">
                                                <div class="col-md-12">
                                                    <label for="username">Username</label>
                                                    <input type="text" name="updateUserName" class="form-control" required value="<?php echo $row['name']; ?>">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="email">Email Address</label>
                                                    <input type="text" name="userEmail" class="form-control" required value="<?php echo $row['email']; ?>">
                                                </div>
                                                <div class="col-md-12 d-flex justify-content-end gap-2">
                                                    <input class="btn btn-danger" href="admin_page.php" value="Batal" name="batal" type="submit"></input>
                                                    <input class="btn btn-primary" href="admin_page.php" type="submit" name="update" class="btn btn-info" value="Update"></input>
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
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "views/footer.php"; ?>
    <!-- END FOOTER -->

</body>

</html>
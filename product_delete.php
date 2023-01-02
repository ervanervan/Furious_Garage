<?php

include './config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `products` where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:bengkel_page.php');
    } else {
        die(mysqli_error($conn));
    }
}

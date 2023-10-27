<?php
include("./function.php");
// echo $_SESSION['user'];
if (empty($_SESSION['user'])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- @theme style -->
    <link rel="stylesheet" href="assets/style/theme.css">

    <!-- @Bootstrap -->
    <link rel="stylesheet" href="assets/style/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- @script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- @tinyACE -->
    <script src="https://cdn.tiny.cloud/1/5gqcgv8u6c8ejg1eg27ziagpv8d8uricc4gc9rhkbasi2nc4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <main class="admin">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <div class="content-left">
                        <div class="wrap-top">
                            <img src="assets/icon/admin-logo.png" alt="">
                            <h5>Jong Deng News</h5>
                        </div>
                        <div class="wrap-center">
                            <?php

                            global $connection;
                            $id = $_SESSION['user'];
                            $sql = "SELECT * FROM `btl_user` WHERE `id`='$id'";
                            $rs = $connection->query($sql);
                            $row = mysqli_fetch_assoc($rs);
                            ?>
                            <img src="./assets/admin_image/<?php echo $row['profile'] ?>" alt="" width="50px" height="50px">
                            <h6>Welcome Admin <?php echo $row['username'] ?></h6>
                        </div>
                        <div class="wrap-bottom">
                            <ul>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>MAIN MENU</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="view-post.php">View Post</a>
                                            <a href="add-post.php">Add New</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>News</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./view-post-news.php">View News</a>
                                            <a href="./add-post-news.php">Add News</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Logo</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./view_logo.php">View logo</a>
                                            <a href="./add_logo.php">Add logo</a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Abouts Us</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./list_abouts.php">View about</a>
                                            <a href="./abouts_us.php">Add about</a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="parent">
                                    <a class="parent" href="javascript:void(0)">
                                        <span>Follower</span>
                                        <img src="assets/icon/arrow.png" alt="">
                                    </a>
                                    <ul class="child">
                                        <li>
                                            <a href="./view_follow.php">View Follow Us</a>
                                            <a href="./add-follow_us.php">Add follow us</a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="parent">
                                    <a class="parent" href="./show_feedback.php">
                                        <span>Show feedback</span>

                                    </a>

                                </li>

                                <li class="parent">
                                    <a class="parent" href="./logout.php">
                                        <span>Logout</span>

                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
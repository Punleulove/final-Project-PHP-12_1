<?php
include("function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Login</title>
    <link rel="stylesheet" href="assets/style/theme.css">
</head>

<body>
    <div class="content-login">
        <form method="post">
            <label>Name or Email</label>
            <input type="text" class="box" name="name_email">
            <label>Password</label>
            <input type="password" class="box" name="password">
            <div class="wrap-btn">
                <a href="register.php" class="btn">Register?</a>&ensp;
                <input type="submit" class="btn" name="btn_login" value="LOGIN">
            </div>
        </form>
    </div>
</body>
<!-- <script>
    $(document).ready(function() {
        swal({
            title: "ERROR",
            text: "Login error!",
            icon: "error",
            button: "Try again!",
        });
    })
</script> -->

</html>
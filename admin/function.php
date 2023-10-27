<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
$connection = new mysqli('localhost', 'root', '', 'project_12_1');

function Register()
{
    global $connection;

    if (isset($_POST['btn_register'])) {
        $username = $_POST['username'];
        $gmail = $_POST['gmail'];
        $pass = $_POST['password'];
        $profile = $_FILES['profile']['name'];


        if (!empty($username) && !empty($gmail) && !empty($pass) && !empty($profile)) {
            $profile = rand(1, 9999) . $profile;
            $path = './assets/admin_image/' . $profile;
            move_uploaded_file($_FILES['profile']['tmp_name'], $path);
            $pass = md5($pass);



            $sql = "INSERT INTO `btl_user`( `username`, `gmail`, `password`, `profile`)
            VALUES ('$username','$gmail','$pass','$profile')";
            $rs = $connection->query($sql);

            if ($rs == true) {
                header('location:login.php');
            }
        }
    }
}
Register();

session_start();
function login()
{
    global $connection;
    if (isset($_POST['btn_login'])) {
        $name_email = $_POST['name_email'];
        $pass = $_POST['password'];

        if (!empty($name_email) && !empty($pass)) {
            $pass = md5($pass);


            $sql = "SELECT * FROM `btl_user` WHERE (`username`='$name_email' OR `gmail`='$name_email') AND  `password`='$pass'";
            $rs = $connection->query($sql);
            $row = mysqli_fetch_assoc($rs);
            if (!empty($row)) {
                $id = $row['id'];
                $_SESSION['user'] = $id;
                header("location:index.php");
            } else {
                echo '
                   <script>
                                $(document).ready(function() {
                                swal({
                                title: "ERROR",
                                text: "Login error!",
                                icon: "error",
                                button: "Try again!",
                                });
                                })
                </script>
                ';
            }
        }
    }
}
login();

function Logout()
{
    if (isset($_POST['btn-logout'])) {
        unset($_SESSION['user']);
    }
}
Logout();


function Add_logo()
{
    global $connection;
    if (isset($_POST['btn_logo'])) {
        $status = $_POST['status'];
        $thamnail = $_FILES['thamnail']['name'];
        $path = $_FILES['thamnail']['tmp_name'];
        if (!empty($status) && !empty($thamnail)) {
            $thamnail = rand(1, 9999) . $thamnail;
            $path = './assets/Logo/' . $thamnail;
            move_uploaded_file($_FILES['thamnail']['tmp_name'], $path);
            $sql = "INSERT INTO `tbl_logo`( `thumnail`, `status`) 
            VALUES ('$thamnail','$status')";
            $rs = $connection->query($sql);
            if ($rs == true) {
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Add logo success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
            } else {
                echo '
                   <script>
                                $(document).ready(function() {
                                swal({
                                title: "ERROR",
                                text: "Can not add logo!",
                                icon: "error",
                                button: "Try again!",
                                });
                                })
                </script>
                ';
            }
        }
    }
}
Add_logo();


function Show_logo()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_logo`";
    $rs = $connection->query($sql);
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $id = $row['id'];
            $thumnail = $row['thumnail'];
            $status = $row['status'];
            echo '
                <tr>
                            <td><img src="./assets/Logo/' . $row['thumnail'] . '" width="80px" height="80px"></td>
                            <td>' . $row['status'] . '</td>
                            <td>' . $row['create_date'] . '</td>
                            <td width="150px">
                                <a href="update_logo.php?id=' . $row['id'] . '  " class="btn btn-primary">Update</a>
                                <button type="button" remove-id="' . $row['id'] . '" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Remove
                                </button>
                </tr>
            ';
        }
    }
}


function Update_logo()
{
    global $connection;
    if (isset($_POST['btn-update-logo'])) {

        $id = $_GET['id'];
        $status = $_POST['status'];
        $thamnail = $_FILES['thamnail']['name'];
        $path = $_FILES['thamnail']['tmp_name'];
        if (empty($thamnail)) {
            $thamnail = $_POST['old_thamnail'];
        } else {
            $thamnail = rand(1, 9999) . $thamnail;
            $path = './assets/Logo/' . $thamnail;
            move_uploaded_file($_FILES['thamnail']['tmp_name'], $path);
        }
        if (!empty($status) && !empty($thamnail)) {
            $sql = "UPDATE `tbl_logo` SET `thumnail`='$thamnail',`status`='$status' WHERE `id`=$id";
            $rs = $connection->query($sql);
            if ($rs == true) {
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Update logo success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
            } else {
                echo 'Error updating';
            }
        }
    }
}
Update_logo();

function Delete_logo()
{
    global $connection;
    if (isset($_POST['btn-delete-logo'])) {
        $delete_id = $_POST['remove_id'];
        $sql = "DELETE FROM `tbl_logo` WHERE `id`=$delete_id";
        $rs = $connection->query($sql);
        if ($rs == true) {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Delete logo success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        } else {
            echo 'Error deleting';
        }
    }
}
Delete_logo();


function Add_news()
{
    if (isset($_POST['btn-add_news'])) {
        global $connection;
        $post_by = $_SESSION['user'];
        $title = $_POST['title'];
        $category = $_POST['Category'];
        $news_type = $_POST['News_type'];
        $thumnail = $_FILES['Thumnail']['name'];
        $banner = $_FILES['Banner']['name'];
        $description = $_POST['Description'];

        if (!empty($title) && !empty($category) && !empty($news_type) && !empty($thumnail) && !empty($banner) && !empty($description)) {
            $thumnail = rand(1, 1999) . $thumnail;
            $path = "./assets/image/$thumnail";
            move_uploaded_file($_FILES['Thumnail']['tmp_name'], $path);

            $banner = rand(1, 1999) . $banner;
            $path = "./assets/image/$banner";
            move_uploaded_file($_FILES['Banner']['tmp_name'], $path);


            $sql = "INSERT INTO `tbl_news`( `title`, `description`, `thumnail`, `banner`,`post_by`, `category`, `news_type`) 
            VALUES ('$title','$description','$thumnail','$banner','$post_by','$category','$news_type')";
            $rs = $connection->query($sql);
            if ($rs == true) {
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Insert news success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
            } else {
                echo 'Error insert';
            }
        } else {
            echo 'Error wrong data';
        }
    }
}
Add_news();


function Get_news()
{
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = &$_GET['page'];
    }

    $total_news = ($page - 1) * 5;
    global $connection;
    $sql = "SELECT btl_user.username,tbl_news.*FROM tbl_news  INNER JOIN btl_user ON tbl_news.post_by=btl_user.id ORDER BY `id` DESC  LIMIT $total_news,5";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
        <tr>
                            <td class="title">' . $row['title'] . '</td>
                            <td class="des">' . $row['description'] . '</td>
                            <td>' . $row['category'] . '</td>
                            <td>' . $row['news_type'] . '</td>
                            <td><img src="./assets/image/' . $row['thumnail'] . '" width="80px" style="object-fit:cover"/></td>
                            <td><img src="./assets/image/' . $row['banner'] . '"width="80px" style="object-fit:cover"/></td>
                            <td>' . $row['username'] . '</td>
                            <td>' . $row['viewer'] . '</td>
                            <td>' . $row['post_date'] . '</td>
                            <td width="150px">
                                <a href="update_news.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>
                                <button type="button" remove-id="' . $row['id'] . '"  class="btn btn-danger btn-remove " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Remove
                                </button>
                            </td>
                        </tr>
        ';
    }
}


function Remove_id()
{
    global $connection;
    if (isset($_POST['btn-remove-news'])) {
        $remove_id = $_POST['remove_id'];
        $sql = "DELETE FROM `tbl_news` WHERE `id` = '$remove_id'";
        $rs = $connection->query($sql);
        if ($rs) {

            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Delete news success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }
    }
}
Remove_id();

function update_news()
{

    global $connection;
    if (isset($_POST['btn-update_news'])) {
        $id = $_GET['id'];
        $post_by = $_SESSION['user'];
        $title = $_POST['title'];
        $category = $_POST['Category'];
        $news_type = $_POST['News_type'];
        $thumnail = $_FILES['Thumnail']['name'];
        $old_Thumnail = $_POST['old_thumnail'];
        $banner = $_FILES['Banner']['name'];
        $old_banner = $_POST['old_banner'];
        $description = $_POST['Description'];
        if (empty($thumnail)) {
            $thumnail = $old_Thumnail;
        } else {
            $thumnail = rand(1, 1999) . $thumnail;
            $path = "./assets/image/$thumnail";
            move_uploaded_file($_FILES['Thumnail']['tmp_name'], $path);
        }
        if (empty($banner)) {
            $banner = $old_banner;
        } else {
            $banner = rand(1, 1999) . $banner;
            $path = "./assets/image/$banner";
            move_uploaded_file($_FILES['Banner']['tmp_name'], $path);
        }
        if (!empty($title) && !empty($category) && !empty($news_type) && !empty($description)) {
            $sql = "UPDATE `tbl_news` SET `title`='$title',`description`='$description',`thumnail`='$thumnail',`banner`='$banner',`post_by`='$post_by',`category`='$category',`news_type`='$news_type' WHERE `id`='$id'";
            $rs = $connection->query($sql);
            if ($rs == true) {
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Update news success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
            }
        } else {
            echo 'error';
        }
    }
}
;
update_news();
function get_pagenation($table)
{
    global $connection;
    $sql = "SELECT COUNT('id') as 'total' FROM `$table`";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $total_news = $row['total'];
    $total_page = ceil($total_news / 5);
    for ($i = 1; $i <= $total_page; $i++) {
        echo '
        <li>
            <a href="./view-post-news.php?page=' . $i . '">' . $i . '</a>                     
        </li>
        
        ';
    }
}
;


function abouts_us()
{
    global $connection;
    if (isset($_POST['btn-about'])) {
        $description = $_POST['Description'];
        $sql = "INSERT INTO `tbl_about_us`( `description`) 
        VALUES ('$description')";
        $rs = $connection->query($sql);
        if ($rs == true) {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "insert description  success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }
    }
}
abouts_us();

function get_about()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_about_us` WHERE 1";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {

        echo '
                    <tr>
                            <td class="title">' . $row['id'] . '</td>
                            <td class="des">' . $row['description'] . '</td>
                            <td>' . $row['create_date'] . '</td>
                            <td width="150px">
                                <a href="update_about.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>
                                <button type="button" remove-id="' . $row['id'] . '" class="btn btn-danger btn-remove " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Remove
                                </button>
                            </td>
                        </tr>
        
        
        ';
    }
}

function update_about()
{
    global $connection;
    if (isset($_POST['btn-update_about'])) {
        $up_id = $_GET['id'];
        $description = $_POST['Description'];
        $sql = "UPDATE `tbl_about_us` 
                SET `description`='$description'WHERE `id`='$up_id'";
        $rs = $connection->query($sql);
        if ($rs == true) {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Update Description success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }
    }
}
update_about();
function remove_about()
{
    global $connection;
    if (isset($_POST['btn-remove-about'])) {
        $id_remove = $_POST['remove_id'];
        $sql = "DELETE FROM `tbl_about_us` WHERE `id`='$id_remove'";
        $rs = $connection->query($sql);
        if ($rs == true) {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Update  success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }

    }

}
remove_about();
function get_feedback()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_feedback` WHERE 1";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
                 <tr>        
                            <td>' . $row['username'] . '</td>
                            <td>' . $row['gmail'] . '</td>
                            <td>' . $row['telephone'] . '</td>
                            <td>' . $row['address'] . '</td>
                            <td>' . $row['message'] . '</td>
                            <td>' . $row['feed_back_date'] . '</td>
                             <td width="150px">
                                                
                                                <button type="button" remove-id="' . $row['id'] . '" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Remove
                                                </button>
                            </td>
                        </tr>
        ';
    }
}
function remove_feedback()
{
    global $connection;
    if (isset($_POST['btn-remove-feedback'])) {
        $id_remove = $_POST['remove_id'];
        $sql = "DELETE  FROM `tbl_feedback` WHERE `id` ='$id_remove'";
        $rs = $connection->query($sql);
        if ($rs == true) {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Update  success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }
    }
}
remove_feedback();



function Insert_follow_us()
{
    global $connection;
    if (isset($_POST['btn-follow'])) {
        $thumnail = $_FILES['thumnail']['name'];
        $lable = $_POST['lable'];
        $status = $_POST['status'];
        $url = $_POST['url'];
        if (!empty($thumnail) && !empty($lable) && !empty($status) && !empty($url)) {
            $thumnail . rand(1, 99999) . $thumnail;
            $path = "./assets/icon/$thumnail";
            move_uploaded_file($_FILES['thumnail']['tmp_name'], $path);
            $sql = "INSERT INTO `tbl_followus`( `thumnail`, `label`, `status`, `url`)
            VALUES ('$thumnail','$lable','$status','$url')";
            $rs = $connection->query($sql);
            if ($rs == true) {
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "insert  success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
            }
        } else {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Wrong data!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }
    }
}
Insert_follow_us();
// https: //www.facebook.com/mrr.punleur.10?mibextid=LQQJ4d
// https://youtube.com/@pngaming6092?si=8JYHjzGh2NziBpmh

function get_follow()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_followus` WHERE 1  ORDER BY `label`  ASC";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
               <tr>
                            <td>' . $row['label'] . '</td>
                            <td><img src="./assets/icon/' . $row['thumnail'] . '" width="80px" style="object-fit:cover"/></td>
                            <td>' . $row['status'] . '</td>
                            <td>' . $row['url'] . '</td>
                            <td>' . $row['create_date'] . '</td>
                            <td width="150px">
                                <a href="./update_follow.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>
                                <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Remove
                                </button>
                            </td>
                        </tr>
        ';
    }
}
function update_follow()
{
    global $connection;
    if (isset($_POST['btn-update-follow'])) {
        $id = $_GET['id'];
        $thumnail = $_FILES['thumnail']['name'];
        $old_thumnail = $_POST['old_thamnail'];
        $lable = $_POST['lable'];
        $status = $_POST['status'];
        $url = $_POST['url'];
        if (empty($thumnail)) {
            $thumnail = $old_thumnail;
        } else {
            $thumnail . rand(1, 99999) . $thumnail;
            $path = "./assets/icon/$thumnail";
            move_uploaded_file($_FILES['thumnail']['tmp_name'], $path);
        }
        if (!empty($lable) && !empty($status) && !empty($url)) {
            $sql = "UPDATE `tbl_followus` 
            SET `thumnail`='$thumnail',`label`='$lable',`status`='$status',`url`='$url' WHERE `id`='$id'";
            $rs=$connection->query($sql);
            if($rs==true){
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Update  success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
            }
        }

    }
}
update_follow();

function remove_follow(){
       global $connection;
    if (isset($_POST['btn-remove_follow'])) {
        $id = $_POST['remove_id'];
        $sql = "DELETE FROM `tbl_followus` WHERE `id` ='$id'";
        $rs=$connection->query($sql);
        if ($rs == true) {
            echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Delete  success!",
                                icon: "success",
                                button: "OK",
                                });
                                })
                </script>
                ';
        }
    }
}
remove_follow();
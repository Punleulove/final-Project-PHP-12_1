<!-- @import jquery & sweet alert  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
$connection = new mysqli('localhost', 'root', '', 'project_12_1');


function Getlogo($status)
{
    global $connection;
    $sql = "SELECT * FROM `tbl_logo` WHERE `status` ='$status' ORDER BY `id` DESC  limit 1";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo $row['thumnail'];
}


function Get_news($category)
{
    global $connection;
    $sql = "SELECT * FROM `tbl_news` ORDER BY `Category`='$category' DESC  limit 3";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
    <div class="col-4">
                    <figure>
                        <a href="news-detail.php?id=' . $row['id'] . '&category=' . $row['category'] . '">
                            <div class="thumbnail">
                                <img src="../admin/assets/image/' . $row['thumnail'] . '" alt="" width="350px" height="200px">
                            <div class="title">
                            ្          ' . $row['title'] . ';
                            </div>
                            </div>
                        </a>
                    </figure>
                </div>
    ';
    }
}


function Detail_news()
{
    global $connection;
    $id = $_GET["id"];
    $get_viwer = "SELECT `viewer` FROM  `tbl_news` WHERE  `id` ='$id'";
    $rs = $connection->query($get_viwer);
    $row_viwer = mysqli_fetch_assoc($rs);
    $old_viwer = $row_viwer['viewer'];
    $new_viwer = $old_viwer + 1;

    $viwer_update = "UPDATE `tbl_news` SET `viewer`='$new_viwer' WHERE `id`='$id'";
    $rs_update = $connection->query($viwer_update);





    $sql = "SELECT * FROM `tbl_news` WHERE `id`='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo '
            <div class="main-news">
                        <div class="thumbnail">
                            <img src="../admin/assets/image/' . $row['banner'] . '">
                        </div>
                        <div class="detail">
                            <h3 class="title">' . $row['title'] . '</h3>
                            <div class="date">' . $row['post_date'] . '</div>
                            <div class="description">
                                ' . $row['description'] . '
                            </div>
                        </div>
                    </div>
    
    ';
}




function Populer_news()
{

    global $connection;
    $sql = "SELECT * FROM `tbl_news` ORDER BY `viewer` DESC LIMIT 1";

    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo '
                 <div class="col-8 content-left">
                    <figure>
                        <a href="news-detail.php?id=' . $row['id'] . '&category=' . $row['category'] . '">
                            <div class="thumbnail">
                                <img src="../admin/assets/image/' . $row['thumnail'] . '" alt="" width="730px" height="415px" style="object-fit:cover">
                                <div class="title">
                                   ' . $row['title'] . '
                                </div>
                            </div>
                        </a>
                    </figure>
                </div>
    
    ';
}



function Trading_news()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_news` ORDER BY `viewer` DESC LIMIT 2";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
        
                                    <i class="fas fa-angle-double-right"></i>
                                    <a href="news-detail.php?id=' . $row['id'] . '">' . $row['title'] . '</a> &ensp;
        ';
    }
}


function Related_news($category, $id)
{
    global $connection;

    $sql = "SELECT * FROM `tbl_news` WHERE `category`='$category' AND `id`!='$id'    ORDER  BY `id` DESC  limit 2";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
                        <figure>
                            <a href="news-detail.php?id=' . $row['id'] . '&category=' . $row['category'] . '">
                                <div class="thumbnail">
                                <img src="../admin/assets/image/' . $row['thumnail'] . '" alt="" width="350px" height="200px" style="object-fit:cover">
                                </div>
                                <div class="detail">
                                    <h3 class="title">' . $row['title'] . '</h3>
                                    <div class="date">' . $row['post_date'] . '</div>
                                    <div class="description">
                                    ' . $row['description'] . '
                                     </div>
                                </div>
                            </a>
                        </figure>
        ';
    }
}



function main_popculer()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_news` ORDER BY  `viewer` DESC LIMIT 1";
    $rs_id = $connection->query($sql);
    $row_id = mysqli_fetch_assoc($rs_id);
    $pop_id = $row_id['id'];


    $sql = "SELECT * FROM `tbl_news`WHERE `id` !='$pop_id' ORDER BY `viewer` DESC LIMIT 2";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
                     <div class="col-12">
                        <figure>
                            <a href="news-detail.php?id=' . $row['id'] . '&category=' . $row['category'] . '">
                                <div class="thumbnail">
                                    <img src="../admin/assets/image/' . $row['thumnail'] . '" alt="" width="350px" height="200px">
                                    <div class="title">
                                       ' . $row['description'] . '
                                    </div>
                                </div>
                            </a>
                        </figure>
                    </div>
        ';
    }
}


function Getnews_category($category, $news_type)
{
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = &$_GET['page'];
    }

    $start = ($page - 1) * 3;

    global $connection;
    $sql = "SELECT * FROM `tbl_news` WHERE category='$category' AND news_type='$news_type' ORDER BY `id` DESC LIMIT $start , 3";
    $rs_id = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs_id)) {
        echo '
                <div class="col-4">
                            <figure>
                                <a href="news-detail.php?id=' . $row['id'] . '&category=' . $row['category'] . '">
                                      <div class="thumbnail">
                                        <img src="../admin/assets/image/' . $row['thumnail'] . '" alt="" width="350px" height="200px">
                                       </div>
                                        <div class="detail">
                                        <h3 class="title">' . $row['title'] . '</h3>
                                        <div class="date">' . $row['post_date'] . '</div>
                                        <div class="description">
                                        ' . $row['description'] . '
                                      </div>
                                </a>
                            </figure>
                    </div>
                    
        ';
    }
}




function get_pagenation($category, $news_type)
{
    global $connection;
    $sql = "SELECT COUNT(`id`) as 'total' FROM `tbl_news` WHERE `category` ='$category' AND `news_type`='$news_type'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $total_news = $row["total"];
    $total_page = ceil($total_news / 3);
    for ($i = 1; $i <= $total_page; $i++) {
        echo '
                  <li>
                             <a href="' . $category . '-news-' . $news_type . '.php?page=' . $i . '">' . $i . '</a>                     
                  </li>
        
        ';
    }
}


function Shearch_news()
{
    global $connection;
    $Search = $_GET['query'];
    $sql = "SELECT * FROM `tbl_news` WHERE `title` LIKE '%$Search%'";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
        
                     <div class="col-4">
                            <figure>
                                <a href="news-detail.php?id=' . $row['id'] . '&category=' . $row['category'] . '">
                                      <div class="thumbnail">
                                        <img src="../admin/assets/image/' . $row['thumnail'] . '" alt="" width="350px" height="200px">
                                       </div>
                                        <div class="detail">
                                        <h3 class="title">' . $row['title'] . '</h3>
                                        <div class="date">' . $row['post_date'] . '</div>
                                        <div class="description">
                                        ' . $row['description'] . '
                                      </div>
                                </a>
                            </figure>
                    </div>
        ';
    }
}




function get_aboute()
{
    global $connection;
    $sql = "SELECT  `description` FROM `tbl_about_us` WHERE 1 ORDER BY `description` DESC ";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    echo $row['description'];
}

function insert_feedback()

{
    global $connection;
    if (isset($_POST['btn_feedback'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $address = $_POST['address'];
        $message = $_POST['message'];

        if (!empty($username) && !empty($email) && !empty($telephone) && !empty($address) && !empty($message)) {
            $sql = "INSERT INTO `tbl_feedback`( `username`, `gmail`, `telephone`, `address`, `message`)
             VALUES ('$username','$email','$address','$telephone','$message')";
            $rs = $connection->query($sql);
            if ($rs == true) {
                echo '
                     <script>
                                $(document).ready(function() {
                                swal({
                                title: "Success",
                                text: "Feedback success!",
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
insert_feedback();



function get_fowllow_us()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_followus` WHERE 1  ORDER BY `label`  ASC";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
                
                            <li>
                                <img src="../admin/assets/icon/' . $row['thumnail'] . '" width="40px"> <a href="' . $row['url'] . '">' . $row['status'] . '</a>
                            </li>               
           
        
        ';
    }
}
function follow_footer()
{
    global $connection;
    $sql = "SELECT * FROM `tbl_followus`  ORDER BY  `label` ASC LIMIT 3";
    $rs = $connection->query($sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        echo '
           <li>
                    <a href="' . $row['url'] . '"><img src="../admin/assets/icon/' . $row['thumnail'] . '" width="30px"  alt=""></a>
             </li>
        
        ';
    }
}


?>
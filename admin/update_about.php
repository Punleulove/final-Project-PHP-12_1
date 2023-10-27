<?php
include('sidebar.php');
$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_about_us` WHERE `id`='$id'";
$rs = $connection->query($sql);
$row = mysqli_fetch_assoc($rs);

?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Update abouts</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Description footer</label>
                        <textarea class="form-control" name="Description">
                           <?php echo $row['description'] ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-update_about" class="btn btn-success">Update</button>
                    </div>
                </form>
            </figure>
        </div>
    </div>
</div>
</div>
</div>
</main>
</body>

</html>
<?php
include('sidebar.php');


$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_news` WHERE `id` = '$id'";
$rs = $connection->query($sql);
$row = mysqli_fetch_assoc($rs);
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Update News</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select" name="Category">
                            <option value="Sport" <?php if ($row['category'] == 'Sport') echo "selected" ?>>Sport</option>
                            <option value="Socail" <?php if ($row['category'] == 'Socail') echo "selected" ?>>Socail</option>
                            <option value="Entertainterment" <?php if ($row['category'] == 'Entertainterment') echo "selected" ?>>Entertainterment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>News type</label>
                        <select class="form-select" name="News_type">
                            <option value="National" <?php if ($row['news_type'] == 'National') echo "selected" ?>>National</option>
                            <option value="International" <?php if ($row['news_type'] == 'International') echo "selected" ?>>International</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thumnail <span style="color:red">Recomment size:350x200</span></label>
                        <input type="file" class="form-control" name="Thumnail" id="Thumnail">
                        <input type="hidden" name="old_thumnail" id="" value="<?php echo $row['thumnail'] ?>">
                        <img src="./assets/image/<?php echo $row['thumnail'] ?> " id="img-thum" width="80px" style="object-fit:cover" />
                    </div>
                    <div class="form-group">
                        <label>Banner<span style="color:red">Recomment size:730x415</span></label>
                        <input type="file" class="form-control" name="Banner" id="banner">
                        <input type="hidden" name="old_banner" id="" value="<?php echo $row['banner'] ?>">
                        <img src="./assets/image/<?php echo $row['banner'] ?>" id="img-banner" width="80px" style="object-fit:cover" />

                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="Description">
                             <?php echo $row['description'] ?>
                        </textarea>

                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-update_news" class="btn btn-warning">Update</button>
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
<script>
    $(document).ready(function() {
        $('#Thumnail').change(function() {
            $('#img-thum').hide();
        })
        $('#banner').change(function() {
            $('#img-banner').hide();
        })
    });
</script>

</html>
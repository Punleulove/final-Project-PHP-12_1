<?php
include('sidebar.php');
$id = $_GET["id"];
$Sql = " SELECT * FROM `tbl_followus` WHERE `id`='$id'";
$rs = $connection->query($Sql);
$row = mysqli_fetch_assoc($rs);
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Update follow us</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Lable</label>
                        <input type="text" value="<?php echo $row['label'] ?>" name="lable" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Thumnail</label>
                        <input type="file" value="<?php echo $row['thumnail'] ?>" id="thumnail" name="thumnail" class="form-control">
                        <input type="text" name="old_thamnail" id="" value="<?php echo $row['thumnail'] ?>">
                        <img src="./assets/icon/<?php echo $row['thumnail'] ?>" id="img"  width="100px" alt="">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" value="<?php echo $row['status'] ?>" name="status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text" value="<?php echo $row['url'] ?>" name="url" class="form-control">
                    </div>
                    <!-- <div class="form-group">
                        <label>Type</label>
                        <select class="form-select">
                            <option value="">Type 1</option>
                            <option value="">Type 2</option>
                            <option value="">Type 3</option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control"></textarea>
                    </div> -->
                    <div class="form-group">

                        <button type="submit" name="btn-update-follow" class="btn btn-success">Success</button>

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

<script>
    $(document).ready(function() {
        $('#thumnail').change(function() {
           $('#img').hide();
        })
    })
</script>
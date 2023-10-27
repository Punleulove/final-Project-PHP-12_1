<?php
include('sidebar.php');
global $connection;
$id = $_GET['id'];
$rs = $connection->query("SELECT * FROM `tbl_logo` WHERE `id` = '$id'");
$row = mysqli_fetch_assoc($rs);
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Update Logo</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" name="status">
                            <option value="all" <?php if ($row['status'] == "all") echo "selected" ?>>All</option>
                            <option value="header" <?php if ($row['status'] == "header") echo "selected" ?>>Header</option>
                            <option value="footer" <?php if ($row['status'] == "footer") echo "selected" ?>>Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" id="thamnail" name="thamnail">
                        <input type="hidden" name="old_thamnail" id="" value="<?php echo $row['thumnail'] ?>">
                        <img src="./assets/Logo/<?php echo $row['thumnail'] ?>" id="img" alt="" width="100px" height="100px">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="btn-update-logo">Update logo</button>

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
        $("#thamnail").change(function(){
            $('#img').hide();
        })



    });
</script>
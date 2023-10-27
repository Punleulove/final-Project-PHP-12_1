<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Add follow us</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Lable</label>
                        <input type="text" name="lable" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Thumnail</label>
                        <input type="file" name="thumnail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>URL</label>
                        <input type="text"name="url" class="form-control">
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

                        <button type="submit" name="btn-follow" class="btn btn-success">Success</button>

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
<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Add Logo</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-select" name="status">
                            <option value="all">All</option>
                            <option value="header">Header</option>
                            <option value="footer">Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" name="thamnail">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btn_logo">Add News</button>

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
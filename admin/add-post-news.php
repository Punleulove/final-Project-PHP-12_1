<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>Add Sport News</h3>
        </div>
        <div class="bottom">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-select" name="Category">
                            <option value="Sport">Sport</option>
                            <option value="Socail">Socail</option>
                            <option value="Entertainterment">Entertainterment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>News type</label>
                        <select class="form-select" name="News_type">
                            <option value="National">National</option>
                            <option value="International">International</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thumnail <span style="color:red">Recomment size:350x200</span></label>
                        <input type="file" class="form-control" name="Thumnail">
                    </div>
                    <div class="form-group">
                        <label>Banner<span style="color:red">Recomment size:730x415</span></label>
                        <input type="file" class="form-control" name="Banner">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn-add_news" class="btn btn-success">Submit</button>
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
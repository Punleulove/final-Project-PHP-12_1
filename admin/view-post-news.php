<?php
include('sidebar.php');
?>
<div class="col-10">
    <div class="content-right">
        <div class="top">
            <h3>All News</h3>
        </div>
        <div class="bottom view-post">
            <figure>
                <form method="post" enctype="multipart/form-data">
                    <!-- <div class="block-search">
                                        <input type="text" class="form-control" placeholder="SEARCH HERE">
                                        <button type="submit">
                                        <img src="search.png" alt=""></button>
                                    </div> -->
                    <table class="table align-middle" border="1px">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Categories</th>
                            <th>News Type</th>
                            <th>Thumbnail</th>
                            <th>Banner</th>
                            <th>Post by</th>
                            <th>Viewer</th>
                            <th>Publish Date</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <?php Get_news(); ?>
                        </tr>
                    </table>
                    <ul class="pagination">
                        <?php get_pagenation('tbl_news');?>     
                        
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to remove this post?</h5>
                                </div>
                                <div class="modal-footer">
                                    <form action="" method="post">
                                        <input type="hidden" class="value_remove" name="remove_id">
                                        <button type="submit" class="btn btn-danger" name="btn-remove-news">Yes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
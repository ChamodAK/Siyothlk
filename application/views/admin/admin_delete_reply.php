<?php $page = 'delete_reply'; include 'admin_header.php'; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Delete Reply</h4>
            <div class="card-body">

                <h5 style="color: #004594"> Are you sure you want to delete this reply relevant to the topic id: <?=$post_id?> and reply id: <?=$reply_id?>?</h5>

                <div>
                    <div style="display: inline">
                        <a href="<?=base_url('index.php/admin/delete_reply_confirm/')."$post_id/"."$reply_id"?>" class="btn btn-primary"> Yes </a>
                        <a href="<?=base_url('index.php/forum/full_post/')."$post_id"?>" class="btn btn-danger"> No </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include 'admin_footer.php'; ?>
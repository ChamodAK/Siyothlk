<?php $page = 'delete_forum'; include 'admin_header.php'; ?>

<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Delete Forum Topic</h4>
        <div class="card-body">

            <h5 style="color: #004594"> Are you sure you want to delete this topic with topic id: <?=$id?>?</h5>

            <div>
                <div style="display: inline">
                    <a href="<?=base_url('index.php/admin/delete_topic_confirm/')."$id"?>" class="btn btn-primary"> Yes </a>
                    <a href="<?=base_url('index.php/home/forum')?>" class="btn btn-danger"> No </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'admin_footer.php'; ?>

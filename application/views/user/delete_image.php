<?php $page = 'delete_forum'; include 'header.php'; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Delete image from the gallery</h4>
            <div class="card-body">

                <h5 style="color: #004594"> Are you sure you want to delete this image from the gallery with topic id: <?=$id?>?</h5>

                <div>
                    <div style="display: inline">
                        <a href="<?=base_url('index.php/User_Profile/delete_image_confirm/')."$id"?>" class="btn btn-primary"> Yes </a>
                        <a href="<?=base_url('index.php/home/my_profile')?>" class="btn btn-danger"> No </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
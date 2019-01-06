<?php $page = 'delete_image'; include 'admin_header.php'; ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Delete Image from the Gallery</h4>
            <div class="card-body">

                <h5 style="color: #004594"> Are you sure you want to delete this image with image id: <?=$id?>?</h5>

                <div>
                    <div style="display: inline">
                        <a href="<?=base_url('index.php/admin/delete_image_confirm/')."$id"?>" class="btn btn-primary"> Yes </a>
                        <a href="<?=base_url('index.php/home/gallery')?>" class="btn btn-danger"> No </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php include 'admin_footer.php'; ?>
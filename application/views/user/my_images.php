<?php $panel = "my_images"; include 'my_profile_frame.php' ?>

<div class="col-md-9">
    <div class="card">
        <div class="card">
            <h4 class="card-header">My Images</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>
                <div class="row">
                    <?php if(!(empty($images))): ?>
                    <?php foreach ($images as $image) { ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a class="lightbox" href="<?php echo $image->link;?>">
                                    <img src="<?php echo $image->link; ?>" alt="Image not found" style="width: 200px; height: 150px;">
                                </a>
                                <div class="caption">
                                    <h5 style="alignment: center"><?php echo $image->comName; ?></h5>
                                    <div class="text-center"><a href = "<?php echo base_url('index.php/User_Profile/delete_image/')."$image->imageId";?>" ><i style="color: red;" class="fas fa-trash"></i></a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'my_profile_footer.php' ?>

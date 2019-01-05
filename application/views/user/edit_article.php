<?php $panel = "my_profile"; include 'my_profile_frame.php' ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">My Articles/Edit Article</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div class="container">

                    <?php echo form_open_multipart('user_profile/submit_edit_Article'); ?>

                    <div class="form-group">
                        <label> Edit Title </label>
                        <input type="text" class="form-control" name="title" value="<?=$article['title']?>" />
                    </div>

                    <div class="form-group">
                        <label> Edit Detais </label>
                        <textarea type="text" class="form-control" name="details"><?=$article['details']?></textarea>
                        <input type="hidden" name="id" value="<?=$article['id']?>" />
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>

                </div>

                <script>
                    CKEDITOR.replace( 'details' );
                </script>

            </div>
        </div>
    </div>

<?php include 'my_profile_footer.php' ?>

<?php $panel = 'wiki'; include 'admin_dashboard_frame.php'; ?>

    <div>
        <div class="card">
            <h4 class="card-header">Wiki Contents/Edit Bird</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div class="container">

                    <?php echo form_open_multipart('Admin/edit_bird_admin'); ?>

                    <div class="form-group">
                        <label> Edit Details </label>
                        <textarea type="text" class="form-control" name="details"><?=$bird['details']?></textarea>
                        <input type="hidden" name="birdId" value="<?=$bird['birdId']?>" />
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>

                    <?php echo form_close(); ?>

                </div>

                <script>
                    CKEDITOR.replace( 'details' );
                </script>

            </div>
        </div>
    </div>


<?php include 'admin_dashboard_foot.php'; ?>
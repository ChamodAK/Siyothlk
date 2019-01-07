<?php $panel = 'events'; include 'admin_dashboard_frame.php'; ?>

    <div class="card">
        <div class="card">

            <h4 class="card-header">Event/Edit Event</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div class="container">

                    <?php echo form_open_multipart('admin/submit_edit_event'); ?>

                    <div class="form-group">
                        <label> Edit Title </label>
                        <input type="text" class="form-control" name="title" value="<?=$event['title']?>" />
                    </div>

                    <div class="form-group">
                        <label> Edit Detais </label>
                        <textarea type="text" class="form-control" name="details"><?=$event['details']?></textarea>
                        <input type="hidden" name="id" value="<?=$event['id']?>" />
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

<?php include 'admin_dashboard_foot.php'; ?>
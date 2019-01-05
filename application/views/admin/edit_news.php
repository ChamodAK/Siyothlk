<?php $panel = 'news'; include 'admin_dashboard_frame.php'; ?>

    <div class="card">
        <div class="card">

            <h4 class="card-header">News/Edit News</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div class="container">

                    <?php echo form_open_multipart('admin/submit_edit_news'); ?>

                    <div class="form-group">
                        <label> Edit Title </label>
                        <input type="text" class="form-control" name="title" value="<?=$news['title']?>" />
                    </div>

                    <div class="form-group">
                        <label> Edit Detais </label>
                        <textarea type="text" class="form-control" name="details"><?=$news['details']?></textarea>
                        <input type="hidden" name="id" value="<?=$news['id']?>" />
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
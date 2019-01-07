<?php $page = "edit_forum_topic"; include 'header.php' ?>


            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <div class="container">

                <?php echo form_open_multipart('user_profile/submit_edit_topic'); ?>

                <div class="form-group">
                    <label> Edit Title </label>
                    <input type="text" class="form-control" name="title" value="<?=$topic['title']?>" />
                </div>

                <div class="form-group">
                    <label> Edit Detais </label>
                    <textarea type="text" class="form-control" name="details"><?=$topic['details']?></textarea>
                    <input type="hidden" name="id" value="<?=$topic['id']?>" />
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

            </div>

            <script>
                CKEDITOR.replace( 'details' );
            </script>


<?php include 'footer.php' ?>

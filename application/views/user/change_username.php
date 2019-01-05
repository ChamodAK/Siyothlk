<?php $panel = "my_profile"; include 'my_profile_frame.php' ?>

    <div class="col-md-9">
        <div class="card">
            <h4 class="card-header">Change Username</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <span style="color: red"><?php echo validation_errors(); ?></span>
                <?php echo form_open("User_Profile/add_changed_username"); ?>

                <div class="form-group">
                    <label>New Username</label>
                    <input type="text" class="form-control" placeholder="Enter new name... " value="<?php echo set_value('username'); ?>" name="username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter password to confirm..." value="<?php echo set_value('password'); ?>" name="password" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>>
    </div>

<?php include 'my_profile_footer.php' ?>

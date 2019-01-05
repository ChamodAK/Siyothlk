<?php $panel = "my_profile"; include 'my_profile_frame.php' ?>

<div class="col-md-9">
    <div class="card">
        <h4 class="card-header">Change Password</h4>
        <div class="card-body">

            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <span style="color: red"><?php echo validation_errors(); ?></span>
            <?php echo form_open("User_Profile/add_changed_password"); ?>

            <div class="form-group">
                <label>Current Password</label>
                <input type="password" class="form-control" placeholder="Enter current password" value="<?php echo set_value('password'); ?>" name="password" required>
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" placeholder="Enter new password" value="<?php echo set_value('np1'); ?>" name="np1" required>
            </div>

            <div class="form-group">
                <label>Re-Enter New Password</label>
                <input type="password" class="form-control" placeholder="Re-enter Enter new password" value="<?php echo set_value('np2'); ?>" name="np2" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>

<?php include 'my_profile_footer.php' ?>

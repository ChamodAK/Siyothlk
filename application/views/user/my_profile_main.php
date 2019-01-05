<?php $panel = "my_profile"; include 'my_profile_frame.php' ?>

    <div class="col-md-9">
        <div class="card">
            <div class="card">
                <h4 class="card-header">My Profile Overview</h4>

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div class="container" style="padding: 20px;" align="center">
                    <i class="fas fa-user fa-5x"></i>
                    <h4 style="margin-top: 10px; color: #003399"><?=$profile['username']?></h4>
                    <hr>
                </div>
                <div class="container" align="center">
                    <p>Username: <span style="color: steelblue"><?=$profile['username']?></span></p>
                    <p>Email: <span style="color: steelblue"><?=$profile['email']?></span></p>

                    <a href="<?=base_url('index.php/User_Profile/change_username')?>" class="btn btn-primary" style="margin-bottom: 20px;">Change Username</a>
                    <a href="<?=base_url('index.php/User_Profile/change_password')?>" class="btn btn-primary" style="margin-bottom: 20px;">Change Password</a>

                </div>
            </div>
        </div>
    </div>

<?php include 'my_profile_footer.php' ?>

<?php $panel = 'dashboard'; include 'admin_dashboard_frame.php'; ?>

    <div class="card">
        <div class="card">
            <h3 style="color: darkblue; margin-top: 5px;" align="center">Welcome to Siyoth.lk Admin Dashboard</h3>
            <h4 class="card-header" style="color: orangered;" align="center">Website Overview</h4>
            <div class="card-body" align="center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light card-body dash-box">
                            <a href="<?php echo base_url('index.php/admin/wiki')?>"><h4><i class="fas fa-feather"></i></h4></a>
                            <p>Wiki Contents</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light card-body dash-box">
                            <a href="<?php echo base_url('index.php/admin/news')?>"><h4><i class="fas fa-paper-plane"></i></h4></a>
                            <p>News</p>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;">
                        <div class="card bg-light card-body dash-box">
                            <a href="<?php echo base_url('index.php/admin/articles')?>"><h4><i class="fas fa-clipboard-list"></i></h4></a>
                            <p>Articles</p>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: 20px;">
                        <div class="card bg-light card-body dash-box">
                            <a href="<?php echo base_url('index.php/admin/manage_users')?>"><h4><i class="fas fa-users-cog"></i></h4></a>
                            <p>Manage Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'admin_dashboard_foot.php'; ?>
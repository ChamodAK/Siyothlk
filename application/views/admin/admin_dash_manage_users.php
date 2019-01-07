<?php $panel = 'manage_users'; include 'admin_dashboard_frame.php'; ?>

    <div class="card">
        <div class="card">

            <h4 class="card-header">Users registered on Website</h4>

            <?php
            if($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <br>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <?php
                if(!empty($users)) {
                    foreach($users as $user) {
                        echo "<tr >";
                        echo "<td >$user->userId</td >";
                        echo "<td >$user->username</td >";
                        echo "<td >$user->email</td >";
                        echo "<td ><a href = \"".base_url('index.php/admin/delete_user')."/$user->userId\" ><i style='color: red;' class=\"fas fa-trash\"></i></a ></td >";
                        echo "</tr >";
                    }
                }
                ?>
            </table>

        </div>
    </div>

<?php include 'admin_dashboard_foot.php'; ?>
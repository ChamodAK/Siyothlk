<?php $panel = 'wiki'; include 'admin_dashboard_frame.php'; ?>

    <div>
        <div class="card">
            <h4 class="card-header">Wiki Contents/Edit Birds</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Bird Name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    if(!empty($birds)) {
                        foreach($birds as $bird) {
                            echo "<tr >";
                            echo "<td >$bird->birdId</td >";
                            echo "<td >$bird->comName</td >";
                            echo "<td ><a href = \"".base_url('index.php/wiki/edit_bird_view_admin')."/$bird->birdId\" ><i class=\"fas fa-edit\"></i></a > <a href = \"".base_url('index.php/wiki/delete_bird')."/$bird->birdId\" ><i style=\"color: red;\" class=\"fas fa-trash\"></i></a ></td >";
                            echo "</tr >";
                        }
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>


<?php include 'admin_dashboard_foot.php'; ?>
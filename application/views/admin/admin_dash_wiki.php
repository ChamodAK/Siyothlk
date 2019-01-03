<?php $panel = 'wiki'; include 'admin_dashboard_frame.php'; ?>

    <div>
        <div class="card">
            <h4 class="card-header">Wiki Contents</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <div align="center" style="padding-bottom: 20px;">
                    <a href="<?=base_url('index.php/admin/add_bird')?>" class="btn btn-primary">Add Birds</a>
                    <a href="<?=base_url('index.php/admin/edit_bird')?>" class="btn btn-primary">Edit Birds</a>
                </div>

                <h5 style="padding-bottom: 10px; color: darkred; font-style: italic;"> To Be Approved ... </h5>

                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Bird ID</th>
                        <th>Content</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    if(!empty($contents)) {
                        foreach($contents as $content) {
                            echo "<tr >";
                            echo "<td >$content->id</td >";
                            echo "<td >$content->birdId</td >";
                            echo "<td >$content->details</td >";
                            echo "<td ><a href = \"".base_url('index.php/admin/approve_changes')."/$content->id\" ><i style='color: green;' class=\"fas fa-check\"></i></a > <a href = \"".base_url('index.php/admin/dismiss_changes')."/$content->id\" ><i style='color: red;' class=\"fas fa-times\"></i></a ></td >";
                            echo "</tr >";
                        }
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>


<?php include 'admin_dashboard_foot.php'; ?>
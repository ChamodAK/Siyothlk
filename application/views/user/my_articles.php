<?php $panel = "my_articles"; include 'my_profile_frame.php' ?>


    <div class="col-md-9">
        <div class="card">
            <div class="card">
                <h4 class="card-header">My Articles</h4>
                <div class="card-body">

                    <?php
                    if($this->session->flashdata('msg')) {
                        echo $this->session->flashdata('msg');
                    }
                    ?>

                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Time & Date</th>
                            <th></th>
                        </tr>
                        </thead>
                        <?php
                        if(!empty($articles)) {
                            foreach($articles as $article) {
                                echo "<tr >";
                                echo "<td >$article->title</td >";
                                echo "<td >$article->timeStamp</td >";
                                echo "<td ><a href = \"".base_url('index.php/user_profile/edit_article')."/$article->id\" ><i style='color: blue;' class=\"fas fa-edit\"></i></a > <a href = \"".base_url('index.php/user_profile/delete_article')."/$article->id\" ><i style='color: red;' class=\"fas fa-trash\"></i></a ></td >";
                                echo "</tr >";
                            }
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>

<?php include 'my_profile_footer.php' ?>
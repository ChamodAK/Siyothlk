<?php $page = 'bird_wiki'; include 'header.php';?>

<?php include "sidebar.php"; ?>

    <div class="container col-md-7" align="justify" style="padding-left: 100px;">

        <h3 class="text-center" style="padding-top: 40px;"> <?php echo $category[0]->name; ?> </h3>

        <div class="text-center">
            <img class="img-fluid mb-3 mb-md-0" style="max-height: 400px;" src="<?php echo base_url('asset/categories/').$category[0]->image?>" alt="Image not found">
        </div>

        <br>

        <div>
            <p style="text-align: justify;"> <?php echo $category[0]->details; ?> </p>
        </div>

        <p style="font-weight: bold; font-size: large;"> Bird List </p>

        <ul>
        <?php foreach ($category as $cat): ?>
            <li> <a href="<?php echo base_url('index.php/Wiki/get_full_bird/').$cat->birdId?>"><p style="display: inline;"><?=$cat->comName?> <span style="color: red; font-style: italic;"><?="($cat->sciName)"?></span></p></a> </li>
        <?php endforeach; ?>
        </ul>


    </div>

<?php include 'footer.php' ?>
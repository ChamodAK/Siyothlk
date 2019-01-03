<?php $page = 'bird_wiki'; include 'header.php';?>

<?php include "sidebar.php"; ?>

    <div class="container col-md-7" align="justify" style="padding-left: 100px;">

        <h3 class="text-center" style="padding-top: 40px;"> Full Bird List </h3>

        <br>

        <ul>
            <?php foreach ($birds as $bird): ?>
                <li> <a href="<?php echo base_url('index.php/Wiki/get_full_bird/').$bird->birdId?>"><p style="display: inline;"><?=$bird->comName?> <span style="color: red; font-style: italic;"><?="($bird->sciName)"?></span></p></a> </li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php include 'footer.php' ?>
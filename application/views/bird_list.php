<?php $page = 'bird_wiki'; include 'header.php';?>

<?php include "sidebar.php"; ?>

    <div class="container col-md-7" align="justify" style="padding-left: 100px;">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/bird_wiki'); ?>"> Bird Wiki </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Wiki/categories'); ?>"> Bird Categories </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Bird List </li>
            </ol>
        </nav>

        <h3 class="text-center" style="padding-top: 40px;"> Full Bird List </h3>

        <br>

        <ul>
            <?php foreach ($birds as $bird): ?>
                <li> <a href="<?php echo base_url('index.php/Wiki/get_full_bird/').$bird->birdId?>"><p style="display: inline;"><?=$bird->comName?> <span style="color: red; font-style: italic;"><?="($bird->sciName)"?></span></p></a> </li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php include 'footer.php' ?>
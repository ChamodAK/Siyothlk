<?php $page = 'bird_wiki'; include 'header.php';?>

<?php include "sidebar.php"; ?>

    <div class="main container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/bird_wiki'); ?>"> Bird Wiki </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Wiki/categories'); ?>"> Bird Categories </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Wiki/advanced_search'); ?>"> Advanced Search </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Advanced Search Result </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12" style="margin: 10px 10px;">
                <h3 class="my-4"> You may be looking for one of these birds... </h3>
            </div>

            <?php if(!empty($birds)): ?>
                <?php foreach ($birds as $bird): ?>

                    <div class="col-lg-3 col-sm-6 text-center mb-4">
                        <img class="rounded-circle d-block mx-auto" src="<?php echo base_url('asset/wiki/').$bird->image;?>" style="margin-bottom: 10px; width: 250px; height: 250px;" alt="">
                        <a href="<?php echo base_url('index.php/Wiki/get_full_bird/').$bird->birdId?>"><h6 style="display: inline;"><?=$bird->comName?></h6><br><p style="color: red; font-style: italic; font-size: small;"><?=$bird->sciName?></p></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>

<?php include 'footer.php' ?>
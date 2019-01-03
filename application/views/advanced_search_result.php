<?php $page = 'bird_wiki'; include 'header.php';?>

<?php include "sidebar.php"; ?>

    <div class="main container">

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
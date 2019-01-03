
<?php $page = 'home'; include 'header.php' ?>

    <header class="masthead_home" style="background-image: url('<?= base_url('asset/home/parrot.jpg')?>');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="m-0 display-4" style="font-weight: bolder;">WELCOME TO SIYOTH.LK </h1>
                    <div class="container">
                        <br>
                        <h3 align="center" style="font-weight: bolder;">~ A Community Consists with Bird Lovers ~</h3>
                    </div>
                    <a href="<?=base_url('index.php/home/bird_wiki')?>" class="btn btn-light" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> Bird Wiki </a>
                    <?php if(!$this->session->userdata('loggedIn')):?>
                    <a href="<?=base_url('index.php/home/sign_up')?>" class="btn btn-outline-light" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> Be a Member </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <section class="showcase" style="padding-top: 40px; padding-left: 40px;">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?=base_url('asset/home/king2.jpg')?>); border-radius: 50px;"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 style="color: #004594">Get to know about latest news about world of birds...</h2>
                    <a href="<?=base_url('index.php/home/news_and_articles')?>" class="btn btn-outline-danger" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> See News & Articles </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url(<?=base_url('asset/home/king4.jpg')?>);border-radius: 50px;"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2 style="color: #004594">Find out the events related to birds happening in Sri Lanka...</h2>
                    <a href="<?=base_url('index.php/home/events')?>" class="btn btn-outline-danger" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> See Events </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?=base_url('asset/home/king3.jpg')?>);border-radius: 50px;"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 style="color: #004594">Get to know about the Bird Sanctuaries in Sri Lanka...</h2>
                    <a href="<?=base_url('index.php/home/sanctuary')?>" class="btn btn-outline-danger" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> See Sanctuaries </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url(<?=base_url('asset/home/king5.jpg')?>);border-radius: 50px;"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2 style="color: #004594">See various maps related to birds...</h2>
                    <a href="<?=base_url()?>" class="btn btn-outline-danger" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> See Maps </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?=base_url('asset/home/gal.jpg')?>);border-radius: 50px;"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2 style="color: #004594">Visit our gallery and witness the real beauty of world of birds...</h2>
                    <a href="<?=base_url('index.php/home/get_photos')?>" class="btn btn-outline-danger" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> Visit Gallery </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url(<?=base_url('asset/home/forum.jpg')?>);border-radius: 50px;"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2 style="color: #004594">Have a Question? Ask it in our forum section and get the opinions od the birders and experts in our community</h2>
                    <a href="<?=base_url()?>" class="btn btn-outline-danger" style="border-radius: 40px; font-weight: bold; margin-top: 20px; font-size: 20px;"> Visit Forum </a>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php'?>
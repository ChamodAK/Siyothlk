<?php $page = 'bird_wiki'; include 'header.php';?>

    <?php
    if($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    }
    ?>

    <header class="masthead" style="background-image: url('<?= base_url('asset/images/wiki_home.jpg')?>');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-left">
                    <h1 class="m-0 display-4"><small>Siyoth.lk</small> Bird Wiki</h1>
                </div>
                <div class="container">
                    <h2>The Largest Srilankan Bird Directory on Cyberspace</h2>
                    <h5>explore the world of birds...</h5>
                </div>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="row">
            <div class="col-lg-12" style="margin-top: 10px;">
                <h3 style="padding-top: 20px;"> About Birds </h3>
            </div>
            <div class="col-lg-8">
                <p class="my-4 text-justify" style="color: #0d6786;"> Birds are vertebrate animals adapted for flight.
                    Many can also run, jump, swim, and dive. Some, like penguins, have lost the ability to fly but retained their wings. Birds are found worldwide and in all habitats. The largest is the nine-foot-tall ostrich. The smallest is the two-inch-long bee hummingbird.
                    Everything about the anatomy of a bird reflects its ability to fly. The wings, for example, are shaped to create lift. The leading edge is thicker than the back edge, and they are covered in feathers that narrow to a point. Airplane wings are modeled after bird wings.
                    The bones and muscles of the wing are also highly specialized. The main bone, the humerus, which is similar to the upper arm of a mammal, is hollow instead of solid. It also connects to the bird’s air sac system, which, in turn, connects to its lungs. The powerful flight muscles of the shoulder attach to the keel, a special ridge of bone that runs down the center of the wide sternum, or breastbone. The tail feathers are used for steering.
                    Birds have a unique digestive system that allows them to eat when they can—usually on the fly—and digest later. They use their beaks to grab and swallow food. Even the way a bird reproduces is related to flight. Instead of carrying the extra weight of developing young inside their bodies, they lay eggs and incubate them in a nest.
                    The fossil record shows that birds evolved alongside the dinosaurs during the Jurassic period 160 million years ago. The best known fossil is archaeopteryx, which was about the size of a crow. </p>
                <div class="blockquote-footer" style="font-size: small; color: orangered;">From the National Geographic book, Animal Encyclopedia, 2012</div>
            </div>
            <div class="col-lg-4">
                <img src="<?= base_url('asset/images/wiki2.jpg');?>" style="margin-bottom: 10px; width: 450px; height: 450px;" alt="" class="rounded">
            </div>
        </div>

    </div>

    <div class="container">

        <div class="row">
            <div class="col-lg-12" style="margin: 10px 10px;">
                <h3 class="my-4"> Featured Birds </h3>
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

        <div class="text-center" style="margin-top: 10px; margin-bottom: 10px;">
            <a href="<?php echo base_url("index.php/Wiki/categories")?>" class="btn btn-danger"><i class="fas fa-dove"></i> View All Birds & Categories </a>
        </div>

    </div>
    <!-- /.container -->

<?php include 'footer.php' ?>
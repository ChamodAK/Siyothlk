<?php $page = 'gallery'; include "header.php"?>

<br>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Gallery </li>
        </ol>
    </nav>


    <div class="pos-f-t">
        <nav class="navbar navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_gallery" aria-controls="navbar_gallery" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
        <div class="collapse" id="navbar_gallery">
            <div class="bg-dark p-4">

                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Gallery/add_image') ?>">Add photos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('index.php/Gallery/categories') ?>">Categories</a>
                            </li>

                        </ul>
                    </div>
                </nav>
                <!--h5 class="text-white h4">Collapsed content</h5>
                <span class="text-muted">Toggleable via the navbar brand.</span-->
            </div>
        </div>

    </div>

<br>

<div class="row mt-500">


<div class="container col-md-7" style="-ms-high-contrast-adjust: auto">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url("gallery_images/comman_Myna.jpg");?>" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Comman Myna</h5>
                    <p>Bird category 01</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url("gallery_images/p_roseus_d1_close_vankalai_8alr02_17.jpg");?>" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Intermediate egrete</h5>
                    <p>Bird category 02</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url("gallery_images/Photography-Tours-Lanka1.jpg");?>" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>King fisher</h5>
                    <p>Bird category 03</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
<br>
<br>

<?php
    if(!empty($photos)) {
        $i=1;
        echo '<div class="container">';
        foreach ($photos as $photo) {

            switch ($i){
                case 1:
                    echo '<div class="row">';

                    echo '<div class="col-md-4 float-md-left">';
                    echo '<div class="img-thumbnail">';
                    ?>
                    <p><?php echo $photo->name?></p>
                    <a href="<?php echo base_url('gallery_images/') . $photo->link ?>" download="">
                    <img src="<?php echo base_url('gallery_images/') . $photo->link ?>" height="100%" width="100%" alt="image not found" aria-placeholder="Click to download">
                    <div class="card-img-overlay" style="color: white; font-size: 20px; padding: 20px; text-align: center;"><p><?php echo $photo->name?></p></div>
                    </a>

                    <?php
                    echo '</div>';
                    echo '</div>';

                    $i=2;
                    break;

                case 2:

                    echo '<div class="col-md-4 float-md-none">';
                    echo '<div class="img-thumbnail">';
                    ?>

                    <p><?php echo $photo->name?></p>
                    <a href="<?php echo base_url('gallery_images/') . $photo->link ?>" download="">
                    <img src="<?php echo base_url('gallery_images/') . $photo->link ?>" height="100%" width="100%">
                    <div class="card-img-overlay" style="color: white; font-size: 20px; padding: 20px; text-align: center;"><p><?php echo $photo->name?></p></div>
                    </a>

                    <?php
                    echo '</div>';
                    echo '</div>';
                    $i=3;
                    break;

                case 3:


                    echo '<div class="col-md-4 float-md-right">';
                    echo '<div class="img-thumbnail">';
                    ?>

                    <p><?php echo $photo->name?></p>
                    <a href="<?php echo base_url('gallery_images/') . $photo->link ?>" download="">
                    <img src="<?php echo base_url('gallery_images/') . $photo->link ?>" height="100%" width="100%">
                    <div class="card-img-overlay" style="color: white; font-size: 20px; padding: 20px; text-align: center;"><p><?php echo $photo->name?></p></div>
                    </a>

                    <?php
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $i=1;
                    break;
            }


        }
        echo '</div>';

}
?>
<br>
<br>







<?php include 'footer.php'; ?>
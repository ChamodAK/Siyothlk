<?php $page = 'gallery'; include 'header.php'; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

    <style>
        body {
            background-color: #fff;
            min-height: 100vh;
            font: normal 16px sans-serif;
        }

        .gallery-container h1 {
            text-align: center;
            margin-top: 70px;
            font-family: 'Droid Sans', sans-serif;
            font-weight: bold;
            color: #58595a;
        }

        .gallery-container p.page-description {
            text-align: center;
            margin: 30px auto;
            font-size: 18px;
            color: #85878c;
        }

        /* Styles for the gallery */

        .tz-gallery {
            padding: 40px;
        }

        .tz-gallery .thumbnail {
            padding: 0;
            margin-bottom: 30px;
            border: none;
        }

        .tz-gallery img {
            border-radius: 2px;
        }

        .tz-gallery .caption{
            padding: 26px 30px;
            text-align: center;
        }

        .tz-gallery .caption h3 {
            font-size: 14px;
            font-weight: bold;
            margin-top: 0;
        }

        .tz-gallery .caption p {
            font-size: 12px;
            color: #7b7d7d;
            margin: 0;
        }

        .baguetteBox-button {
            background-color: transparent !important;
        }
    </style>

    <body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Gallery </li>
        </ol>
    </nav>



    <div class="container gallery-container">
        <br><br>
        <div class="text-right">
            <a href="<?php echo base_url('index.php/Gallery/add_image')?>" class="btn btn-danger"><i class="fas fa-plus-circle"></i> ADD NEW IMAGE </a>
        </div>

        <?php
        if($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>


        <h1>Siyoth.lk Gallery</h1>

        <p class="page-description text-center">A bird does not sing because it has an answer.  It sings because it has a song.  </p>

        <div class="tz-gallery">

            <div class="row">
                <?php foreach ($images as $image) { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="<?php echo $image->link;?>">
                            <img src="<?php echo $image->link; ?>" alt="Image not found" style="width: 300px; height: 225px;">
                        </a>
                        <div class="caption">
                            <h3><?php echo $image->comName; ?></h3>
                            <p>Scientific Name:<?php echo $image->sciName; ?></p> <p>Other names:<?php echo $image->otherName; ?></p>
                            <?php if ($this->session->userdata('username') == 'admin') { ?>
                                <div class="text-right"><a href = "<?php echo base_url('index.php/Admin/delete_image/')."$image->imageId";?>" ><i style="color: red;" class="fas fa-trash"></i></a></div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    </body>

<?php include 'footer.php'; ?>
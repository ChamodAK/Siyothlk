<?php $page = 'bird_wiki'; include 'header.php' ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/bird_wiki'); ?>"> Bird Wiki </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <?php echo $bird['comName']; ?> </li>
        </ol>
    </nav>

    <div class="container col-md-7" align="justify">

        <h3 class="text-center" style="padding-top: 40px;"> <?php echo $bird['comName']; ?> </h3>
        <h5 class="text-center" style="padding-bottom: 10px; color: red; font-style: italic;"> <?php echo $bird['sciName']; ?> </h5>

        <div class="text-center">
            <img class="img-fluid mb-3 mb-md-0" src="<?php echo base_url('asset/wiki/').$bird['image']?>" alt="Image not found">
        </div>

        <br>

        <div>
            <p style="text-align: justify;"><strong style="color: red;">Other Names: </strong><?php echo $bird['otherName']; ?></p>
            <p style="text-align: justify;"> <?php echo $bird['details']; ?> </p>
        </div>

        <div align="center">
            <h5 style="color: red; font-style: italic; padding-bottom: 10px; "> Distribution Map </h5>
            <div>
                <iframe src="<?php echo $bird['disMapLink'] ?>" width="640" height="480"></iframe>
            </div>
        </div>
        <div class="text-center" style="margin-top: 10px; margin-bottom: 10px;">
            <a href="<?php echo base_url("index.php/Wiki/edit_bird_view/").$bird['birdId']?>" class="btn btn-danger"><i class="fas fa-edit"></i> Edit </a>
        </div>


    </div>

<?php include 'footer.php' ?>
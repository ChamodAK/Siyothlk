<?php $page = 'sanctuaries'; include 'header.php' ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Sanctuary </li>
        </ol>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="my-4">Sanctuaries</h1>

        <!-- Sanctuary One -->
        <?php foreach ($sanctuaries as $sanctuary) {?>
        <div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo base_url($sanctuary->image);?>" alt="Image not found" style="height: 200px; width: 400px">
                </a>
            </div>
            <div class="col-md-7">
                <h3><?php echo $sanctuary->name;?></h3><small><?php echo $sanctuary->zone;?></small>
                <p><?php echo $sanctuary->details;?></p>
                <a class="btn btn-primary" href="<?php echo base_url('index.php/Sanctuary/view_full_sanctuaries')?><?php echo "?id=$sanctuary->id"?>">View More</a>
            </div>
        </div>
        <!-- /.row -->

        <hr>
    <?php }?>
    </div>
    <!-- /.container -->

<?php include 'footer.php'?>
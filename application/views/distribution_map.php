<?php $page = 'distribution_map'; include 'header.php'; ?>

<style>
    .scrollable-menu {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }
</style>

<header class="masthead" style="background-image: url('<?= base_url('asset/images/distribution_map.jpg')?>');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left">
                <h1 class="m-0 display-4"><small>Siyoth.lk</small> Distribution Maps </h1>
            </div>
            <div class="container">
                <h2>View the location and distribution of each and every bird in Sri Lanka</h2>
                <h5>explore the world of birds...</h5>
            </div>
        </div>
    </div>
</header>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Distribution Maps </li>
    </ol>
</nav>

    <center><h2>Select any bird to get its distribution map</h2></center>

    <center>
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"> Bird List <span class="caret"></span>
            </button>
            <ul class="dropdown-menu scrollable-menu" role="menu">
                <?php foreach ($birds as $bird){ ?>
                    <li><a class="dropdown-item" href="<?php echo base_url('index.php/home/get_bird_map/'); ?><?php echo $bird->birdId; ?>"><?php echo $bird->comName; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <br><br><br>
    </center>


<?php include 'footer.php'; ?>

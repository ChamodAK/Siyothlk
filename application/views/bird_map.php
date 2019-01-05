<?php $page = 'bird_map'; include 'header.php'; ?>

<style>
    .scrollable-menu {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/distribution_map'); ?>"> Distribution Maps </a></li>
        <li class="breadcrumb-item active" aria-current="page"> <?php echo $maps->comName; ?> </li>
    </ol>
</nav>
<center>
    <h2>Select any bird to get its distribution map</h2>

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
    <center><a href="<?php echo base_url('index.php/Wiki/get_full_bird/'); ?><?php echo $maps->birdId; ?>"><h2><?php echo $maps->comName; ?></h2></a></center>
    <center>
        <section>
            <iframe class="mymap" src="<?php echo $maps->disMapLink; ?>" width="70%" height="600"></iframe>
        </section>
    </center>
</center>



<?php include 'footer.php'; ?>

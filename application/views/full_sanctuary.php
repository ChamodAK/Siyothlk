<?php $page = 'full_sanctuary'; include 'header.php'?>

<style>
    .bird-detail-col{
        min-width: 52em;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/sanctuary'); ?>"> Sanctuaries </a></li>
        <li class="breadcrumb-item active" aria-current="page"> <?php echo $sanctuaries['name'] ?> </li>
    </ol>
</nav>
<center>
    <h1><?php echo $sanctuaries['name'] ?></h1><br>

    <div class="container" style="">
        <p><?php echo $sanctuaries['details'] ?></p>
        <img class="img-fluid" src="<?php echo base_url($sanctuaries['image']);?>" alt="Image not found" style="height: 200px; width: 400px">
    </div>
</center>
<br><br>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-9">
                <table class="table table-striped table-bordered table-responsive mb-xl-0">
                    <h2 class="h4 text-white bg-warning mb-0 p-4 rounded-top">Birds that can be found near <?php echo $sanctuaries['name'] ?></h2>
                    <thead class="thead-light">
                    <tr>
                        <td scope="col" class="bird-detail-col"><?php echo $sanctuaries['bird_details'] ?></td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<br><br>
<center>
    <section>
        <iframe class="mymap" src="<?php echo $sanctuaries['map_link'] ?>" width="70%" height="600"></iframe>
    </section>
</center>


<?php include 'footer.php'?>

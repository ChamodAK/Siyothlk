<?php $page = 'bird_wiki'; include 'header.php';?>

    <?php include "sidebar.php"; ?>

    <div class="main container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/bird_wiki'); ?>"> Bird Wiki </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Bird Categories </li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-12" style="margin: 10px 10px;">
                <h3 class="my-4"> Birds Categories </h3>
            </div>

            <?php if(!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>

                    <div class="col-lg-3 col-sm-6 text-center mb-4">
                        <img class="rounded-circle d-block mx-auto" src="<?php echo base_url('asset/categories/').$category->image;?>" style="margin-bottom: 10px; width: 250px; height: 250px;" alt="">
                        <a href="<?php echo base_url('index.php/Wiki/get_full_category/').$category->id?>"><h6 style="display: inline;"><?=$category->name?></h6></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

    </div>

<?php include 'footer.php' ?>
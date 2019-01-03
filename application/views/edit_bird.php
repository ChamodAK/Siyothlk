<?php $page = 'bird_wiki'; include 'header.php' ?>

    <?php
    if(!$this->session->userdata('username')) {
        $this->session->set_userdata('page_url',  current_url());
        redirect('Home/login');
    }
    ?>

<!--    <nav aria-label="breadcrumb">-->
<!--        <ol class="breadcrumb">-->
<!--            <li class="breadcrumb-item"><a href="--><?php //echo base_url('index.php/home'); ?><!--"> Home </a></li>-->
<!--            <li class="breadcrumb-item"><a href="--><?php //echo base_url('index.php/home/news_and_articles') ?><!--"> News & Articles </a></li>-->
<!--            <li class="breadcrumb-item"><a href="--><?php //echo base_url('index.php/News_Articles/articles') ?><!--"> Articles </a></li>-->
<!--            <li class="breadcrumb-item active" aria-current="page"> Add New Article </li>-->
<!--        </ol>-->
<!--    </nav>-->

    <div class="container">

        <h1 class="my-4"> Edit Bird Details </h1>

        <?php echo form_open_multipart('Wiki/edit_bird'); ?>

        <div class="form-group">
            <label> Edit Details </label>
            <textarea type="text" class="form-control" name="details"><?=$bird['details']?></textarea>
            <input type="hidden" name="birdId" value="<?=$bird['birdId']?>" />
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary"> Submit </button>
        </div>

        <?php echo form_close(); ?>

    </div>

    <script>
        CKEDITOR.replace( 'details' );
    </script>

<?php include 'footer.php' ?>
<?php $page = 'bird_wiki'; include 'header.php' ?>

    <?php
    if(!$this->session->userdata('username')) {
        $this->session->set_userdata('page_url',  current_url());
        redirect('Home/login');
    }
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/bird_wiki'); ?>"> Bird Wiki </a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Wiki/get_full_bird/'); ?><?php echo $bird['birdId']; ?>"> <?php echo $bird['comName']; ?> </a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit Bird Details </li>
        </ol>
    </nav>

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
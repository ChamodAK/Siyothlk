<?php $page = 'add_image'; include 'header.php';?>

<?php
if(!$this->session->userdata('username')) {
    $this->session->set_userdata('page_url',  current_url());
    redirect('Home/login');
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/gallery'); ?>"> Gallery </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Add Image </li>
    </ol>
</nav>

<div class="container">

    <h1 class="my-4"> Add Your Image </h1>

    <span style="color: red"><?php echo validation_errors(); ?></span>
    <span style="color: red"><?php echo $error; ?></span>

    <?php echo form_open_multipart('Gallery/add_new_image'); ?>

    <div class="form-group">
        <label> Bird Name </label>
        <select class="form-control form-control-sm" name="birdname" style="width: 20%">
            <?php foreach ($birds as $bird){ ?>
                <option value="<?php echo $bird->comName; ?>"><?php echo $bird->comName; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label> Upload your Image </label><br>
        <input type="file" class="" name="userfile">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary"> Submit </button>
    </div>

    <?php echo form_close(); ?>

</div>

<?php include 'footer.php';?>

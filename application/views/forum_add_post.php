<?php $page = 'forum_add_topic'; include 'header.php'?>

<?php
if(!$this->session->userdata('username')) {
    redirect('Home/login');
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/forum'); ?>"> Forum </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Add new post </li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="h4 text-white bg-info mb-3 p-4 rounded">Create new post</h2>
            <?php echo form_open_multipart('Forum/add_new_post'); ?>
            <form class="mb-3">
                <div class="form-group">
                    <label for="topic">Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Give your topic title." value="<?php echo set_value('title'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="comment">Details:</label>
                    <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Write the details here." required><?php echo set_value('content'); ?></textarea>
                </div>
                <div class="form-group">
                    <label> Upload an Image (Optional) </label><br>
                    <input type="file" class="" name="userfile">
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<?php include 'footer.php'?>

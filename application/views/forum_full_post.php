<?php $page = 'forum_full_topic'; include 'header.php'?>

<style type="text/css">
    .post-col{
        min-width: 20em;
    }

    .author-col{
        min-width: 12em;
    }
</style>


<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/forum'); ?>"> Forum </a></li>
        <li class="breadcrumb-item active" aria-current="page"> <?php echo $post['title']; ?> </li>
    </ol>
</nav>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="h4 text-white bg-info mb-0 p-4 rounded-top"><?php echo $post['title']; ?></h2>
            <table class="table table-striped table-bordered table-responsive-lg">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Author</th>
                    <th scope="col">Message</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="author-col">
                        <div><a href="#"><?php echo $post['username']; ?></a></div>
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <div><span class="font-weight-bold">Post subject:</span><?php echo $post['title']; ?></div>
                        <div><span class="font-weight-bold">Posted:</span><?php echo $post['timeStamp']; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="author-col">
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <p><?php echo $post['details']; ?></p>
                        <img src="<?php echo $post['image']; ?>" class="img-fluid" alt="" style="width: 300px; height: 200px;">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <?php
        if($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>
        <div class="col-11">
            <h2 class="h4 text-white bg-info mb-0 p-4 rounded-top">Replies</h2>
            <table class="table table-striped table-bordered table-responsive-lg">
            <?php if(!empty($replies)) { ?>
                <thead class="thead-light">
                <tr>
                    <th scope="col">Replied by</th>
                    <th scope="col">Reply</th>
                </tr>
                </thead>
                <?php foreach ($replies as $reply) {?>
                <tbody>
                <tr>
                    <td class="author-col">
                        <div><a href="#"><?php echo $reply->username; ?></a></div>
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <div><span class="font-weight-bold">Posted:</span><?php echo $reply->date_posted; ?></div>
                    </td>
                </tr>
                <tr>
                    <td class="author-col">
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <p><?php echo $reply->details; ?></p>
                    </td>
                </tr>
                <?php } }?>
                <br>
                <?php if(empty($replies)) {?>
                    <h3>No any reply to this post</h3>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <?php echo form_open('Forum/full_post/'.$post['id']); ?>
    <form class="mb-3" action="">
        <div class="form-group">
            <label for="comment" style="color: #5a0099"><b>Reply to this post:</b></label>
            <textarea class="form-control" name="content" cols="20" rows="7" placeholder="Write your reply here." required><?php echo set_value('content'); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Reply</button>
    </form>
    <?php echo form_close(); ?>
</div>


<?php include 'footer.php';?>

<?php $page = 'forum'; include 'header.php'; ?>

<style type="text/css">
    .topic-col{
        min-width: 31em;
    }

    .created-col{
        min-width: 20em;
    }
</style>

<header class="masthead" style="background-image: url('<?= base_url('asset/images/owl.png')?>');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-left">
                <h1 class="m-0 display-4" style="color: #cd6e00">Welcome to our Community</h1>
            </div>
            <div>
                <h2 style="color: #cd6e00">Share your passion for birds, wildlife and the natural world</h2>
                <br>
                <h5 style="color: #cd6e00">Love nature? Here's your chance to connect with our friendly community.
                    Have fun sharing your experiences, showing off your photos and getting in touch with people like you.</h5>
            </div>
        </div>
    </div>
</header>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Forum </li>
    </ol>
</nav>

<div class="container">
    <?php
    if($this->session->flashdata('msg')) {
        echo $this->session->flashdata('msg');
    }
    ?>
    <div class="row">
        <div class="col-12 col-xl-9">
            <table class="table table-striped table-bordered table-responsive mb-xl-0">
                <h2 class="h4 text-white bg-info mb-0 p-4 rounded-top">Forum Topics</h2>
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="topic-col">Topic</th>
                        <th scope="col" class="created-col">Created By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($posts)) { foreach ($posts as $post) {?>
                    <tr>
                        <td>
                            <h6><a href="<?php echo base_url('index.php/forum/full_post')?><?php echo "/".$post->id;?>"><?php echo $post->title;?></a></h6>
                        </td>
                        <td>
                            <div><h6 style="color: red"><?php echo $post->username;?></h6></div>
                            <div><?php echo $post->timeStamp;?></div>
                            <?php if ($this->session->userdata('admin_flag') == 1) { ?>
                            <div class="text-right"><a href = "<?php echo base_url('index.php/Admin/delete_topic/').$post->id?>" ><i style="color: red;" class="fas fa-trash"></i></a></div>
                            <?php } ?>
                        <?php if ($this->session->userdata('admin_flag') == 0) {
                            if ($this->session->userdata('username') == $post->username) { ?>
                            <div class="text-right"><a href = "<?php echo base_url('index.php/User_profile/delete_topic/').$post->id?>" ><i style="color: red;" class="fas fa-trash"></i></a></div>
                            <?php } } ?>
                        </td>
                    </tr>
                    <?php } } ?>


                </tbody>
            </table>
        </div>

        <div class="col-12 col-xl-3">
            <aside>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h5 card-title" style="color: #5a0099;">Forum Statistics</h5>
                                <dl class="row">
                                    <dt class="col-9">Total Topics:</dt>
                                    <dd class="col-3"><?php echo $topic_count;?></dd>
                                    <dt class="col-9">Total Members:</dt>
                                    <dd class="col-3"><?php echo $member_count;?></dd>
                                </dl>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <br>
    <div class="mb-3 clearfix">
        <?php form_open('index.php/home/forum'); ?>
        <form class="form-inline float-lg-left d-block d-sm-flex">
            <div class="mb-2 mb-sm-0 mr-2">Sort by:</div>
            <div class="form-group mr-2">
                <label class="sr-only" for="select-sort" id="select-sort">Sort by</label>
                <select class="form-control form-control-sm" name="sortby" id="select-sort">
                    <option value="newest" selected>Newest</option>
                    <option value="oldest">Oldest</option>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary" id="btn">Go</button>
        </form>
        <?php form_close();?>
    </div>
    <br>
    <a href="<?php echo base_url('index.php/forum/add_post'); ?>" class="btn btn-lg btn-warning">New Post</a>
</div>

<?php include 'footer.php';?>

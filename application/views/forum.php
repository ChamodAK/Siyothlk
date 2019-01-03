<?php $page = 'forum'; include 'header.php'; ?>

<style type="text/css">
    .topic-col{
        min-width: 16em;
    }

    .created-col,
    .last-post-col{
        min-width: 12em;
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
            <h2 class="h4 text-white bg-info mb-0 p-4 rounded-top">Forum Topics</h2>
            <table class="table table-striped table-bordered table-responsive mb-xl-0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="topic-col">Topic</th>
                        <th scope="col" class="created-col">Created</th>
                        <th scope="col">Statistics</th>
                        <th scope="col" class="last-post-col">Last post</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($posts)) { foreach ($posts as $post) {?>
                    <tr>
                        <td>
                            <h6><a href="<?php echo base_url('index.php/forum/full_post')?><?php echo "/".$post->id;?>"><?php echo $post->title;?></a></h6>
                        </td>
                        <td>
                            <div><h6 class="h6">by <a href="#"><?php echo $post->username;?></a></h6></div>
                            <div><?php echo $post->timeStamp;?></div>
                        </td>
                        <td>
                            <div>5 replies</div>
                            <div>120 views</div>
                        </td>
                        <td>
                            <div><h6 class="h6">by <a href="#">Author Name</a></h6></div>
                            <div>01 jan 2019, 15:43</div>
                        </td>
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>

        <div class="col-12 col-xl-3">
            <aside>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h5 card-title">Members online</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Forum member name</a></li>
                                    <li><a href="#">Forum member name</a></li>
                                    <li><a href="#">Forum member name</a></li>
                                    <li><a href="#">Forum member name</a></li>
                                </ul>
                        </div>
                        <div class="card-footer">
                            <dl class="row">
                                <dt class="col-8">Total:</dt>
                                <dd class="col-4">10</dd>
                                <dt class="col-8">Members:</dt>
                                <dd class="col-4">17</dd>
                                <dt class="col-8">Guests:</dt>
                                <dd class="col-4">80</dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="h4 card-title">Forum Statistics</h4>
                                <dl class="row">
                                    <dt class="col-8">Total Forums:</dt>
                                    <dd class="col-4">10</dd>
                                    <dt class="col-8">Total Topics:</dt>
                                    <dd class="col-4">17</dd>
                                    <dt class="col-8">Total Members:</dt>
                                    <dd class="col-4">80</dd>
                                </dl>
                        </div>
                        <div class="card-footer">
                            <div>Newest Member:</div>
                            <div><a href="#">Forum Member name</a></div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
    <div class="mb-3 clearfix">
        <nav aria-label="Navigate post pages" class="float-lg-right">
            <ul class="pagination pagination-sm mb-lg-0">
                <li class="page-item active"><a href="#" class="page-link">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">&hellip;31</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>

        </nav>
        <form class="form-inline float-lg-left d-block d-sm-flex" action="">
            <div class="mb-2 mb-sm-0 mr-2">Display posts from previous</div>
            <div class="form-group mr-2">
                <label class="sr-only" for="select-time">Time period</label>
                <select class="form-control form-control-sm" name="" id="select-time">
                    <option value="all-posts" selected>All posts</option>
                    <option value="day">1 day</option>
                    <option value="week">1 week</option>
                    <option value="month">1 month</option>
                    <option value="year">1 year</option>
                </select>
            </div>
            <div class="mb-2 mb-sm-0 mr-2">Sort by:</div>
            <div class="form-group mr-2">
                <label class="sr-only" for="select-sort">Sort by</label>
                <select class="form-control form-control-sm" name="" id="select-sort">
                    <option value="author">Author</option>
                    <option value="post-time" selected>Post time</option>
                    <option value="replies">Replies</option>
                    <option value="subject">Subject</option>
                    <option value="views">Views</option>
                </select>
            </div>
            <div class="form-group mr-2">
                <label class="sr-only" for="select-direction">Sort direction</label>
                <select class="form-control form-control-sm" name="" id="select-direction">
                    <option value="ascending">Ascending</option>
                    <option value="descending" selected>Descending</option>
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Go</button>
        </form>
    </div>
    <a href="<?php echo base_url('index.php/forum/add_post'); ?>" class="btn btn-lg btn-primary">New Post</a>
</div>


<?php include 'footer.php';?>

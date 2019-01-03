<?php $page='dashboard'; include 'admin_header.php' ?>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h3 style="padding-top: 10px; padding-bottom: 10px;"><i class="fas fa-cog" style="color: red"></i> Admin Dashboard </h3>
                </div>
            </div>
        </div>
    </header>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="<?php echo base_url('index.php/admin')?>" class="list-group-item list-group-item-action <?php if($panel=='dashboard'){echo " active";}?>"><i class="fas fa-cog"></i> Dashboard</a>
                        <a href="<?php echo base_url('index.php/admin/wiki')?>" class="list-group-item list-group-item-action <?php if($panel=='wiki'){echo " active";}?>"><i class="fas fa-feather"></i> Wiki Contents</a>
                        <a href="<?php echo base_url('index.php/admin/news')?>" class="list-group-item list-group-item-action <?php if($panel=='news'){echo " active";}?>"><i class="fas fa-paper-plane"></i> News</a>
                        <a href="<?php echo base_url('index.php/admin/articles')?>" class="list-group-item list-group-item-action <?php if($panel=='articles'){echo " active";}?>"><i class="fas fa-book"></i> Articles</a>
                    </div>
                </div>
                <div class="col-md-9">

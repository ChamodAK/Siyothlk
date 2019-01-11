<?php $page = "my_profile"; include 'header.php' ?>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3><i class="fas fa-user-circle"></i> My Profile <small style="color: red"><?php echo $this->session->userdata['username']?></small></h3>
            </div>
        </div>
    </div>
</header>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="<?php echo base_url('index.php/home/my_profile')?>" class="list-group-item list-group-item-action <?php if($panel=='my_profile'){echo " active";}?>"><i class="fas fa-user-circle"></i> My Profile </a>
                    <a href="<?php echo base_url('index.php/user_profile/my_articles')?>" class="list-group-item list-group-item-action <?php if($panel=='my_articles'){echo " active";}?>"><i class="fas fa-book"></i> My Articles </a>
                    <a href="<?php echo base_url('index.php/user_profile/my_events')?>" class="list-group-item list-group-item-action <?php if($panel=='my_events'){echo " active";}?>"><i class="far fa-clock"></i></i> My Events </a>
                    <a href="<?php echo base_url('index.php/user_profile/my_images')?>" class="list-group-item list-group-item-action <?php if($panel=='my_images'){echo " active";}?>"><i class="fas fa-question-circle"></i> My Images </a>
                </div>
            </div>
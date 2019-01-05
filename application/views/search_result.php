<?php $page = ''; include 'header.php' ?>

<div class="container" style="padding-top: 20px;">

    <?php
        if($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
    ?>

    <h3 class="m-2"> Search Results </h3>
    <hr>

    <div class="container">

        <h5> Birds </h5>
        <?php if(!empty($result['birds'])): ?>
            <ul>
                <?php foreach ($result['birds'] as $bird): ?>
                    <li> <a href="<?php echo base_url('index.php/Wiki/get_full_bird/').$bird->birdId?>"><p style="display: inline;"><?=$bird->comName?> <span style="color: red; font-style: italic;"><?="($bird->sciName)"?></span> <span style="color: darkblue;"><?=" - ($bird->comName)"?></span> </p></a> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="color: red; padding-top: 10px;"> No Results found </p>
        <?php endif; ?>

        <h5> News </h5>
        <?php if(!empty($result['news'])): ?>
            <ul>
                <?php foreach ($result['news'] as $new): ?>
                    <li> <a href="<?php echo base_url('index.php/News_Articles/view_full_news?id=').$new->id?>"><p style="display: inline;"><?=$new->title?> <span style="color: red; font-style: italic;"><?=" - $new->timeStamp"?></p></a> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="color: red; padding-top: 10px;"> No Results found </p>
        <?php endif; ?>

        <h5> Articles </h5>
        <?php if(!empty($result['articles'])): ?>
            <ul>
                <?php foreach ($result['articles'] as $article): ?>
                    <li> <a href="<?php echo base_url('index.php/News_Articles/view_full_article?id=').$article->id?>"><p style="display: inline;"><?=$article->title?> <span style="color: red; font-style: italic;"><?=" - $article->timeStamp"?></p></a> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="color: red; padding-top: 10px;"> No Results found </p>
        <?php endif; ?>

        <h5> Events </h5>
        <?php if(!empty($result['events'])): ?>
            <ul>
                <?php foreach ($result['events'] as $event): ?>
                    <li> <a href="<?php echo base_url('index.php/Events/view_full_event?id=').$event->id?>"><p style="display: inline;"><?=$event->title?> <span style="color: red; font-style: italic;"><?=" - $event->timeStamp"?></p></a> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="color: red; padding-top: 10px;"> No Results found </p>
        <?php endif; ?>

        <h5> Sanctuaries </h5>
        <?php if(!empty($result['sanctuaries'])): ?>
            <ul>
                <?php foreach ($result['sanctuaries'] as $sanctuary): ?>
                    <li> <a href="<?php echo base_url('index.php/Sanctuary/view_full_sanctuaries?id=').$sanctuary->id?>"><p style="display: inline;"><?=$sanctuary->name?></p></a> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="color: red; padding-top: 10px;"> No Results found </p>
        <?php endif; ?>

        <h5> Bird Categories </h5>
        <?php if(!empty($result['categories'])): ?>
            <ul>
                <?php foreach ($result['categories'] as $category): ?>
                    <li> <a href="<?php echo base_url('index.php/Wiki/get_full_category/').$category->id?>"><p style="display: inline;"><?=$category->name?></p></a> </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p style="color: red; padding-top: 10px;"> No Results found </p>
        <?php endif; ?>

    </div>


</div>

<?php include 'footer.php' ?>
<?php $page = 'full_sanctuary'; include 'header.php'?>

<h1><?php echo $sanctuaries['name'] ?></h1><br>

<h2><?php echo $sanctuaries['details'] ?></h2><br><br>
<h4>Birds that can be found...</h4>
<blockquote><?php echo $sanctuaries['bird_details'] ?></blockquote>

<section>
    <iframe class="mymap" src="<?php echo $sanctuaries['map_link'] ?>" width="80%" height="700"></iframe>
</section>

<?php include 'footer.php'?>

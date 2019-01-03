<?php $page = 'categories'; include "header.php"?>


<br>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url('index.php/home/gallery') ?>"> Gallery </a></li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
</nav>


<br>

<div class="container">



        <?php
            if(!empty($category)) {

                echo '<div class="card-columns">';
                foreach ($category as $cat){


                    echo "<a href=\"javascript:setImageVisible('".$cat->id."', true)\"><div class=\"card border-success mb-3\">";
                    echo "<div class=\"card-body text-success\" >";
                    echo "<h5 class=\"card-title\"> $cat->name</h5>";
                    echo "<p class=\"card-text\">$cat->details</p>";
                    echo '</div>';
                    echo '</div></a>';
                    //echo "<input type=\"hidden\" name=".$cat->id.">";

                }
                echo '</div>';
            }

        ?>




</div>
    <a href="javascript:setImageVisible('1', true)">show image</a>
    <a href="javascript:setImageVisible('1', false)">hide image</a>

<?php
if(!empty($photos)) {

    echo '<div class="card-columns">';
    foreach ($photos as $pht){


        echo "<div class=\"card border-success mb-3\">";
        echo "<div class=\"card-body text-success\" >";
        echo "<img src=".$pht->link.">";
        echo '</div>';
        echo '</div></a>';
        //echo "<input type=\"hidden\" name=".$cat->id.">";

    }
    echo '</div>';
}

?>









<script>

    function setImageVisible(id, visible) {
        var img = document.getElementById(id);
        img.style.visibility = (visible ? 'visible' : 'hidden');
        return true;
    }

</script>






<?php include 'footer.php'; ?>
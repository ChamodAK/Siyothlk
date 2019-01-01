<?php $page="ad_photo";include "header.php"?>
<br>
<br>
<div class="container col-md-6">
    <?php echo form_open("Gallery/inst_photo") ?>
        <div class="form-group">
            <label for="name">Bird Name</label>
            <input type="text" class="form-control" id="name"  placeholder="Enter Bird Name" required>
        </div>

        <div class="form-group">
            <label for="uploaded_photo">Choose photo</label>
            <input type="file" class="form-control-file" id="photo" required>
        </div>
        <div class="form-check">
            <input type="radio" class="radio-inline" name="rad" value="map_image" required>
            <label class="radio-inline" for="map_image">Map image</label>
            <input type="radio" class="radio-inline" name="rad" value="gal_image" required>
            <label class="radio-inline" for="gal_image">Gallery image</label>
        </div>
    <br>

        <button type="submit" class="btn btn-danger">Submit</button>
</div>



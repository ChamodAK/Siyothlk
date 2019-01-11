<?php $panel = 'wiki'; include 'admin_dashboard_frame.php'; ?>

    <div>
        <div class="card">
            <h4 class="card-header">Add New Bird</h4>
            <div class="card-body">

                <?php
                if($this->session->flashdata('msg')) {
                    echo $this->session->flashdata('msg');
                }
                ?>

                <span style="color: red"><?php echo validation_errors(); ?></span>
                <span style="color: red"><?php echo $error; ?></span>

                <?php echo form_open_multipart('Admin/add_new_bird'); ?>

                <div class="form-group">
                    <label> Common Name </label>
                    <input type="text" class="form-control" placeholder="Enter common name" value="<?php echo set_value('comName'); ?>" name="comName">
                </div>

                <div class="form-group">
                    <label> Scientific Name </label>
                    <input type="text" class="form-control" placeholder="Enter scientific name" value="<?php echo set_value('sciName'); ?>" name="sciName">
                </div>

                <div class="form-group">
                    <label> Other Names </label>
                    <input type="text" class="form-control" placeholder="Enter other names if any" value="<?php echo set_value('otherName'); ?>" name="otherName">
                </div>

                <div class="form-group">
                    <label> Bird Size </label>
                    <select name="size" >
                        <option value="r">Robin</option>
                        <option value="m">Myna</option>
                        <option value="c">Crow</option>
                        <option value="ch">Chicken</option>
                        <option value="e">Egret</option>
                        <option value="p">Peacock</option>
                    </select>
<!--                    <input type="text" class="form-control" placeholder="r-robin, m-myna, c-crow, ch-chicken, e-egrate, p-peacock" value="--><?php //echo set_value('size'); ?><!--" name="size">-->
                </div>



                <div class="form-group">
                    <label> Bird Category </label>
                    <select name="category" >
                        <option value="e">Endemic</option>
                        <option value="h">Home Garden</option>
                        <option value="m">Migrant</option>
                        <option value="r">Rainforest</option>
                        <option value="s">Shrub</option>
                        <option value="u">Urban Areas</option>
                        <option value="w">Wetland</option>
                    </select>
<!--                    <input type="text" class="form-control" placeholder="e-endemic, h-home garden, m-migrant, r-rainforest, s-shrub, u-urban areas, w-wetland " value="--><?php //echo set_value('category'); ?><!--" name="category">-->
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label> Colour 01 </label>
                            <input type="text" class="form-control" placeholder="Enter colour 1" value="<?php echo set_value('colour1'); ?>" name="colour1">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label> Colour 02 </label>
                            <input type="text" class="form-control" placeholder="Enter colour 2 if any" value="<?php echo set_value('colour2'); ?>" name="colour2">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter bird location" value="<?php echo set_value('location1'); ?>" name="location1">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label> Location 02 </label>
                            <input type="text" class="form-control" placeholder="if any" value="<?php echo set_value('location2'); ?>" name="location2">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label> Location 03 </label>
                            <input type="text" class="form-control" placeholder="if any" value="<?php echo set_value('location3'); ?>" name="location3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label> Distribution Map Link </label>
                    <input type="text" class="form-control" placeholder="Paste distribution map link here" value="<?php echo set_value('map'); ?>" name="map">
                </div>

                <div class="form-group">
                    <label> Bird Details </label>
                    <textarea class="form-control" rows="10" placeholder="Enter bird details" name="details"><?php echo set_value('details'); ?></textarea>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label> Upload bird image </label><br>
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label> Image name </label>
                            <input type="text" class="form-control" placeholder="Enter image name" value="<?php echo set_value('imgName'); ?>" name="imgName">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace( 'details' );
    </script>


<?php include 'admin_dashboard_foot.php'; ?>
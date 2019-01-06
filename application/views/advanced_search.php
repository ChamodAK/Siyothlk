<?php $page = 'bird_wiki'; include 'header.php';?>

<?php include "sidebar.php"; ?>

    <div class="main container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home/bird_wiki'); ?>"> Bird Wiki </a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/Wiki/categories'); ?>"> Bird Categories </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Advanced Search </li>
            </ol>
        </nav>

        <?php
        if($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

        <div class="row">
            <div class="col-lg-12" style="margin: 10px 10px;">
                <h3 class="my-4"> Advanced Search </h3>
            </div>

            <div class="container">

                <?php echo form_open_multipart('Wiki/advanced_search'); ?>

                <div class="form-group">
                    <label> Select bird size and shape: </label><br>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <ul>
                            <li class="btn btn-light active" style="padding-right: 20px;">
                                <input type="radio" name="size" id="size1" value="r" autocomplete="off" checked>
                                <img src="<?=base_url('asset/wiki/robin.png')?>" alt="" width="100" height="100"">
                            </li>
                            <li class="btn btn-light active">
                                <input type="radio" name="size" id="size2" value="m" autocomplete="off">
                                <img src="<?=base_url('asset/wiki/myna.png')?>" alt="" width="100" height="100">
                            </li>
                            <li class="btn btn-light active">
                                <input type="radio" name="size" id="size3" value="c" autocomplete="off">
                                <img src="<?=base_url('asset/wiki/crow.png')?>" alt="" width="100" height="100">
                            </li>
                            <li class="btn btn-light active">
                                <input type="radio" name="size" id="size4" value="ch" autocomplete="off">
                                <img src="<?=base_url('asset/wiki/chicken.png')?>" alt="" width="100" height="100">
                            </li>
                            <li class="btn btn-light active">
                                <input type="radio" name="size" id="size5" value="e" autocomplete="off">
                                <img src="<?=base_url('asset/wiki/egret.png')?>" alt="" width="100" height="100">
                            </li>
                            <li class="btn btn-light active">
                                <input type="radio" name="size" id="size6" value="p" autocomplete="off">
                                <img src="<?=base_url('asset/wiki/peacock.png')?>" alt="" width="100" height="100">
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">

                    <label> Select one or two main colours: </label><br>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <ul>
                            <li class="btn btn-light active" style="margin: 10px 10px;">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: red;"></div>
                                <input type="checkbox" name="colour[]" value="red" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: brown;"></div>
                                <input type="checkbox" name="colour[]" value="brown" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: white;"></div>
                                <input type="checkbox" name="colour[]" value="white" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: yellow;"></div>
                                <input type="checkbox" name="colour[]" value="yellow" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: green;"></div>
                                <input type="checkbox" name="colour[]" value="green" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;"">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: darkblue;"></div>
                                <input type="checkbox" name="colour[]" value="blue" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;"">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: black;"></div>
                                <input type="checkbox" name="colour[]" value="black" autocomplete="off">
                            </li>
                            <br>
                            <li class="btn btn-light active" style="margin: 10px 10px;"">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: orangered;"></div>
                                <input type="checkbox" name="colour[]" value="orange" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;"">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: goldenrod;"></div>
                                <input type="checkbox" name="colour[]" value="gold" autocomplete="off">
                            </li>
                            <li class="btn btn-light active" style="margin: 10px 10px;"">
                                <div style="width: 75px; height: 75px; border-radius: 50px; background: grey;"></div>
                                <input type="checkbox" name="colour[]" value="grey" autocomplete="off">
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="form-group">

                    <label> Where was the bird when you see it.. </label><br>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="location" id="loc1" value="ground dwelling" autocomplete="off" checked>
                            Ground dwelling
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="location" id="loc2" value="on a bush" autocomplete="off">
                            On a bush
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="location" id="loc3" value="perched on branch" autocomplete="off">
                            Perched on branch
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="location" id="loc4" value="canopy" autocomplete="off">
                            Canopy
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" name="location" id="loc5" value="water" autocomplete="off">
                            Water
                        </label>
                    </div>

                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Search </button>
                </div>

                <?php echo form_close(); ?>

            </div>

        </div>

    </div>

<?php include 'footer.php' ?>
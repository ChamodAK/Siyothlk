<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?php echo base_url('asset/images/logo_white.jpg') ?>">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo base_url("asset/css/style.css")?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>

    <style type="text/css">

        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
            padding-bottom: 15px;
        }

        #body2 {
            margin: 0 15px 0 15px;
            padding-bottom: 15px;
            padding-bottom: 25px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 400px;
            width:100%;
        }

        #map2 {
            height: 400px;
            width:100%;
        }
    </style>

    <title> Siyoth.lk </title>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url('index.php/home'); ?>">
        <img src="<?php echo base_url() ?>asset/images/logo_white.jpg" width="30" height="30" class="rounded-circle" alt="image">
        Siyoth.lk
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php $page = 'map'; ?>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?php
                if($this->session->userdata('admin_flag')==1) {
                    if($page=='dashboard') {
                        echo "<a class=\"nav-link active\" href=\"" . base_url('index.php/home/dashboard') . "\"> Dashboard <span class=\"sr-only\"></span></a>";
                    }
                    else {
                        echo "<a class=\"nav-link\" href=\"" . base_url('index.php/home/dashboard') . "\"> Dashboard <span class=\"sr-only\"></span></a>";
                    }
                }
                else {
                    if($page=='home') {
                        echo "<a class=\"nav-link active\" href=\"" . base_url('index.php/home') . "\"> Home <span class=\"sr-only\"></span></a>";
                    }
                    else {
                        echo "<a class=\"nav-link\" href=\"" . base_url('index.php/home') . "\"> Home <span class=\"sr-only\"></span></a>";
                    }
                }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='bird_wiki'){echo " active";}?>" href="<?php echo base_url('index.php/home/bird_wiki') ?>">Bird WiKi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='news_articles'){echo " active";}?>" href="<?php echo base_url('index.php/home/news_and_articles') ?>">News & Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='forum'){echo " active";}?>" href="<?php echo base_url('index.php/home/forum') ?>">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='events'){echo " active";}?>" href="<?php echo base_url('index.php/home/events') ?>">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='sanctuaries'){echo " active";}?>" href="<?php echo base_url('index.php/home/sanctuary') ?>">Sanctuaries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($page=='gallery'){echo " active";}?>" href="<?php echo base_url('index.php/home/gallery') ?>">Gallery</a>
            </li>
            <li class="nav-item dropdown <?php if($page=='map'){echo " active";}?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Maps
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('index.php/Pic_Map') ?>">Pic Map</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/home/distribution_map') ?>">Distribution Maps</a>
                    <a class="dropdown-item" href="<?php echo base_url('index.php/home/sanctuary_map') ?>">Sanctuary Map</a>
                </div>
            </li>
        </ul>

        <?php if (($page == 'gallery') or ($page == 'search_image_result')) {?>
            <form class="form-inline my-2 my-lg-0" action="<?=base_url('index.php/home/image_search')?>" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <?php }?>

        <?php if (!(($page == 'gallery') or ($page == 'search_image_result'))) {?>
            <form class="form-inline my-2 my-lg-0" action="<?=base_url('index.php/home/search')?>" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        <?php }?>


        <ul class="navbar-nav navbar-right mr-auto">
            <li class="nav-item">
                <a class="nav-link <?php if($page=='login'){echo " active";}?>" href="<?php echo base_url("index.php/home/login") ?>">
                    <?php
                    if($this->session->userdata('username')==false) {
                        echo "Login";
                    }
                    ?>
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php
            if($this->session->userdata('username')) {
                echo "<li class=\"nav-item dropdown\">";
                echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n";
                echo $this->session->userdata('username');
                echo "</a>\n";
                echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n";
                echo "<a class=\"dropdown-item\" href=\"" . base_url('index.php/home/my_profile');
                echo "\">My Profile</a>\n";
                echo "<a class=\"dropdown-item\" href=\"" . base_url('index.php/login/user_logout');
                echo "\">Logout</a>\n";
                echo " </div>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</nav>

<div id="container">

    <!-- Display messages if we have any -->
    <?php if($this->session->flashdata('session_message') && $this->session->flashdata('session_status')) { ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('session_message') ?>
        </div>
    <?php }
    else if($this->session->flashdata('session_message') && !$this->session->flashdata('session_status')) { ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('session_message') ?>
        </div>
    <?php }
    ?>

    <span style="color: red"><?php echo $error; ?></span>

    <div id="body2">
        <h3 style="padding-top: 10px;"> Here you can see the bird images uploaded by users with location</h3>

        <p style="font-size: large; color: #004594;">Click on a pin to see the image</p>

        <div id="map2"></div>

    </div>

    <div id="body">
        <?php echo form_open_multipart('Pic_Map/saveLocation'); ?>
<!--        <form id="bird_form" action="--><?php //echo site_url('Pic_Map/saveLocation');?><!--" method="post">-->
            <h3>You can contribute to our pic map too...</h3>

            <p style="font-size: large; color: #004594;"> Upload your pic, select the location and hit save to upload your image with location<p>

            <div id="map"></div>

            <label> Upload an Image </label><br>

            <input id="locationval" name="location" type="hidden">
            <input type="file" class="" name="img">

<!--            <input type="submit" value="Submit"/>-->
            <button type="submit" class="btn btn-primary"> Submit </button>

<!--        </form>-->
        <?php echo form_close(); ?>

    </div>

</div>

</body>

<!-- This Script Handles the User Location Selection Map -->
<script>
    var map;
    var markers = [];

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 7.8731, lng: 80.7718},
            zoom: 7
        });

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            deleteMarkers();
            addMarker(event.latLng);
            var element = document.getElementById('locationval');
            console.log(event.latLng.lat()+","+event.latLng.lng());
            element.value = event.latLng.lat()+","+event.latLng.lng();
        });

        initMap2();
    }

    // Adds a marker to the map and push to the array.
    function addMarker(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

</script>


<!-- ********************************** MAP 2 **************************************** -->


<!-- This Script Handles the sletected location display Map -->
<script>
    var map2;

    function initMap2() {
        map2 = new google.maps.Map(document.getElementById('map2'), {
            center: {lat: 7.8731, lng: 80.7718},
            zoom: 7
        });

        // This event listener will call addMarker() when the map is clicked.
        map2.addListener('click', function(event) {
            deleteMarkers();
            addMarker(event.latLng);
        });
        var lat,lng;

        var markers2 = [];
        var infoWindows = [];
        var count = 0;

        <?php
        // Iterate through all the locations retrieved from the database
        foreach($locations as $loc) {
        $latlng = explode(",",$loc->location);
        ?>
        lat = <?php echo $latlng[0]; ?>;
        lng = <?php echo $latlng[1]; ?>;

        // Add a clickable marker on the location
        markers[count] = addMarkerAndReturn(new google.maps.LatLng({lat: lat, lng: lng}) );
        markers[count].index = count;

        // Get the image to display on the marker and construct the content string
        var url = '<?php echo base_url('pic_map/') . $loc->image_link; ?>';
        var contentString = '<img style="width:100px; height: 70px;" src="'+ url +'" >';

        // Create the info window
        infoWindows[count] = new google.maps.InfoWindow({
            content: contentString
        });

        // Add a listner to handle the pin click event to display the bird image
        markers[count].addListener('click', function() {
            infoWindows[this.index].open(map2, markers[this.index]);
        });

        count = count + 1;

        <?php } ?>


    }

    // Adds a marker to the map and push to the array.
    function addMarkerAndReturn(location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map2
        });
        return marker
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXB01t5HDw9ORFjmK4Jze2AxbL_HpeKMY&callback=initMap"
        async defer></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>

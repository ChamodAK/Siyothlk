<?php $page="ad_photo";include "header.php"?>
<br>
<br>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url('index.php/home/gallery') ?>"> Gallery </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Add Image </li>
    </ol>
</nav>

<div class="container col-md-6">
    <?php echo form_open("Gallery/add_image") ?>
        <div class="form-group">
            <label for="bird">Bird Name</label>
            <select name="bird" >
                <?php
                print_r($b_list);
                if(!empty($b_list)){
                    foreach ($b_list as $bird) {
                        echo "<option value=".$bird->comName.">".$bird->comName."</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="bird">Bird Name</label>
            <select name="category" >
                <?php
                print_r($c_list);
                if(!empty($c_list)){
                    foreach ($c_list as $category) {
                        echo "<option value=".$category->id.">".$category->name."</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="uploaded_photo">Choose photo</label>
            <input type="file" class="form-control-file" name="userfile" required>
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
<br>
<br>

<!-- > ----------map------------<-->
<!DOCTYPE>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>From Info Windows to a Database: Saving User-Added Form Data</title>
    <style>

        #map {
            height: 800px;
            width: 100%;

        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map" height="460px" width="100%"></div>

<div id="message">Location saved</div>
<script>
    var map;
    var marker;
    var infowindow;
    var messagewindow;

    function initMap() {
        var srilanka = {lat: 7.8731, lng: 80.7718};
        map = new google.maps.Map(document.getElementById('map'), {
            center: srilanka,
            zoom: 8
        });



        google.maps.event.addListener(map, 'click', function(event) {
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map

            });

            saveData()
        });
    }

    function saveData() {

        var latlng = marker.getPosition();
        var latitude=latlng.lat();
        var langitude=latlng.lng();
        var url = 'phpsqlinfo_addrow.php?name=' + name + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

       // <input type='text' name='lat' value=latitude >
       //++ <input type='text' name='lng' value=langitude >


        downloadUrl(url, function(data, responseCode) {

            if (responseCode == 200 && data.length <= 1) {
                messagewindow.open(map, marker);
            }
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing () {
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8PjAHD2-pVeQCxSIbRd_2Koy2BtPeLBk&callback=initMap">
</script>

<?php echo form_close() ?>
</body>
</html>





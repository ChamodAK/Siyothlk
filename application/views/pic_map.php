<?php $page = 'pic_map'; include 'header.php'; ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/home'); ?>"> Home </a></li>
        <li class="breadcrumb-item active" aria-current="page"> Pic Map </li>
    </ol>
</nav>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        .container {
            height: 700px;
        }
        tr {
            height: 40px;
        }

        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div id="map" height="460px" width="100%"></div>
    <div id="form">
        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <select name="name" id="name">
                        <?php foreach ($names as $name) { ?>
                        <option value=""><?php echo $name->comName?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Description:</td> 
                <td><textarea name="description" id="" cols="30" rows="10"></textarea> </td>
            </tr>
            <tr>
                <td>Upload your image:</td>
                <td><input type="file" class="" name="userfile"></td>
            </tr>
            <tr><td></td><td><input type='submit' value='Save' onclick='saveData()'/></td></tr>
        </table>
    </div>
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

            infowindow = new google.maps.InfoWindow({
                content: document.getElementById('form')
            });

            messagewindow = new google.maps.InfoWindow({
                content: document.getElementById('message')
            });

            google.maps.event.addListener(map, 'click', function(event) {
                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map
                });


                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
            });
        }

        function saveData() {
            var name = escape(document.getElementById('name').value);
            var description = escape(document.getElementById('description').value);
            //var type = document.getElementById('type').value;
            var latlng = marker.getPosition();
            var url = 'phpsqlinfo_addrow.php?name=' + name + '&description=' + description + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

            downloadUrl(url, function(data, responseCode) {

                if (responseCode == 200 && data.length <= 1) {
                    infowindow.close();
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
</div>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8PjAHD2-pVeQCxSIbRd_2Koy2BtPeLBk&callback=initMap">
</script>
</body>
</html>

<?php include 'footer.php';?>

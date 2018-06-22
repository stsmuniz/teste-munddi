<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teste munddi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">munddi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#map">Ache nossas lojas <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main">
        <div class="container-fluid">
            <div class="container">
                <div class="row title">
                    <div class="col-md-12">
                        <p class="text-center">ACHE NOSSAS LOJAS</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="map-container">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(initMap);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function initMap(position) {
            var currentLocation = {lat: position.coords.latitude, lng: position.coords.longitude};
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 14, center: currentLocation}
                );
            var activeInfoWindow    
            $.ajax({
                method: 'GET',
                url: '/stores',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(i, item) {
                        var position = new google.maps.LatLng(item.latitude, item.longitude)
                        var infoWindow = null
                        var marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: item.name
                        })

                        var infoWindow = new google.maps.InfoWindow()
                        var markerContent = '<h5>' + item.name + '</h5>'+
                            '<p>' + item.address + ' ' + item.number + ' - ' + item.city + ' - ' + item.state + '</p>'
                        infoWindow.setContent(markerContent)

                        google.maps.event.addListener(marker, 'click', function() {
                              activeInfoWindow&&activeInfoWindow.close()
                              map.setCenter(marker.getPosition())
                              infoWindow.open(map, marker)
                              activeInfoWindow = infoWindow
                        })
                    })
                }
            })
        }

        $(document).ready(function() {
            getLocation()
        })
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCB8hAAPs-4wQmZ2CwZ0E5YwPWd-jL4s0U&callback=initMap" type="text/javascript"></script>
</body>
</html>
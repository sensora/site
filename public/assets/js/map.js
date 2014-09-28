;(function($, window, undefined) {
    var center = new google.maps.LatLng(19.4140984, -99.1656674),
        mapOptions = {
            center: center,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: true
        },
        map,
        marker;

    if ( $('#sensor_map').is(":visible") ) {
        map = new google.maps.Map(document.getElementById("sensor_map"), mapOptions);
        marker = new google.maps.Marker({
            position: center,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function() {
            updateCoordsFields(marker.getPosition().lat(), marker.getPosition().lng());
        });
    }

    var getLocation = function() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                handleLocation(position.coords.latitude, position.coords.longitude);
            }, function() {
                handleNoGeolocation();
            });
        // Try Google Gears Geolocation
        } else if (google.gears) {
            var geo = google.gears.factory.create('beta.geolocation');
            geo.getCurrentPosition(function(position) {
                handleLocation(position.latitude, position.longitude);
            }, function() {
                handleNoGeoLocation();
            });
        // Browser doesn't support Geolocation
        } else {
            handleNoGeolocation();
        }
    };

    var updateCoordsFields = function(lat, lng) {
        $('#latitude').val(lat);
        $('#longitude').val(lng);
    };

    var handleLocation = function (lat, lng) {
        var location = new google.maps.LatLng(lat, lng);
        marker.setPosition(location);
        map.setCenter(location);
        map.setZoom(17);

        updateCoordsFields(lat, lng);
    };

    var handleNoGeolocation = function() {
        map.setCenter(center);
    };

    $(document).ready(function() {
        $('#getLocation').click(function(e) {
            e.preventDefault();

            getLocation();
        });

        var latitude = $('#latitude').val(),
            longitude = $('#longitude').val();

        if ( typeof latitude != 'undefined' && typeof longitude != 'undefined' && latitude != '' && longitude != '' ) {
            var location = new google.maps.LatLng(latitude, longitude);
            marker.setPosition(location);
            map.setCenter(location);
        }

        var listLatitude, listLongitude;

        $('.openMapModal').click(function(e) {
            e.preventDefault();

            listLatitude = $(this).data('latitude');
            listLongitude = $(this).data('longitude');

            $('#modalMap').foundation('reveal', 'open');
        });

        $(document).on('opened.fndtn.reveal', '[data-reveal]', function () {
            var modal = $(this);

            var listMap = new google.maps.Map(document.getElementById("sensor_map"), mapOptions),
                listMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(listLatitude, listLongitude),
                    map: listMap,
                    draggable: true
                });
        });

        $(document).on('closed.fndtn.reveal', '[data-reveal]', function () {
            var modal = $(this);

            $('#sensor_map', modal).html('');
        });
    });
}(jQuery, window));
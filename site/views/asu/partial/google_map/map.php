<div id="map_container">

</div>

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASgOn4nT8sQEP9xn6HjuMXv9uPQkpiuXE&sensor=false">
</script>
<script type="text/javascript">

    var myOptions =
    {
        zoom: 8,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
     map = new google.maps.Map(document.getElementById("map_container"), myOptions);


    var address = "Bulgaria";
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            map.fitBounds(results[0].geometry.bounds);
            map.setZoom(7);
            map.panBy(-5,15);
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });

    $.getJSON('/json/map_dates',null, success);

    function success(data){

        for (var i=0; i<data.length;i++){

           var currentCity = data[i];
            var city = {
                city_en: currentCity.city_en,
                city_bg: currentCity.city_bg,
                theater_bg:currentCity.theater_bg,
                theater_en:currentCity.theater_en,
                date_bg:currentCity.show_date_bg,
                date_en:currentCity.show_date_en,
                address_bg: currentCity.address_bg,
                address_en: currentCity.address_en,
                picture: currentCity.picture,
                link: currentCity.boxoffice_link
            };
           addMarker(city);
        }
    }


    function addMarker(city){

        geocoder.geocode( { 'address': city.city_en + ', Bulgaria'}, function(results, status) {

            if (status == google.maps.GeocoderStatus.OK) {
                var location = results[0].geometry.location;
                console.log(location);;
                var latlong = new google.maps.LatLng(location.k,location.A);
                var address = results[0].address_components[0].long_name;

                var icon_file_path = '/allshookup/images/icons/marker.png';
                var marker = new google.maps.Marker({
                    position: latlong,
                    map: map,
                    icon: icon_file_path,
                    animation: google.maps.Animation.DROP,

                    title : address
                });

                var infowindow = new google.maps.InfoWindow(
                    {
                        content: '<a target=_blank href='+ city.link +'><img style="width:170px;"src="'+ city.picture + '"/><br>' + city.address_<?=$lang?> +'</a>'
                    }
                );

                google.maps.event.addListener(marker, 'mouseover', function() {
                    infowindow.open(map, marker);
                });

                google.maps.event.addListener(marker, 'mouseout', function() {
                    setTimeout(function(){
                        infowindow.close(map, marker);
                    },800);
                });

            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });


    }


    var styles =  [
        {
            stylers: [
                { hue: "#00afe6" },
                { saturation: -5 },
                {lightness: 0}
            ]
        },{
            featureType: "road",
            elementType: "geometry",
            stylers: [
                { lightness: 10 },
                { visibility: "on" }
            ]
        },{
            featureType: "road",
            elementType: "labels",
            stylers: [
                { visibility: "on" }
            ]
        }
    ];
    map.setOptions({styles: styles});

    function add_marker(location){
        console.log(location);
        var icon_file_path = '/allshookup/images/icons/marker.png';
        var beachMarker = new google.maps.Marker({
            position: location.langs,
            map: map,
            icon: icon_file_path,
            title : location.city_<?= $lang?>
        });
    }

</script>


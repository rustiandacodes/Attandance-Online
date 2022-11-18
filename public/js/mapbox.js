const defaultlocation = [106.54, -6.168525];

mapboxgl.accessToken =
    "pk.eyJ1IjoicnVzdGlhbmRhemVuIiwiYSI6ImNsNm53dTFlNjA1MXczb3BraXIxaWs4dGQifQ.1i8pHi7ZSEvU5cSC33dOTw";

var map = new mapboxgl.Map({
    container: "map",
    zoom: 15,
    center: defaultlocation,
    style: "mapbox://styles/mapbox/streets-v11",
});

var geolocate = new mapboxgl.GeolocateControl();

map.addControl(geolocate);

map.on("load", function () {
    geolocate.trigger();
});

geolocate.on("geolocate", function (e) {
    let lon = e.coords.longitude;
    let lat = e.coords.latitude;

    var showLong = document.querySelector("#longitude");
    var showLat = document.querySelector("#latitude");

    showLong.value = lon;
    showLat.value = lat;
});

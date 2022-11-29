var map = L.map('mapsku').setView([-7.0245542,110.347025], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFuc3lpaWFoIiwiYSI6ImNsYXYwcDJ3dDAxM3Izbm83MjhkYmk3MjQifQ.UYLtCoyJU2LcBX56RYSX6g', {attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery ç <a href="https://www.mapbox.com/">Mapbox</a>', maxZoom: 18, id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, accessToken: 'your.mapbox.access.token'}).addTo(map);

function popupku(f,l) {
    var out = [];

    if(f.properties){
        for (key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        l.bindPopup(out.join("<br/>"))
    }
}
var geoJsonLayer = new L.GeoJSON.AJAX("style/dist/js/banyumas.geojson", {onEachFeature: popupku});
geoJsonLayer.addTo(map);
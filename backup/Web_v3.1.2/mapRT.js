// Map initialization 
var map = L.map('map').setView([-12.017093, -76.893417], 12);

//osm layer
var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
osm.addTo(map);

var pos1={id:1, lat:-11.979067, lon:-76.782601, acc:14};
var pos2={id:2, lat:-12.033704, lon:-76.942374, acc:14};


setInterval(()=>{
    showPosition(pos1)
    showPosition(pos2)
    pos1.lon=pos1.lon-0.000500
    pos2.lon=pos2.lon+0.000500
}, 1000)
var n=2; // number of units
var marker=[], circle=[];

function showPosition(pos) {
    console.log(marker[id])
    var lat = pos.lat
    var lon = pos.lon
    var acc = pos.acc
    var id = pos.id
    if(marker[id]) {
        map.removeLayer(marker[id])
    }
    if(circle[id]) {
        map.removeLayer(circle[id])
    }
    marker[id] = L.marker([lat, lon])
    circle[id] = L.circle([lat, lon], {radius: acc})

    var featureGroup = L.featureGroup([marker[id], circle[id]]).addTo(map)
    
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastreo en tiempo real</title>
    <link rel="Alternate StyleSheet" href="styleRT.css" />
    <script
          src="https://kit.fontawesome.com/7e5b2d153f.js"
          crossorigin="anonymous"
        ></script>
    <script defer src="index.js"></script>

    <!-- leaflet css  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

</head>

<body>
    <header class="header">
        <nav class="nav">
            <img src="logo_icm3.png" alt="">
            <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i> <!-- hamburguer icon for mobile devices-->
            </button>
            <ul class="nav-menu">
                <li class="nav-menu-item">
                  <a href="tabRT.html" class="nav-menu-link nav-link">TABLA DE MONITOREO</a>
                </li>
                <li class="nav-menu-item">
                    <a href="#" class="nav-menu-link nav-link ">MAPA DE MONITOREO</a>
                </li>
                <li class="nav-menu-item">
                  <a href="registros.php" class="nav-menu-link nav-link">REGISTROS</a>
                </li>
                
            </ul>
        </nav>
    </header>
    <div id="map"></div>
    
    
</body>
</html>

<!-- leaflet js  -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // php DB connection
    <?php
        $link = new PDO("mysql:host=localhost;dbname=datero","root","");
    ?>
    
    // Map initialization 
    var map = L.map('map').setView([-12.017093, -76.893417], 12);

    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    var pos1={id:1, lat:-11.979067, lon:-76.782601, acc:14, direct:1}; // 0:ida(Ch->L) - 1:vuelta(L->Ch)
    var pos2={id:2, lat:-12.040873, lon:-76.960716, acc:14, direct:0};
    var pos3={id:3, lat:-12.011752, lon:-76.877152, acc:14, direct:1};
    var pos4={id:4, lat:-12.057612, lon:-76.971415, acc:14, direct:0};
    var pos5={id:5, lat:-12.059635, lon:-77.041467, acc:14, direct:1};

    setInterval(()=>{
        showPosition(pos1)
        showPosition(pos2)
        showPosition(pos3)
        showPosition(pos4)
        showPosition(pos5)
        /*
        pos1.lon=pos1.lon-0.000500
        pos1.lat=pos1.lat-0.000140
        pos2.lon=pos2.lon+0.000500
        pos2.lat=pos2.lat+0.000200
        pos3.lon=pos3.lon-0.000500
        pos3.lat=pos3.lat-0.000150
        pos4.lon=pos4.lon-0.000200
        pos4.lat=pos4.lat-0.000080
        pos5.lon=pos5.lon-0.000020
        pos5.lat=pos5.lat+0.000200
        */
    }, 1000)
    var n=2; // number of units
    var marker=[];

    function showPosition(pos) {
        console.log(marker[id])
        var lat = pos.lat
        var lon = pos.lon
        var acc = pos.acc
        var id = pos.id
        if(marker[id]) {
            map.removeLayer(marker[id])
        }
        // if 0:ida     if 1:vuelta
        marker[id] = L.marker([lat, lon])
        var featureGroup = L.featureGroup([marker[id]]).addTo(map)
    }

</script>
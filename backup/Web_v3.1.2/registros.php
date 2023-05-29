<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Datero</title>
        <link rel="stylesheet" href="style.css" />
        <script
          src="https://kit.fontawesome.com/7e5b2d153f.js"
          crossorigin="anonymous"
        ></script>
        <script defer src="index.js"></script>
        
        <!--
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://unpkg.com/paho-mqtt@1.0.2/paho-mqtt.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js" type="text/javascript"></script>
        -->
    </head>

    <body>
        <header class="header">
            <nav class="nav">
                <img src="logo_icm3.png" alt="">
                <button class="nav-toggle" aria-label="Abrir menú">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="nav-menu">
                    <li class="nav-menu-item">
                      <a href="tabRT.html" class="nav-menu-link nav-link">TABLA DE MONITOREO</a>
                    </li>
                    <li class="nav-menu-item">
                      <a href="mapRT.html" class="nav-menu-link nav-link">MAPA DE MONITOREO</a>
                    </li>
                    <li class="nav-menu-item">
                      <a href="#" class="nav-menu-link nav-link">REGISTROS</a>
                    </li>
                    
                </ul>
            </nav>
        </header>

        <?php
            $link = new PDO("mysql:host=localhost;dbname=datero","root","");
        ?>
        <main>
            <div class="wrapper">
                <h1> Registros de cada vehículo </h1>
                <br>
                <h2> UNIDAD </h2>
                <br>
                <form id="connection-information-form">
                    <b>Seleccione placa:    </b>
                    <input id="placa" type="text" name="placa" placeholder="Placa">
                    <br>
                </form><br>
                <table>
                    <thead>
                        <tr>
                          
                          <th>HORA</th>
                          <th>PARADERO</th>
                        </tr>
                    </thead>
                    <?php foreach($link->query("SELECT * from " . "bus1") as $row) { ?>
                    <tbody id="table-3">
                        <tr> 
                          <td> <?php echo $row["fecha"] ?> </td>
                          <td> <?php echo $row["paradero"] ?> </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table><br><br>
                
                <h3>
                  <a href="mapRT.html" class="LinkRT" style="color: darkslategrey"> VER UBICACIONES EN TIEMPO REAL</a><br><br><br><br>
                </h3><br>
                
            </div>
        </main>
  </body>
</html>
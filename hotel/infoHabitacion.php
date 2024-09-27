<?php
    include('database/conn.php');
    $nombre_habitacion = $_GET['nombre_habitacion'];
    $datosHabitacion = mysqli_query($conn, "SELECT * FROM habitaciones where nombre_habitacion = '$nombre_habitacion'");
    $datosHabitacionArray = mysqli_fetch_array($datosHabitacion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/infoHabitacion.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="informacionGeneral">
            <div class="imagen"><img width="100%" src="data:image/jpg;base64,<?php echo base64_encode($datosHabitacionArray['imagen']);?>"></div>
            <div class="info">
            <span style="font-size: 32px;"><?php echo $nombre_habitacion?></span> <span style="font-size: 24px"><?php echo "$". $datosHabitacionArray['precio_noche']?> </span>
            </div>
            <div class="volver" style="margin: auto;">
                <button style="padding: 0.5em 1em; border-radius: 10em; border: none; color: rgb(222, 205, 188); background-color: rgb(130, 38, 59);" onclick="location.href='index.php'"><= volver al inicio</button>
            </div>
        </div>
        <div class="detalles">
            <div class="descripcion">
                <p><?php echo $datosHabitacionArray['descripcion']?></p>
            </div>
            
        </div>
        
    </div>
</body>
</html>
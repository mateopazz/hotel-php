<?php 
    include ('../database/conn.php');
    $datos = mysqli_query($conn, "SELECT * FROM reservas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lista.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <button onclick="location.href='../index.php'">Volver a Reservas</button>
        <table>
            <tr>
                <th>ID de la reserva</th><th>Nombre del reservante</th><th>Nombre de la habitación</th><th>Huéspedes</th><th>Check-in</th><th>Check-out</th>
            </tr>
            <?php 
                while($row = mysqli_fetch_assoc($datos)){
            ?>
            <tr>
                <td><?php echo $row['id_reserva']?></td>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['nombre_habitacion']?></td>
                <td><?php echo $row['huespedes']?></td>
                <td><?php echo $row['check_in']?></td>
                <td><?php echo $row['check_out']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>
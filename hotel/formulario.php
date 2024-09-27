<?php
    include('database/conn.php');
    $nombre_habitacion = $_GET['nombre_habitacion'];
    $check_in = $_GET['check_in'];
    $check_out = $_GET['check_out'];
    $huespedes = $_GET['huespedes'];
    $sql = mysqli_query($conn, "SELECT * FROM habitaciones where nombre_habitacion = '$nombre_habitacion'");
    $datosHabitacion = mysqli_fetch_array($sql);
    $id_habitacion = $datosHabitacion['id_habitacion'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
    <form method="post">
        <label for="nombre">Nombre completo: </label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">Email: </label>
        <input type="text" name="email" id="email">

        <label for="telefono">Telefono: </label>
        <input type="text" name="telefono" id="telefono">

        <input type="submit" name="reservar" value="Reservar" id="boton">
    </form>
    <?php
        if(!empty($_POST['nombre'])){
            if(isset($_POST['reservar'])){
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $ingresarReserva = mysqli_query($conn, "INSERT INTO reservas (id_habitacion, nombre_habitacion, check_in, check_out, huespedes, nombre, email, telefono) VALUES ('$id_habitacion', '$nombre_habitacion', '$check_in','$check_out','$huespedes','$nombre','$email','$telefono')");
                $actualizarHabitacion = mysqli_query($conn, "UPDATE habitaciones SET estado = 'Reservado' where nombre_habitacion = '$nombre_habitacion'");
                header("location:index.php");
            }
        }
    ?>
</body>
</html>
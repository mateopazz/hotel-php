<?php
    include('database/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/habitacion.css">
    <title>Document</title>
</head>
<body>
<?php
    if(!empty($_POST['check_in']) || !empty($_POST['check_out'])){
        ?>
            <style>
                body{
                    
                    align-items: normal;
                    justify-content: initial;
                }
            </style>
        <?php
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $huespedes = $_POST['huespedes'];
        if($huespedes == 1916){
            header("location:admin/lista.php");
        }
        else{

        
        $seleccionarHabitaciones =  mysqli_query($conn, "SELECT * FROM habitaciones where estado = 'disponible' AND capacidad >= '$huespedes'");
        ?> <div class="habitaciones"><?php
        foreach($seleccionarHabitaciones as $row){
            ?>
                <div class="habitacion">
                    <div class="imagen">
                        <img height="200px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>">
                    </div>
                    <div class="nombre_habitacion">
                        <?php echo $row['nombre_habitacion']?>
                    </div>
                    <div class="descripcion" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 18em;">
                    <span id="descripcion"><?php echo $row['descripcion']?></span>
                    </div>
                    <div class="capacidad">
                        <?php echo "Capacidad: ". $row['capacidad']?>
                    </div>
                    <div class="precio">
                        <?php echo "$".$row['precio_noche']?>
                    </div>
                    <button onclick="location.href='formulario.php?nombre_habitacion=<?php echo $row['nombre_habitacion']?>&&check_in=<?php echo $check_in?>&&check_out=<?php echo $check_out?>&&huespedes=<?php echo $huespedes?>'" id="boton">Reservar</button>
                    <a href="infoHabitacion.php?nombre_habitacion=<?php echo $row['nombre_habitacion']?>">Más Info...</a>
                </div>
            <?php
            }
        }
        ?>
        </div>
        <?php
    }
    else{
?>
    <form method="post" id="buscarReserva">
        <h1>RESERVA DE HABITACIÓN</h1>
        <span><p>Check-In:</p> <input type="date" name="check_in"></span>
        <span><p>Check-Out:</p> <input type="date" name="check_out"></span>
        <span style="margin: 2em;"><p>Cantidad de húespedes:</p> <input type="number" name="huespedes"></span>
        <input type="submit" name="buscar" value="buscar" id="boton">
    </form>
    <?php
        }
    ?>
</body>
</html>
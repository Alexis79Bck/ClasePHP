<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombreCliente = $_POST['nombreCliente'];
    $montoFianza = $_POST['montoFianza'];
    $cuotaAPagar = $montoFianza < 50000 ? $montoFianza * 0.03 : $montoFianza * 0.02;
            
    echo "<br />";
    echo '<a href="../../index.html#ejercicio3"> Regresar </a>';
    echo "<br />";
    echo "<br />";
    echo "Nombre Completo del Cliente: $nombreCliente ";
    echo "<br />";
    echo "Monto de la Fianza: $montoFianza";
    echo "<br />";
    echo "Cuota A Pagar: " . $cuotaAPagar;
    echo "<br />";
    echo "<br />";
}
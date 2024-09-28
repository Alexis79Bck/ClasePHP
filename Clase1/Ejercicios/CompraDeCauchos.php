<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cantidadDeCauchos = $_POST['cantidad'];
    $precio = $cantidadDeCauchos < 5 ? 800 : 700;
    $montoTotal = $cantidadDeCauchos < 5 ? $cantidadDeCauchos * 800 : $cantidadDeCauchos * 700;
        
    echo "<br />";
    echo '<a href="../../index.html#ejercicio3"> Regresar </a>';
    echo "<br />";
    echo "<br />";
    echo "Cantidad de Cauchos: $cantidadDeCauchos ";
    echo "<br />";
    echo "Precio Valor por Caucho: $precio";
    echo "<br />";
    echo "Monto Total A Pagar: " . $montoTotal;
    echo "<br />";
    echo "<br />";
}
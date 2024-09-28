<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $tipoDeDescuento = [
        0.15, 0.2, 0.3
    ];
    $montoDeCompra = $_POST['montoDeCompra'];
    $numeroAleatorioDelCliente = $_POST['numero'];
    
    switch (true) {
        case ($numeroAleatorioDelCliente < 50):
            $descuento = $montoDeCompra * $tipoDeDescuento[0];
            $descuentoObtenido = "15%";
            break;
        
        case ($numeroAleatorioDelCliente <= 80):
            $descuento = $montoDeCompra * $tipoDeDescuento[1];
            $descuentoObtenido = "20%";
            break;
        default:
            $descuento = $montoDeCompra * $tipoDeDescuento[2];
            $descuentoObtenido = "30%";
            break;
    }
    
    echo "<br />";
    echo '<a href="../../index.html#ejercicio1"> Regresar </a>';
    echo "<br />";
    echo "<br />";
    echo "El Monto de la Compra Fue: $montoDeCompra";
    echo "<br />";
    echo "El Número Escogido Fue: $numeroAleatorioDelCliente ";
    echo "<br />";
    echo "El porcentaje de descuento que obtuvo fue: $descuentoObtenido ";
    echo "<br />";
    echo "El monto del descuento de la compra fue: $descuento ";
    echo "<br />";
    echo "El monto total de la compra Fue: " . $montoDeCompra - $descuento;
    echo "<br />";
    echo "<br />";



}
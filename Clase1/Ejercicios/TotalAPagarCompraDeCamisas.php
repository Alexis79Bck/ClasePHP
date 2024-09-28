<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $tipoDeDescuento = [
        0.1, 0.2
    ];
    
    $cantidadCamisasComprada = $_POST['cantidad'];
    $montoTotalCamisasCompradas = $_POST['montoDeCompra'];
    
    if ($cantidadCamisasComprada < 3) {
        $descuento = $montoTotalCamisasCompradas * $tipoDeDescuento[0];
        $descuentoObtenido = "10%";    
    }else{
        $descuento = $montoTotalCamisasCompradas * $tipoDeDescuento[1];
        $descuentoObtenido = "20%";
    }
    echo "<br />";
    echo '<a href="../../index.html#ejercicio2"> Regresar </a>';
    echo "<br />";
    echo "<br />";
    echo "Cantidad de Camisas Compradas: $cantidadCamisasComprada ";
    echo "<br />";
    echo "Monto Total de las Camisas Compradas: $montoTotalCamisasCompradas";
    echo "<br />";
    echo "Descuento Obtenido por la Compra: $descuentoObtenido ";
    echo "<br />";
    echo "Monto del Descuento: $descuento ";
    echo "<br />";
    echo "Monto Total A Pagar: " . $montoTotalCamisasCompradas - $descuento;
    echo "<br />";
    echo "<br />";

}
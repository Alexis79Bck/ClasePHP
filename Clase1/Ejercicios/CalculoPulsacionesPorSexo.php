<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $edad = $_POST['edad'];
    
    switch ($_POST['sexo']) {
        case "F":
            $pulsaciones = (220 - $edad) / 10;
            $genero = "Femenino";
            break;
        case "M":
            $pulsaciones = (210 - $edad) / 20;
            $genero = "Masculino";
            break;    
    }
    
    echo "<br />";
    echo '<a href="../../index.html#ejercicio4"> Regresar </a>';
    echo "<br />";
    echo "<br />";
    echo "Genero: $genero ";
    echo "<br />";
    echo "Edad: $edad";
    echo "<br />";
    echo "Nro. de Pulsaciones por 10 Cada Segundos: " . $pulsaciones;
    echo "<br />";
    echo "<br />";


}
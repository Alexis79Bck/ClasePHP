<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function calcularDineroAEntregar(int $edad): int
    {
        return $edad * 10;
    }

    function generarEdadAleatoria(): int
    {
        return rand(1, 100);
    }

    function obtenerMontoRestante(int $monto, int $edad): int
    {
        return $monto - calcularDineroAEntregar($edad);
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicios PHP </title>

    <link rel="stylesheet" href="../estilos.css" />
</head>

<body>
    <header>
        <h2 class="text-center">Clasificar las Edades de 20 Personas</h2>
    </header>

    <main>
        <a href="../index.html">Regresar</a>
        <div>
            <h1 class="ejercicio-titulo">RESULTADO</h1>
            <div>
                <blockquote class="quote-box quote-left-border">
                   <p> MONTO A REPARTIR POR EL INFLUENCER: € <?php echo $_POST['monto'] ?>  </p>

                    <?php
                    $dineroRestante = $_POST['monto'];
                    do {
                        $edad = generarEdadAleatoria();
                        echo "<p> Edad: $edad </p>";                        
                        echo "<p> Dinero a Entregar: € " . calcularDineroAEntregar($edad) . " </p>";
                        $dineroRestante = obtenerMontoRestante($dineroRestante, $edad);
                        echo "<hr />";

                    } while ($edad <= $dineroRestante / 10);
                    echo "<hr /><p> Al influencer le quedo un dinero restante de: € $dineroRestante </p>";    
                    ?>
                </blockquote>

            </div>
        </div>
    </main>
</body>

</html>
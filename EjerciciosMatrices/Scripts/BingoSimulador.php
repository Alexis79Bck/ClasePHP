<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function generarMatriz(): array
    {
        $matriz = [];
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $matriz[$i][$j] = rand(1, 90);
            }
        }

        return $matriz;
    }

    function obtenerNumeroAleatorio(): int
    {
        return rand(1, 90);
    }

    function numeroAcertadoEnMatriz(int $numeroMatriz, int $numeroCantado): bool
    {
        return $numeroMatriz === $numeroCantado;
    }

    





    $matriz =  generarMatriz();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicios PHP </title>

    <link rel="stylesheet" href="../Estilos/bulma.css" />
    <link rel="stylesheet" href="../Estilos/custom.css" />
</head>

<body class="max-width">
    <header>
        <h2 class="text-center">Simulador de Bingo</h2>
    </header>

    <main class="container">
        <a class="button is-link has-text-primary-25 has-background-info-70" href="../index.html">Regresar</a>
        <div class="is-flex is-flex-direction-column">
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>Matriz 5 x 5</h2>
        </div>

        <div class="grid is-col-min-8">
            <?php
            $contarAciertos = 0;
            $cantado = obtenerNumeroAleatorio();
            do {
                foreach ($matriz as $fila) {
                    foreach ($fila as $numero) {
    
                        echo "<div class='cell'>";
                        if (numeroAcertadoEnMatriz($numero, $cantado)) {
                            echo "<div class='box has-background-success-80 has-text-black has-text-centered '>";
                            echo "<span class='is-size-4 is-family-monospace has-text-weight-bold'> $numero </span>";
                            echo "</div>";

                        } else {
                            echo "<div class='box has-text-black has-text-centered '>";
                            echo "<span class='is-size-4 is-family-monospace'> $numero </span>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                }
                
            } while ($contarAciertos <= $_POST['cantAciertos']);
            ?>
        </div>

    </main>
</body>

</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function generarMatriz(): array
    {
        $matriz = [];
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $matriz[$i][$j]['numero'] = rand(1, 90);
                $matriz[$i][$j]['fueAcertado'] = false;
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

    function ejecutar(array $matriz, int $cantidadAciertos): array
    {
        $aciertos = 0;
        $x = 0;
        
        do {
            $numerosCantados[$x] = obtenerNumeroAleatorio();

            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 5; $j++) {

                    if (numeroAcertadoEnMatriz($matriz[$i][$j]['numero'], $numerosCantados[$x]) ) {
                        $matriz[$i][$j]['fueAcertado'] = true; 
                        $aciertos++;                        
                    }

                    
                }
            }
            
            $x++;
        } while ($aciertos <= $cantidadAciertos);

        return [
            'numerosCantados' => $numerosCantados,
            'resultado' => $matriz
        ];
    }

    $matriz =  generarMatriz();

    $resultado = ejecutar($matriz, $_POST['cantAciertos']);
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
        
        <div class="mt-4 mb-4 is-flex is-flex-direction-column">
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>Números Cantados</h2>
        </div>
        <div class="grid is-col-min-3">
            <?php
            foreach ($resultado['numerosCantados'] as $numero) {
                echo "<div class='cell'>";
                echo "<div class='box has-background-link-80 has-text-light has-text-centered '>";
                echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'> $numero </span>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="mt-4 mb-4 is-flex is-flex-direction-column">
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>Matriz 5x5</h2>
        </div>
        <div class="grid is-col-min-8">
            <?php
          

            for ($i = 0; $i < 5; $i++) {
                for ($j = 0; $j < 5; $j++) {

                    if ($resultado['resultado'][$i][$j]['fueAcertado']) {
                        echo "<div class='cell'>";
                        echo "<div class='box has-background-warning-90  has-text-centered '>";
                        echo "<span class='has-background-danger-80 has-text-danger-10  is-size-5 is-family-monospace has-text-weight-bold'>";
                        echo $resultado['resultado'][$i][$j]['numero'];
                        echo "</span>";
                        echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<div class='cell'>";
                        echo "<div class='box has-background-warning-90 has-text-dark has-text-centered '>";
                        echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'>";
                        echo $resultado['resultado'][$i][$j]['numero'];
                        echo "</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            }

            // foreach ($resultado['resultado'] as $numero) { 
                // if ($numero['fueAcertado']) {
                //     echo "<div class='cell'>";
                //     echo "<div class='box has-text-dark has-text-centered '>";
                //     echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'>";
                //     echo $numero['numero'];
                //     echo "</span>";
                //     echo "</div>";
                //     echo "</div>";
                // }else{
                //     echo "<div class='cell'>";
                //     echo "<div class='box has-background-success-80 has-text-success-10 has-text-centered '>";
                //     echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'>";
                //     echo $numero['numero'];
                //     echo "</span>";
                //     echo "</div>";
                //     echo "</div>";
                // }
            // }
            ?>
        </div>
        <!-- 
                //     foreach ($fila as $numero) {
    
                //         echo "<div class='cell'>";
                //         if (numeroAcertadoEnMatriz($numero, $cantado)) {
                //             echo "<div class='box has-background-success-80 has-text-black has-text-centered '>";
                //             echo "<span class='is-size-4 is-family-monospace has-text-weight-bold'> $numero </span>";
                //             echo "</div>";

                //         } else {
                //             echo "<div class='box has-text-black has-text-centered '>";
                //             echo "<span class='is-size-4 is-family-monospace'> $numero </span>";
                //             echo "</div>";
                //         }
                //         echo "</div>";
                //     }
                // } -->



    </main>
</body>

</html>
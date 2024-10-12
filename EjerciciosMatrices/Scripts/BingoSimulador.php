<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function generarMatrizBingo(): array
    {
        $matriz = [];
        while (count($matriz) < 25) {
            $numero = obtenerNumeroAleatorio();
            if (! in_array($numero, $matriz)) {
                $matriz[] = $numero;
            }
        }
        
        return array_chunk($matriz, 5);
    }

    function generarMatrizMarcador(): array
    {
        $matriz = array_fill(0, 25, false);
        return array_chunk($matriz, 5);

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
        $numerosCantados = [];
        $aciertos = 0;
        $marcador = generarMatrizMarcador();

        while ($aciertos < $cantidadAciertos) {
            $numeroCantado = obtenerNumeroAleatorio();
            while (in_array( $numeroCantado, $numerosCantados)) {
                $numeroCantado = obtenerNumeroAleatorio();
            }

            $numerosCantados[] = $numeroCantado;

            foreach ($matriz as $f => $fila) {
                foreach ($fila as $c => $numero) {
                    if ($numero == $numeroCantado) {
                        $marcador[$f][$c] = true;
                        $aciertos++;
                        break 2;
                    }
                    
                }
            }
        }


        return [
            'numerosCantados' => $numerosCantados,
            'resultado' => $marcador
        ];
    }

    $matriz =  generarMatrizBingo();

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
        <?php 
        
     

        // foreach ($matriz as $f => $fila) {

        //     foreach ($fila as $c => $numero) {
        //         echo "<br />";
        //         echo "Matriz (Fila: $f / Columna: $c): / $numero";
        //         echo "<br />";
        //         echo "Resultado (Fila: $f / Columna: $c): / " . $resultado['resultado'][$f][$c];
        //         echo "<br /><hr />";
        //         // echo "<hr />$numero<br />";
        //         // echo $resultado[$f][$c] ?   "Numero $numero fue acertado.<br />" : "Numero $numero no fue acertado.<br />";
        //     }
        // }
        ?>
        <div class="grid is-col-min-8">
            <?php
                
            foreach ($matriz as $f => $fila) {
                foreach ($fila as $c => $numero) {

                    if ($resultado['resultado'][$f][$c]) {
                        echo "<div class='cell'>";
                        echo "<div class='box has-background-warning-90  has-text-centered '>";
                        echo "<span class='has-background-danger-80 has-text-danger-10  is-size-5 is-family-monospace has-text-weight-bold'>";
                        echo $numero;
                        echo "</span>";
                        echo "</div>";
                        echo "</div>";
                    }else{
                        echo "<div class='cell'>";
                        echo "<div class='box has-background-warning-90 has-text-dark has-text-centered '>";
                        echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'>";
                        echo $numero;
                        echo "</span>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            }


            ?>
        </div>

    </main>
</body>

</html>
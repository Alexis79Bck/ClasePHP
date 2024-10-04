<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function fillNumeros(int $cantidad = 20): array
    {
        for ($i = 0; $i < $cantidad; $i++) {
            $x[$i] = rand(-100, 100);
        }

        return $x;
    }

    function isNumeroPositivo(int $num): bool
    {
        return $num > 0 ? true : false;
    }

    function isNumeroNegativo(int $num): bool
    {
        return $num < 0 ? true : false;
    }

    function showResultados(string $mensaje, mixed $value): void
    {
        echo "<br />";
        echo $mensaje . ": " . $value;
        echo "<br />";
    }
    
    $hayError = false;
    if ($_POST['cantidad'] > 0) {
        $numeros = fillNumeros($_POST['cantidad']);
        $contarPositivos = 0;
        $contarNegativos = 0;
        $contarNeutros = 0;
        foreach ($numeros as $numero) {
            if (isNumeroPositivo($numero)) {
                $contarPositivos++;
            } elseif (isNumeroNegativo($numero)) {
                $contarNegativos++;
            } else {
                $contarNeutros++;
            }
        }
    } else {
        $mensajeError = "Debe Ingresar un Numero Mayor a 0.";
        $hayError = true;
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
        <h2 class="text-center">Contar los Números Positivos, Negativos y Neutros de un Arreglo</h2>
    </header>

    <main>
        <a href="../index.html">Regresar</a>
        <div>
            <h1 class="ejercicio-titulo">RESULTADO</h1>
            <div>
                <?php if (! $hayError) { ?>
                    <blockquote class="quote-box quote-left-border">
                        ARREGLO: <br />
                        <table>
                            <tr>
                                <?php
                                foreach ($numeros as $x) {
                                    echo "<td> [$x] </td>";
                                }

                                ?>

                            </tr>
                        </table>

                        <p>
                            <?php showResultados("Cantidad de Numeros Positivos es", $contarPositivos); ?>
                        </p>
                        <p>
                            <?php showResultados("Cantidad de Numeros Negativos es", $contarNegativos); ?>
                        </p>
                        <p>
                            <?php showResultados("Cantidad de Numero Neutro es", $contarNeutros); ?>
                        </p>
                    </blockquote>
                <?php } else { ?>
                    <blockquote class="quote-box quote-left-border">

                        <p>
                            <?php echo $mensajeError; ?>
                        </p>

                    </blockquote>
                <?php } ?>


            </div>
        </div>
    </main>
</body>

</html>
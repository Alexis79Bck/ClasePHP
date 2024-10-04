<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function clasificarEdades(array $edades): array
    {
        $menores = 0;
        $jovenes = 0;
        $adultos = 0;
        $viejos = 0;

        foreach ($edades as $edad) {
            switch ($edad) {
                case esMenor($edad):
                    $menores++;
                    break;
                case esJoven($edad):
                    $jovenes++;
                    break;
                case esAdulto($edad):
                    $adultos++;
                    break;
                case esViejo($edad):
                    $viejos++;
                    break;
            }
        }

        return [
            'menores' => $menores,
            'jovenes' => $jovenes,
            'adultos' => $adultos,
            'viejos' => $viejos,
        ];
    }

    function esMenor(int $edad): bool
    {
        return $edad > 0 && $edad <= 12;
    }

    function esJoven(int $edad): bool
    {
        return $edad > 12 && $edad <= 29;
    }

    function esAdulto(int $edad): bool
    {
        return $edad > 29 && $edad <= 59;
    }

    function esViejo(int $edad): bool
    {
        return $edad > 59;
    }

    function showResultados(string $clasificacion, int $total): void
    {
        echo "<br />";
        echo "El total de personas que son $clasificacion es $total";
        echo "<br />";
    }


    $resultados = clasificarEdades($_POST['edades']);
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
                    ARREGLO DE EDADES: <br />
                    <table>
                        <tr>
                            <?php
                            foreach ($_POST['edades'] as $edad) {
                                echo "<td> [$edad] </td>";
                            }
                            ?>
                        </tr>
                    </table>

                    <?php
                    foreach ($resultados as $tipo => $resultado) {
                        echo "<p>";
                        showResultados($tipo, $resultado);
                        echo  "</p>";
                    }
                    ?>
                </blockquote>

            </div>
        </div>
    </main>
</body>

</html>
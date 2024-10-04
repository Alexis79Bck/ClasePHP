<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function clasificarNotas(array $notas): array
    {
        $aprobados = 0;
        $reprobados = 0;
        

        foreach ($notas as $nota) {

            aprobado($nota) ? $aprobados++ : $reprobados++;

        }

        return [
            'aprobados' => ($aprobados * 100) / 20,
            'reprobados' => ($reprobados * 100) / 20
        ];
    }

    function aprobado(int $nota): bool
    {
        return $nota >= 70;
    }


    function showResultados(string $clasificacion, int $total): void
    {
        echo "<br />";
        echo "El porcentaje de alumnos $clasificacion es $total %";
        echo "<br />";
    }


    $resultados = clasificarNotas($_POST['notas']);
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
        <h2 class="text-center">Porcentaje de Aprobados y Reprobados de 20 Alumnos</h2>
    </header>

    <main>
        <a href="../index.html">Regresar</a>
        <div>
            <h1 class="ejercicio-titulo">RESULTADO</h1>
            <div>
                <blockquote class="quote-box quote-left-border">
                    ARREGLO DE NOTAS: <br />
                    <table>
                        <tr>
                            <?php
                            foreach ($_POST['notas'] as $nota) {
                                echo "<td> [$nota] </td>";
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
<?php
session_start();

const COLORES = ['AMARILLO', 'ROJO', 'NEGRO', 'AZUL', 'VERDE'];
const INTENTOS = 5;

if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 1;
} else {
    $_SESSION['intentos']++;
}

if (!isset($_SESSION['secuenciaCorrecta'])) {
    $_SESSION['secuenciaCorrecta'] = seleccionarColoresAleatorios();
}


function seleccionarColoresAleatorios(): array
{
    $coloresDisponibles = COLORES;
    shuffle($coloresDisponibles);
    return array_slice($coloresDisponibles, 0, 3);
}

function evaluarSecuencia(array $secuenciaUsuario, array $secuenciaCorrecta): array
{
    $aciertosPosicionCorrecta = 0;
    $aciertosPosicionIncorrecta = 0;

    $coloresUtilizados = array_fill_keys($secuenciaCorrecta, false);


    foreach ($secuenciaUsuario as $indice => $color) {
        if ($color === $secuenciaCorrecta[$indice]) {
            $aciertosPosicionCorrecta++;
            $coloresUtilizados[$color] = true;
        } elseif (in_array($color, $secuenciaCorrecta) && !$coloresUtilizados[$color]) {
            $aciertosPosicionIncorrecta++;
            $coloresUtilizados[$color] = true;
        }
    }

    return [
        'aciertosPosicionCorrecta' => $aciertosPosicionCorrecta,
        'aciertosPosicionIncorrecta' => $aciertosPosicionIncorrecta
    ];
}


if (isset($_GET['reiniciar']) && $_GET['reiniciar'] === '1') {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['colores'])) {
        $resultado = evaluarSecuencia($_POST['colores'], $_SESSION['secuenciaCorrecta']);
    }
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
        <h2 class="text-center">Adivina La Secuencia</h2>
    </header>

    <main class="container">
        <a class="button is-link has-text-primary-25 has-background-info-70" href="../index.html">Regresar</a>

        <div class="mt-4 mb-4 is-flex is-flex-direction-column">
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>Adivina la Secuencia de Colores</h2>
        </div>
        <div class="grid is-col-min-3">
            <?php
            foreach (COLORES as $color) {
                echo "<div class='cell'>";
                switch ($color) {
                    case 'AMARILLO':
                        echo "<div class='box has-background-warning-50 has-text-dark has-text-centered '>";
                        break;
                    case 'ROJO':
                        echo "<div class='box has-background-danger-50 has-text-light has-text-centered '>";
                        break;
                    case 'AZUL':
                        echo "<div class='box has-background-link-50 has-text-light has-text-centered '>";
                        break;
                    case 'VERDE':
                        echo "<div class='box has-background-success-50 has-text-dark has-text-centered '>";
                        break;
                    case 'NEGRO':
                        echo "<div class='box has-background-dark has-text-light has-text-centered '>";
                        break;
                }

                echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'> $color </span>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="mt-4 mb-4 is-flex is-flex-direction-column">
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>Escoja 3 colores</h2>
        </div>
        <div class="frame">
            <?php

            if (isset($_POST['colores'])) {


                echo "<h4 class='is-size-4 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>Intento Nro. ";
                echo $_SESSION['intentos'];
                echo "</h4>";
                echo "<div class='grid is-col-min-3'>";
                foreach ($_POST['colores'] as $color) {
                    echo "<div class='cell'>";
                    switch ($color) {
                        case 'AMARILLO':
                            echo "<div class='tag has-background-warning-50 has-text-dark has-text-centered '>";
                            break;
                        case 'ROJO':
                            echo "<div class='tag has-background-danger-50 has-text-light has-text-centered '>";
                            break;
                        case 'AZUL':
                            echo "<div class='tag has-background-link-50 has-text-light has-text-centered '>";
                            break;
                        case 'VERDE':
                            echo "<div class='tag has-background-success-50 has-text-dark has-text-centered '>";
                            break;
                        case 'NEGRO':
                            echo "<div class='tag has-background-dark has-text-light has-text-centered '>";
                            break;
                    }

                    echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'> $color </span>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";

                if ($resultado['aciertosPosicionCorrecta'] === count($_SESSION['secuenciaCorrecta'])) {
                    echo "<div class='message is-success'>";
                    echo "<div class='message-body '>";
                    echo "<p> ¡¡¡ FELICITACIONES !!! Pudo adivinar la Secuencia Correcta.</p>";
                    echo "</div>";
                    echo "</div>";
                } elseif ($_SESSION['intentos'] > INTENTOS) {
                    echo "<div class='message is-danger'>";
                    echo "<div class='message-body '>";
                    echo "<p> ¡¡¡ LO SIENTO !!! No pudo adivinar la Secuencia Correcta.</p>";
                    echo "<p> La Secuencia Correcta es:</p>";
                    echo "<div class='grid is-col-min-3'>";
                    foreach ($_SESSION['secuenciaCorrecta'] as $color) {
                        echo "<div class='cell'>";
                        switch ($color) {
                            case 'AMARILLO':
                                echo "<div class='tag has-background-warning-50 has-text-dark has-text-centered '>";
                                break;
                            case 'ROJO':
                                echo "<div class='tag has-background-danger-50 has-text-light has-text-centered '>";
                                break;
                            case 'AZUL':
                                echo "<div class='tag has-background-link-50 has-text-light has-text-centered '>";
                                break;
                            case 'VERDE':
                                echo "<div class='tag has-background-success-50 has-text-dark has-text-centered '>";
                                break;
                            case 'NEGRO':
                                echo "<div class='tag has-background-dark has-text-light has-text-centered '>";
                                break;
                        }

                        echo "<span class='is-size-5 is-family-monospace has-text-weight-bold'> $color </span>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<div class='message is-success'>";
                    echo "<div class='message-body '>";
                    echo "<p>Ha acertado ";
                    echo $resultado['aciertosPosicionCorrecta'];
                    echo " colores en la posición correcta</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='message is-warning'>";
                    echo "<div class='message-body '>";
                    echo "<p>Ha acertado ";
                    echo $resultado['aciertosPosicionIncorrecta'];
                    echo " colores en la posición incorrecta</p>";
                    echo "</div>";
                    echo "</div>";
                }
            }

            if (isset($resultado)) {
                if ($resultado['aciertosPosicionCorrecta'] === count($_SESSION['secuenciaCorrecta']) || $_SESSION['intentos'] > INTENTOS) {
                    echo "<div class='message'>";
                    echo "<div class='message-body '>";
                    echo "<p>Desea Jugar Otra Partida?</p>";
                    echo "<div class='grid is-col-min-3'>";
                    echo "<div class='cell'>";
        
                    echo "<a class='box is-medium is-primary' href='?reiniciar=1'>Si</a>";
                    
                    echo "</div>";
                    echo "<div class='cell'>";
                   
                    echo "<a class='box is-medium is-secondary' href='../index.html'>No</a>";
                   
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<form method='post'>";
                    echo "<div class='field formulario-contenedor has-text-centered'>";
                    echo "<div class='checkboxes'>";
                    foreach (COLORES as $color) {
                        echo "<label class='checkbox'>";
                        echo "<input type='checkbox' name='colores[]' value='$color' /> $color<br>";
                        echo "</label>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='field is-flex is-justify-content-center'>";
                    echo "<input class='button is-link is-light' id='evaluar' type='submit' value='Evaluar' />";
                    echo "</div>";
                    echo "</form>";
                }                
            }else {
                echo "<form method='post'>";
                echo "<div class='field formulario-contenedor has-text-centered'>";
                echo "<div class='checkboxes'>";
                foreach (COLORES as $color) {
                    echo "<label class='checkbox'>";
                    echo "<input type='checkbox' name='colores[]' value='$color' /> $color<br>";
                    echo "</label>";
                }
                echo "</div>";
                echo "</div>";
                echo "<div class='field is-flex is-justify-content-center'>";
                echo "<input class='button is-link is-light' id='evaluar' type='submit' value='Evaluar' />";
                echo "</div>";
                echo "</form>";
            }
            ?>

        </div>

    </main>
    <script>
        const botonEvaluar = document.getElementById('evaluar');
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');

        // Función para habilitar o deshabilitar el botón Evaluar
        function switchearBotonEvaluar() {
            const coloresSeleccionados = document.querySelectorAll('input[type="checkbox"]:checked');
            botonEvaluar.disabled = coloresSeleccionados.length !== 3;
        }

        // Función para habilitar o deshabilitar los checkboxes restantes
        function switchearCheckboxesNoSeleccionados() {
            const coloresSeleccionados = document.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(checkbox => {
                checkbox.disabled = coloresSeleccionados.length === 3 && !checkbox.checked;
            });
            switchearBotonEvaluar();
        }

        // Inicializar al cargar la página
        switchearBotonEvaluar();
        switchearCheckboxesNoSeleccionados();

        // Agregar un event listener a cada checkbox
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                switchearCheckboxesNoSeleccionados();
            });
        });
    </script>
</body>

</html>
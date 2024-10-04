<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function calcularSalarioSemanal(int $horas): float
    {
        if ($horas <= 40) {
            return $horas * $_POST['valorXHora'];
        }

        return $horas * obtenerValorXHoraExtra( $_POST['valorXHora']);
    }

    function obtenerValorXHoraExtra(int $valor): float
    {
        return $valor * 1.20;
    }

    function imprimirNombreYSalario(string $nombre, int $hora): void
    {
        echo "<p> Nombre: $nombre. Va a cobrar: " . calcularSalarioSemanal($hora) ." Bs.</p>";
        echo "<hr />" ;
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
        <h2 class="text-center">Cálculo de Salario Semanal</h2>
    </header>

    <main>
        <a href="../index.html">Regresar</a>
        <div>
            <h1 class="ejercicio-titulo">RESULTADO</h1>
            <div>
                <blockquote class="quote-box quote-left-border">
                <?php

                    foreach ($_POST['nombres'] as $indice => $nombre) {
                        imprimirNombreYSalario($nombre, $_POST['horas'][$indice]);
                    } 
                    

                ?>
                </blockquote>

            </div>
        </div>
    </main>
</body>

</html>
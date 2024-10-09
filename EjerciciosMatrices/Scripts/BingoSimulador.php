<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function generarMatriz(): array
    {
        $matriz =[];
        for ($i=0; $i < 5 ; $i++) { 
            for ($j=0; $j < 5 ; $j++) { 
                $matriz[$i][$j] = rand(1, 90);
            }
        }
        
        return $matriz;
    }

    function obtenerNumeroAleatorio(): int{
        return rand(1, 90);
    }

    function numeroAcertadoEnMatriz(int $numeroMatriz, int $numeroCantado): bool
    {
        return $numeroMatriz === $numeroCantado;
    }

    function marcadoNumeroAcertado(int $numeroMatriz): string  
    {
        return "X $numeroMatriz X";
    }

    function iniciarBingo(array $matriz)
    {
        do {
            $contarNumerosAleatorios = 0;
            $contarNumerosAcertados = 0;
    
            foreach ($matriz as $fila) {
                foreach ($fila as $numero) {
                    $cantado
                }
            }            
        } while ($contarNumerosAcertados <= $_POST['cantAciertos']);
    }

    function showResultados(string $clasificacion, int $total): void
    {
        echo "<br />";
        echo "El porcentaje de alumnos $clasificacion es $total %";
        echo "<br />";
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
    <header class="container">
        <h2 class="text-center">Simulador de Bingo</h2>
    </header>

    <main>
        <a href="../index.html">Regresar</a>
        <div class="container grid">
            <?php
                $matriz =  generarMatriz();
                $contadorAcierto = 0;
                $contarNumerosAleatorios = 0;

            ?>
            <div class="cell">

                <blockquote class="quote-box quote-left-border">
                   
                </blockquote>

            </div>
        </div>
    </main>
</body>

</html>
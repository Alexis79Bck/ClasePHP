<?php 

    $edades = array(2, 17, 45, 12, 34, 44, 56, 76, 78, 23, 45, 18, 20, 8);
    echo "<br /><br />";
    var_dump($edades);
    echo "<br /><br />";


    function encontrarMayorNúmero(array $numeros): int
    {
        $mayorNumero = $numeros[0];
        foreach ($numeros as $numero) {
            if ($numero > $mayorNumero) {
                $mayorNumero = $numero;                
            }
        }

        return $mayorNumero;
    }
    

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicios PHP | Clase 3</title>

    <link rel="stylesheet" href="estilos.css" />
  </head>

  <body>
    <header>
      <h2 class="text-center">Encontrar el Número Mayor de un Arreglo</h2>
    </header>
    
    <main>
      <a href="Entrada.html">Regresar</a>
      <div>
        <h1 class="ejercicio-titulo">RESULTADO</h1>
        <div >
          <blockquote class="quote-box quote-left-border">
            ARREGLO:  <br />
            <ul>
              <?php   
                foreach ($edades as $edad) {
                    echo "<li> $edad </li>";
                }
              
              ?>
              
            </ul>              
            <p>
                El número mayor del Arreglo es: <?php echo encontrarMayorNúmero($edades) ?>
            </p>
            <p>
                El número mayor del Arreglo es (usando max()): <?php echo max($edades) ?>
            </p>
            </blockquote>
          </p>
          
        </div>
      </div>
    </main>
  </body>
</html>
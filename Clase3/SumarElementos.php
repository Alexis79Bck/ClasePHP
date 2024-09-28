<?php 

    $elementos = array(12, 15, 18, 20, 5);
    echo "<br /><br />";
    var_dump($elementos);
    echo "<br /><br />";
    $suma = 0;
    
    foreach ($elementos as $x) {
        $suma += $x;
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
      <h2 class="text-center">Sumar los Elementos de un Arreglo</h2>
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
                foreach ($elementos as $x) {
                    echo "<li> $x </li>";
                }
              
              ?>
              
            </ul>              
            <p>
                La suma de los elementos es: <?php echo $suma ?>
            </p>
            <p>
                La suma de los elementos es (usando array_sum()): <?php echo array_sum($elementos) ?>
            </p>
            </blockquote>
          </p>
          
        </div>
      </div>
    </main>
  </body>
</html>
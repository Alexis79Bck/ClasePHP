<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];
    $mensaje = null;

    switch ($operacion) {
      case 'suma':
        $resultado = $num1 + $num2;
        $simbolo = "+";
        break;

      case 'resta':
        $resultado = $num1 - $num2;
        $simbolo = "-";
        break;
        
      case 'multiplica':
        $resultado = $num1 * $num2;
        $simbolo = "X";
        break;

      case 'divide':
        if ($num2 != 0) {
          $resultado = $num1 / $num2;          
        }else{
          $mensaje = "ERROR. División entre 0";
        }
        $simbolo = "/";
        break;
    }
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
      <h2 class="text-center">Calculadora Simple</h2>
    </header>
    
    <main>
      <a href="Entrada.html">Regresar</a>
      <div>
        <h1 class="ejercicio-titulo">RESULTADO</h1>
        <div >
          <blockquote class="quote-box quote-left-border">
            OPERACION: <?php echo strtoupper($operacion) ?> <br />
            <ul>
              <li>1er. NUMERO ---> <?php echo $num1 . " " . $simbolo ?> </li>
              <li>2do. NUMERO ---> <?php echo $num2  ?></li>
              <li>-----------</li>
              <?php if ($mensaje != null && $operacion == "divide") { ?>
                <li><?php echo $mensaje ?></li>
              <?php }else{ ?>
                <li><?php echo $resultado ?></li>
              <?php } ?>
              </ul>              
            </blockquote>
          </p>
          
        </div>
      </div>
    </main>
  </body>
</html>
<?php

    $rango1=0;
    $rango2=0;
    $rango3=0;

    echo "Números aleatorios <br />";
    for ($i=1; $i <=20 ; $i++) { 
        $numeroAleatorio = rand(1, 100);
        echo "* $numeroAleatorio <br />";
        if ($numeroAleatorio <= 20) {
            $rango1++;
        }elseif ($numeroAleatorio <= 70) {
            $rango2++;
        }else {
            $rango3++;
        }
    }

    echo "La cantidad  de números entre 1 y 20 fue: $rango1 <br />";
    echo "La cantidad  de números entre 21 y 70 fue: $rango2 <br />";
    echo "La cantidad  de números entre 71 y 100 fue: $rango3 <br />";
    echo "<br />";
    echo '<a href="../index.html#ejercicio1"> Regresar </a>';
    echo "<br />";
    echo "<br />";


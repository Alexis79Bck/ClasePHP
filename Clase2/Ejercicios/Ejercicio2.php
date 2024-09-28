<?php

echo "Calcular el peso promedio de 20 personas <br /><br />";

for ($i = 0; $i < 20; $i++) {
    $pesos[$i] = rand(42, 124);
    echo "Peso de la persona nro. $i ---> $pesos[$i] <br />"; 
}

$suma = 0;

foreach ($pesos as $peso) {
    $suma += $peso;
}
echo "<br />";
echo "El peso total de las 20 personas es $suma";
echo "<br />";
echo "El peso promedio de las 20 personas es " . $suma / 20;
echo "<br />";
echo '<a href="../index.html#ejercicio1"> Regresar </a>';
echo "<br />";

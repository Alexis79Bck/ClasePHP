<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['numero'];
    $i = 1;

    echo "La tabla de multiplicar de número $numero <br /><br />";
    while ($i <= 10) {
        echo "$numero x $i = " . $numero * $i;
        echo "<br /><br />";
        $i++;
    }


    echo "<br />";
    echo '<a href="../index.html#ejemplo1"> Regresar </a>';
    echo "<br />";
}

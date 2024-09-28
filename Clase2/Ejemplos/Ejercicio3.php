<?php
echo "<br />";
echo '<a href="../index.html#ejemplo3"> Regresar </a>';
echo "<br />";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['numero'];
    $i = 1;

    echo "La tabla de multiplicar de número $numero <br /><br />";
    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . $numero * $i;
        echo "<br /><br />";
    }

}

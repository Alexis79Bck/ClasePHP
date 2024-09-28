<?php
echo "<br />";
echo '<a href="../index.html#ejemplo2"> Regresar </a>';
echo "<br />";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['numero'];
    $i = 1;

    echo "La tabla de multiplicar de número $numero <br /><br />";
    do {
        echo "$numero x $i = " . $numero * $i;
        echo "<br /><br />";
        $i++;
    }while ($i <= 10); 


}
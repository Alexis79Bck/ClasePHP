<?php
session_start();


function filtrarPedido(array $pedidoCodigo): array
{
    foreach ($pedidoCodigo as $idx => $codigo) {
        $menuFiltrado[$idx] = obtenerComidaPorCodigo($codigo);
    }
    return $menuFiltrado;
}

function obtenerComidaPorCodigo(int $codigo): array
{
    foreach ($_SESSION['MENU'] as $comida) {
        if ($comida['codigo'] == $codigo) {
            return $comida;
        }
    }
};

function calcularTotal(array $pedidos): int|float
{
    
    $total = 0;
    foreach ($pedidos as $idx => $pedido) {
        $subtotal = $pedido['precio'] * $_POST['cantidad'][$idx];
        $total+=$subtotal;
    }

    return $total;
};

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
    <header>
        <h2 class="text-center">Venta de Comida Rápida</h2>
    </header>

    <main class="container">

        <a class="button is-link has-text-primary-25 has-background-info-70" href="../index.html">Regresar</a>
        
        <div class="mt-4 mb-4 is-flex is-flex-direction-column">
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>PEDIDO PROCESADO</h2>
        </div>
        
        <div class="content">
           
            <table class="table is-striped is-narrow is-fullwidth is-bordered shadow-large">
              <thead>
                <tr class='has-background-grey-light'>
                    
                    <th class="has-text-centered"><span class="title is-3" title="Nombre">Nombre</span></th>
                    <th class="has-text-centered"><span class="title is-3" title="Precio">Precio</span></th>
                    <th class="has-text-centered"><span class="title is-3" title="Precio">Cantidad</span></th>
                    <th class="has-text-centered"><span class="title is-3" title="Precio">Total</span></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    foreach (filtrarPedido($_POST['seleccion']) as $idx => $comida) {
                        echo "<tr >";
                        echo "<td>"; 
                        echo "<span class='subtitle is-4'>";
                        echo $comida['nombre'];
                        echo "</span>";
                        echo "<div class='block'>";
                        echo "<p>" . $comida['ingredientes'] . "</p>";
                        echo "</div>";                        
                        echo "</td>";
                        echo "<td class='title is-4 has-text-link has-text-centered'> $" . $comida['precio'] . "</td>";
                        echo "<td class='title is-4 has-text-link has-text-centered'>" . $_POST['cantidad'][$idx] . "</td>";
                        echo "<td class='title is-4 has-text-link has-text-centered'> $" . $comida['precio'] * $_POST['cantidad'][$idx] . "</td>";
                        
                        
                    }
                ?>
                <tr class='has-background-link-95'>
                    <td colspan="3" class="has-text-right"><span class="title is-3" title="Nombre">TOTAL</span></td>
                    <td class='title is-3 has-text-link has-text-centered is-underlined'>
                        <?php 
                           echo "$" . calcularTotal(filtrarPedido($_POST['seleccion']));
                        ?>
                    </td>
                </tr>
              </tbody>
            </table>
           
            
        </div>
    </main>

</body>

</html>
<?php

session_start();

const MENU_COMIDA = [
    [
        'codigo' => 1,
        'nombre' => 'Mini-Hamburguesa Clásica',
        'ingredientes' => 'Salsas, Carne, Vegetales, Queso',
        'precio' => 1
    ],
    [
        'codigo' => 2,
        'nombre' => 'Hamburguesa Clásica',
        'ingredientes' => 'Salsas, Carne, Vegetales, Jamon, Queso, Papas',
        'precio' => 2.4
    ],
    [
        'codigo' => 3,
        'nombre' => 'Hot Dog',
        'ingredientes' => 'Pan, Salchicha, Mostaza, Ketchup',
        'precio' => 1.5
    ],
    [
        'codigo' => 4,
        'nombre' => 'Papas Fritas',
        'ingredientes' => 'Papas, Aceite',
        'precio' => 1.2
    ],
    [
        'codigo' => 5,
        'nombre' => 'Nuggets de Pollo',
        'ingredientes' => 'Pollo, Empanizado',
        'precio' => 2.4
    ],
    [
        'codigo' => 6,
        'nombre' => 'Sandwich de Pollo',
        'ingredientes' => 'Pan, Pollo, Lechuga, Tomate, Mayonesa',
        'precio' => 3.5
    ],
    [
        'codigo' => 7,
        'nombre' => 'Taco',
        'ingredientes' => 'Tortilla, Carne, Lechuga, Tomate, Cebolla',
        'precio' => 2.3
    ],
    [
        'codigo' => 8,
        'nombre' => 'Enrrollado de Carne',
        'ingredientes' => 'Pan Arabe, Vegetales, Carne, Salsa',
        'precio' => 3
    ],
    [
        'codigo' => 9,
        'nombre' => 'Pizza Personal',
        'ingredientes' => 'Masa, Salsa, Queso, [ingredientes adicionales]',
        'precio' => 4
    ],
    [
        'codigo' => 10,
        'nombre' => 'Enrrollado de Mixto',
        'ingredientes' => 'Lechuga, Crutones, Pollo, Queso Parmesano',
        'precio' => 3.5
    ],
    [
        'codigo' => 11,
        'nombre' => 'Batido',
        'ingredientes' => 'Hielo, Leche, Sabor',
        'precio' => 2
    ],
    [
        'codigo' => 12,
        'nombre' => 'Aros de Cebolla',
        'ingredientes' => 'Cebolla, Empanizado',
        'precio' => 2.2
    ]

];

$_SESSION['MENU'] = MENU_COMIDA;

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
            <h2 class='is-size-3 has-text-primary has-text-centered is-family-primary has-text-weight-bold'>MENU</h2>
        </div>
        
        <div class="content">
            <form action="ProcesarPedido.php" method="post">
            <table class="table is-striped is-narrow is-fullwidth is-bordered shadow-large">
              <thead>
                <tr>
                    <th class="has-text-centered"></th>
                    <th class="has-text-centered"><span class="title is-3" title="Nombre">Nombre</span></th>
                    <th class="has-text-centered"><span class="title is-3" title="Precio">Precio</span></th>
                    <th class="has-text-centered"><span class="title is-3" title="Precio">Cantidad</span></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    foreach (MENU_COMIDA as $comida) {
                        echo "<tr class='has-background-dark-20 has-text-light-80'>";
                        echo "<td>"; 
                        echo "<label class='checkbox'>";
                        echo "<input type='checkbox' name='seleccion[]' value='". $comida['codigo'] ."'/>";                        
                        echo "</label>";
                        echo "</td>"; 
                        echo "<td>"; 
                        echo "<span class='subtitle is-4'>";
                        echo $comida['nombre'];
                        echo "</span>";
                        echo "<div class='block'>";
                        echo "<p>" . $comida['ingredientes'] . "</p>";
                        echo "</div>";                        
                        echo "</td>";
                        echo "<td class='title is-4 has-text-link has-text-centered'> $" . $comida['precio'] . "</td>";
                        echo "<td class='title is-4 has-text-link has-text-centered'>";
                        echo "<input class='input is-rounded is-primary' type='number' name='cantidad[]' min=0 max=100 step=1 value='0' disabled/>";
                        echo "</td>";
                        
                    }
                ?>
                
              </tbody>
              <tfoot>
              <tr>
                    <td class="has-text-centered" colspan="4">
                        <div class="field is-flex is-justify-content-center">
                            <input class="button is-link is-light" type="submit" value="Procesar Pedido" />
                        </div>
                    </td> 
                </tr>
              </tfoot>
            </table>
            </form>
            
        </div>
    </main>
    
    <script>
        // Función para habilitar o deshabilitar el input de cantidad según el estado del checkbox
        function toggleInput(checkbox) {
            const row = checkbox.closest('tr');
            const input = row.querySelector('input[type="number"]');
            input.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                input.value = 0;
            }
        }

        // Agregar un event listener a todos los checkboxes
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                toggleInput(checkbox);   

            });
        });
    </script>
</body>

</html>
<?php

// Exigir un parámetro GET
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Falta el parámetro de nombre');
}

// Si el usuario solicita cerrar sesión, volver a index.php
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

// Configurar los valores del juego...
// 0 = Piedra, 1 = Papel, 2 = Tijeras
$names = array('Piedra', 'Papel', 'Tijeras');
$human = isset($_POST["human"]) ? $_POST['human'] + 0 : -1;
$computer = rand(0, 2);

// Esta función recibe como entrada las jugadas del ordenador y del humano
// y devuelve "Empate", "Perdiste" o "Ganaste" según el resultado
function check($computer, $human)
{
    if ($human == 0 && $computer == 0 || $human == 1 && $computer == 1 || $human == 2 && $computer == 2) {
        return "Empate";
    } else if ($human == 0 && $computer == 2 || $human == 1 && $computer == 0 || $human == 2 && $computer == 1) {
        return "¡Ganaste!";
    } else if ($human == 0 && $computer == 1 || $human == 1 && $computer == 2 || $human == 2 && $computer == 0) {
        return "Perdiste";
    }
    return false;
}

// Comprobar el resultado de la jugada
$result = check($computer, $human);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Azahara - Juego de Piedra, Papel o Tijeras</title>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>
    <div class="container">
        <h1>Piedra, Papel o Tijeras</h1>
        <?php
        if (isset($_REQUEST['name'])) {
            echo "<p>Bienvenida/o: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
        ?>
        <form method="post">
            <select name="human">
                <option value="-1">Selecciona una opción</option>
                <option value="0">Piedra</option>
                <option value="1">Papel</option>
                <option value="2">Tijeras</option>
                <option value="3">Prueba</option>
            </select>
            <input type="submit" value="Jugar">
            <input type="submit" name="logout" value="Cerrar sesión">
        </form>

        <pre>
<?php
if ($human == -1) {
    print "Por favor, selecciona una estrategia y pulsa Jugar.\n";
} else if ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
            $r = check($c, $h);
            print "Humano=$names[$h] Computadora=$names[$c] Resultado=$r\n";
        }
    }
} else {
    print "Tu jugada=$names[$human] Jugada de la computadora=$names[$computer] Resultado=$result\n";
}
?>
<?php
// Mostrar imágenes solo si se hizo una jugada válida (0,1,2)
if ($human >= 0 && $human <= 2) {
    echo "<h3>Elecciones con imágenes:</h3>";
    // Imagen del jugador
    echo "<p>Tu elección:<br>";
    echo '<img src="' . $human . '.png" width="100">';
    echo "</p>";

    // Imagen de la computadora
    echo "<p>Elección de la computadora:<br>";
    echo '<img src="' . $computer . '.png" width="100">';
    echo "</p>";
}
?>
</pre>
    </div>
</body>

</html>
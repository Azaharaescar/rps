<?php
session_start();

// ==============================
// 1️⃣ Comprobar acceso
// ==============================
if (isset($_GET['name'])) {
    // Guardamos el nombre en sesión para futuras visitas
    $_SESSION['name'] = $_GET['name'];
}

if (!isset($_SESSION['name']) || strlen($_SESSION['name']) < 1) {
    die('Acceso no autorizado. Por favor, inicia sesión primero.');
}

// ==============================
// 2️⃣ Manejo de cierre de sesión
// ==============================
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    return;
}

// ==============================
// 3️⃣ Configuración del juego
// ==============================
$names = array('Piedra', 'Papel', 'Tijeras');
$human = isset($_POST['human']) ? $_POST['human'] + 0 : -1;
$computer = rand(0, 2);

// Función que determina el resultado
function check($computer, $human)
{
    if ($human == $computer) return "Empate";
    if (($human == 0 && $computer == 2) ||
        ($human == 1 && $computer == 0) ||
        ($human == 2 && $computer == 1)
    ) {
        return "¡Ganaste!";
    }
    return "Perdiste";
}

// Resultado de la partida
$result = ($human >= 0 && $human <= 2) ? check($computer, $human) : false;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>e2285ac3</title>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>
    <div class="container">
        <h1>Piedra, Papel o Tijeras</h1>

        <p>Bienvenida/o: <?= htmlentities($_SESSION['name']) ?></p>

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
} elseif ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
            $r = check($c, $h);
            print "Humano=$names[$h] Computadora=$names[$c] Resultado=$r\n";
        }
    }
} else {
    print "Tu jugada=$names[$human] Jugada de la computadora=$names[$computer] Resultado=$result\n";
}

// Mostrar imágenes solo si jugada válida (0,1,2)
if ($human >= 0 && $human <= 2) {
    echo "\n<h3>Elecciones con imágenes:</h3>";

    echo "<p>Tu elección:<br>";
    echo '<img src="' . $human . '.png" width="100">';
    echo "</p>";

    echo "<p>Elección de la computadora:<br>";
    echo '<img src="' . $computer . '.png" width="100">';
    echo "</p>";
}
?>
    </pre>
    </div>
</body>

</html>

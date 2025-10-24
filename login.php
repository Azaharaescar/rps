<?php // No pongas HTML por encima de este bloque

// Si el usuario pulsa "Cancelar", volvemos al índice (o podrías poner otra ruta si quieres)
if (isset($_POST['cancel'])) {
    header("Location: index.php");
    return;
}

// Valor fijo de seguridad (salt) y hash guardado
$salt = 'XyZzy12*_';
$stored_hash = 'a8609e8d62c043243c4e201cbb342862';  // La contraseña es meow123

$failure = false;  // Valor por defecto si no hay datos enviados

// Comprobamos si se enviaron los datos del formulario
if (isset($_POST['who']) && isset($_POST['pass'])) {
    if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1) {
        $failure = "El nombre de usuario y la contraseña son obligatorios.";
    } else {
        // Comprobamos el hash de la contraseña ingresada
        $check = hash('md5', $salt . $_POST['pass']);
        if ($check == $stored_hash) {
            // Si es correcto, redirigimos al juego con el nombre del usuario
            header("Location: game.php?name=" . urlencode($_POST['who']));
            return;
        } else {
            $failure = "Contraseña incorrecta.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "bootstrap.php"; ?>
    <meta charset="UTF-8">
    <title>Azahara Escribano Carvajal - Iniciar sesión</title>
</head>

<body>
    <div class="container">
        <h1>Por favor, inicia sesión</h1>

        <?php
        // Mostramos los mensajes de error si los hay
        if ($failure !== false) {
            echo ('<p style="color: red;">' . htmlentities($failure) . "</p>\n");
        }
        ?>

        <form method="POST">
            <label for="nam">Nombre de usuario:</label>
            <input type="text" name="who" id="nam"><br />

            <label for="id_1723">Contraseña:</label>
            <input type="text" name="pass" id="id_1723"><br />

            <input type="submit" value="Iniciar sesión">
            <input type="submit" name="cancel" value="Cancelar">
        </form>

        <p>
            Si olvidaste la contraseña, mira el código fuente de esta página.
            <!-- Pista: la contraseña es el sonido que hace un gato (todo en minúsculas) seguido de 123. -->
        </p>
    </div>
</body>

</html>
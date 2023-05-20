<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $register_username = $_POST['register_username'];
    $register_password = $_POST['register_password'];

    // Verificar si el nombre de usuario ya existe en la tabla 'entrenadores'
    $query = "SELECT COUNT(*) as count FROM entrenadores WHERE nombre = :username";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $register_username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        // El nombre de usuario ya existe
        $register_error = "El nombre de usuario ya está en uso";
        header("Location: validacion.php?register_error=" . urlencode($register_error));
        exit;
    } else {
        // Insertar los datos en la tabla 'entrenadores'
        $hashed_password = password_hash($register_password, PASSWORD_DEFAULT);

        $query = "INSERT INTO entrenadores (nombre, password) VALUES (:username, :password)";
        $statement = $conn->prepare($query);
        $statement->bindParam(':username', $register_username);
        $statement->bindParam(':password', $hashed_password);

        if ($statement->execute()) {
            // Registro exitoso
            $register_message = "Registro exitoso";
            header("Location: validacion.php?register_message=" . urlencode($register_message));
            exit;
        } else {
            // Error al registrar
            $register_error = "Error al registrar";
            header("Location: validacion.php?register_error=" . urlencode($register_error));
            exit;
        }
    }
}
?>

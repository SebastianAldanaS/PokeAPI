<?php
session_start();

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    // Verificar las credenciales del usuario en la tabla 'entrenadores'
    $query = "SELECT nombre, password FROM entrenadores WHERE nombre = :username";
    $statement = $conn->prepare($query);
    $statement->bindParam(':username', $login_username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Verificar la contraseña utilizando password_verify
        $stored_password = $result['password'];

        if (password_verify($login_password, $stored_password)) {
            // Credenciales válidas, el usuario ha iniciado sesión correctamente
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $login_username;
            header("Location: index.php");
            exit;
        } else {
            // Credenciales inválidas
            echo "Credenciales inválidas. Contraseña incorrecta.";
        }
    } else {
        // Credenciales inválidas
        echo "Credenciales inválidas. Usuario no encontrado.";
    }
}
?>

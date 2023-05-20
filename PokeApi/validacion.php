<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de usuario</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 32px;
            color: #333333;
            text-align: center;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 250px;
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #cccccc;
        }

        input[type="submit"] {
            background-color: #ffcb05;
            color: #333333;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ffde4f;
        }

        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .form-container > div {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container > div:first-child {
            margin-right: 20px;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Inicia sesión o Registrate</h1>
    <div class="form-container">
        <div>
            <h2>Iniciar sesión</h2>
            <form action="login.php" method="POST">
                <label for="login_username">Nombre de usuario:</label>
                <input type="text" id="login_username" name="login_username" required><br><br>
                <label for="login_password">Contraseña:</label>
                <input type="password" id="login_password" name="login_password" required><br><br>
                <input type="submit" value="Iniciar sesión">
            </form>
            <?php if (isset($_GET['login_error'])): ?>
                <p class="message error-message"><?php echo $_GET['login_error']; ?></p>
            <?php endif; ?>
        </div>
        <div>
            <h2>Registrarse</h2>
            <form action="register.php" method="POST">
                <label for="register_username">Nombre de usuario:</label>
                <input type="text" id="register_username" name="register_username" required><br><br>
                <label for="register_password">Contraseña:</label>
                <input type="password" id="register_password" name="register_password" required><br><br>
                <input type="submit" value="Registrarse">
            </form>
            <?php if (isset($_GET['register_message'])): ?>
                <p class="message success-message"><?php echo $_GET['register_message']; ?></p>
            <?php endif; ?>
            <?php if (isset($_GET['register_error'])): ?>
                <p class="message error-message"><?php echo $_GET['register_error']; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

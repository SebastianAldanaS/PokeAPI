<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirigir a validacion.php si no ha iniciado sesión
    header("Location: validacion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pokémon</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Detalles del Pokémon</h1>
    <div>
    <div class="pokedatos">
    <?php
    //Validar la informacion del pokemon con la API y guardarla
    if (isset($_GET['name'])) {
        $pokemonName = $_GET['name'];
        $url = 'https://pokeapi.co/api/v2/pokemon/' . $pokemonName;
        $data = file_get_contents($url);
        $pokemonData = json_decode($data, true);

        //Mostrar la informacion deseada si el pokemon se encontro
        if ($pokemonData) {
            echo '<h2>' . ucfirst($pokemonName) . '</h2>';
            echo '<img src="' . $pokemonData['sprites']['front_default'] . '" alt="' . ucfirst($pokemonName) . '">';
            echo '<h3>Habilidades:</h3>';
            echo '<ul>';
            foreach ($pokemonData['abilities'] as $ability) {
                echo '<li>' . ucfirst($ability['ability']['name']) . '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No se pudieron obtener los detalles del Pokémon.';
        }
    } else {
        echo 'No se proporcionó un nombre de Pokémon válido.';
    }
    ?>
    </div>
     <a class="btn" href="index.php">Volver a la pokedex</a>
    </div>

    
    
</body>
</html>

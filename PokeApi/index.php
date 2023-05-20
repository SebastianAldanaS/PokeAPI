<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon API</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Nombres de Pokémon</h1>
    <?php
    session_start();

    // Verificar si la sesión está activa
    $sessionStatus = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;

    // Mostrar el encabezado según el estado de la sesión
    if ($sessionStatus) {
        echo '<p class="session-info">Sesión iniciada como: ' . $_SESSION['username'] . '</p>';
        echo '<a href="logout.php">Cerrar sesión</a>';
    } else {
        echo '<p class="session-info">Sesión no iniciada</p>';
        echo '<a href="validacion.php">Iniciar sesión</a>';
    }

    //Cargar API y mostrar su contenido
    $url = 'https://pokeapi.co/api/v2/pokemon/';
    $data = file_get_contents($url);
    $pokemonList = json_decode($data, true);

    if ($pokemonList && isset($pokemonList['results'])) {
        echo '<ul class="pokemon-list">';
        foreach ($pokemonList['results'] as $pokemon) {
            echo '<li class="pokemon-list-item"><a href="pokemon.php?name=' . $pokemon['name'] . '">' . $pokemon['name'] . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo 'No se pudo obtener la lista de Pokémon.';
    }

    
    ?>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $instructions = htmlspecialchars($_POST['instructions']);

    $recipes = [];
    if (file_exists('recipes.json')) {
        $recipes = json_decode(file_get_contents('recipes.json'), true);
    }

    $recipes[] = [
        'title' => $title,
        'ingredients' => $ingredients,
        'instructions' => $instructions
    ];

    file_put_contents('recipes.json', json_encode($recipes));

    header('Location: index.html');
    exit();
}
?>

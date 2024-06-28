<?php
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $ingredients = trim($_POST['ingredients']);
    $instructions = trim($_POST['instructions']);

    // Validierung
    if (empty($title) || empty($ingredients) || empty($instructions)) {
        $error = 'Bitte füllen Sie alle Felder aus.';
    } elseif (strlen($title) < 3 || strlen($ingredients) < 10 || strlen($instructions) < 10) {
        $error = 'Titel muss mindestens 3 Zeichen, Zutaten und Anleitungen mindestens 10 Zeichen lang sein.';
    } else {
        $title = htmlspecialchars($title);
        $ingredients = htmlspecialchars($ingredients);
        $instructions = htmlspecialchars($instructions);

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
}
?>

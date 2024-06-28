<?php
if (file_exists('recipes.json')) {
    $recipes = json_decode(file_get_contents('recipes.json'), true);

    if (!empty($recipes)) {
        foreach ($recipes as $recipe) {
            echo "<div class='recipe'>";
            echo "<h3>" . htmlspecialchars($recipe['title']) . "</h3>";
            echo "<p><strong>Zutaten:</strong><br>" . nl2br(htmlspecialchars($recipe['ingredients'])) . "</p>";
            echo "<p><strong>Anleitung:</strong><br>" . nl2br(htmlspecialchars($recipe['instructions'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Keine Rezepte vorhanden.</p>";
    }
} else {
    echo "<p>Keine Rezepte vorhanden.</p>";
}
?>

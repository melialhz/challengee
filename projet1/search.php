<?php

if (isset($_GET['query'])) {
    $query = $_GET['query'];

    $url = 'https://api-adresse.data.gouv.fr/search/?q=' . urlencode($query) . '&limit=10';

    $response = file_get_contents($url);

    if ($response === false) {
        echo "<p>Erreur ! </p>";
    } else {
        $results = json_decode($response, true);

        if (isset($results['features']) && count($results['features']) > 0) {
            echo "<h2> Suggestions pour votre recherche : </h2>";
            echo "<ul>";

            foreach ($results['features'] as $feature) {
                $address = htmlspecialchars($feature['properties']['label']);
                echo "<li>$address</li>";
            }

            echo "</ul>";
        } else {
            echo "<p>Aucun résultat trouvé pour </p>";
        }
    }
} else {
    echo "<p>Veuillez entrer une addresse de recherche.</p>";
}
?>

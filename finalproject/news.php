<?php

function displayNews() {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://google-api31.p.rapidapi.com/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'text' => 'Europe',
            'region' => 'wt-wt',
            'max_results' => 25
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-rapidapi-host: google-api31.p.rapidapi.com",
            "x-rapidapi-key: YOUR-API-KEY-HERE"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo "cURL Error: " . $err;
    } else {
        $data = json_decode($response, true);
        if (isset($data['articles']) && !empty($data['articles'])) {
            foreach ($data['articles'] as $article) {
                echo "<div class='news-item'>";
                echo "<h3><a href='" . htmlspecialchars($article['url']) . "' target='_blank'>" . htmlspecialchars($article['title']) . "</a></h3>";
                echo "<p>" . htmlspecialchars($article['description']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No news results found.</p>";
        }
    }
}
?>

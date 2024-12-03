<?php

function displayStreaming() {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://streaming-availability.p.rapidapi.com/shows/search/title?country=ph&title=transformer&series_granularity=show&show_type=movie&output_language=en",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: streaming-availability.p.rapidapi.com",
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
        if (isset($data['results']) && !empty($data['results'])) {
            foreach ($data['results'] as $stream) {
                $poster = isset($stream['poster']) ? $stream['poster'] : 'default.jpg';
                $title = isset($stream['title']) ? $stream['title'] : 'Untitled Movie';
                $url = isset($stream['url']) ? $stream['url'] : '#';
                echo "<div class='card'>";
                echo "<img src='" . htmlspecialchars($poster) . "' alt='" . htmlspecialchars($title) . "' class='poster'>";
                echo "<div class='title'>" . htmlspecialchars($title) . "</div>";
                echo "<div class='video-details'><a href='" . htmlspecialchars($url) . "' target='_blank'>Watch Now</a></div>";
                echo "</div>";
            }
        } else {
            echo "<p>No streaming results found.</p>";
        }
    }
}
?>

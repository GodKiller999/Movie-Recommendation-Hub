<?php
function streams($id) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://imdb146.p.rapidapi.com/v1/video/?id=" . urlencode($id),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: imdb146.p.rapidapi.com",
            "x-rapidapi-key: 0dd74fa136msh450480d2d1a9982p1e7f98jsnc8cf9f5c7f1e"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #: " . $err;
    } else {
        return json_decode($response, true); // Return as an associative array
    }
}

// Fetch video data
$videoId = "vi2557478681"; // Example video ID
$data = streams($videoId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Streams</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="container">
        <h1>Video Streams</h1>
        <?php
        if (is_array($data)) {
            // Extract title
            $title = isset($data['primaryTitle']['titleText']['text']) ? $data['primaryTitle']['titleText']['text'] : 'Title not available';

            // Extract playback URLs
            $playbackUrls = isset($data['playbackURLs']) ? $data['playbackURLs'] : [];

            // Extract description
            $description = isset($data['description']['value']) ? $data['description']['value'] : 'Description not available';

            // Extract thumbnail
            $thumbnail = isset($data['primaryTitle']['primaryImage']['url']) ? $data['primaryTitle']['primaryImage']['url'] : null;

            echo "<div class='video-details'>";
            echo "<h2>" . htmlspecialchars($title) . "</h2>";
            if ($thumbnail) {
                echo "<img src='" . htmlspecialchars($thumbnail) . "' alt='Thumbnail' class='thumbnail'>";
            }
            echo "<p>" . htmlspecialchars($description) . "</p>";

            if (!empty($playbackUrls)) {
                echo "<h3>Available Streams:</h3>";
                echo "<div class='grid'>";
                
                // Create an array to keep track of unique resolutions
                $uniqueResolutions = [];

                foreach ($playbackUrls as $stream) {
                    $quality = isset($stream['displayName']['value']) ? $stream['displayName']['value'] : 'Unknown Quality';
                    $streamUrl = isset($stream['url']) ? $stream['url'] : '#';
                    
                    // Check if the quality is already in the array, if not, add it
                    if (!in_array($quality, $uniqueResolutions)) {
                        $uniqueResolutions[] = $quality;
                        echo "<div class='card'>";
                        echo "<img src='" . htmlspecialchars($thumbnail) . "' alt='Stream Thumbnail' class='poster'>";
                        echo "<p class='title'><a href='" . htmlspecialchars($streamUrl) . "' target='_blank'>$quality</a></p>";
                        echo "</div>";
                    }
                }
                echo "</div>";
            } else {
                echo "<p>No streams available.</p>";
            }

            echo "</div>";
        } else {
            echo "<p class='error'>" . htmlspecialchars($data) . "</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
// Include the necessary PHP files to fetch data
include('movihub.php');
include('news.php');
include('videostream.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>MovieHub</h1>

        <!-- Movie Search Section -->
        <section>
            <h2>Movie Search</h2>
            <div class="movie-list">
                <?php displayMovies(); ?>
            </div>
        </section>

        <!-- Entertainment News Section -->
        <section>
            <h2>Entertainment News</h2>
            <div class="news-list">
                <?php displayNews(); ?>
            </div>
        </section>

        <!-- Video Streaming Section -->
        <section>
            <h2>Streaming Availability</h2>
            <div class="streaming-list">
                <?php displayStreaming(); ?>
            </div>
        </section>
    </div>
</body>
</html>

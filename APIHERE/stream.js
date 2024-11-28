// Array of genres
const genres = [
    { "id": "action", "name": "Action" },
    { "id": "adventure", "name": "Adventure" },
    { "id": "animation", "name": "Animation" },
    { "id": "comedy", "name": "Comedy" },
    { "id": "crime", "name": "Crime" },
    { "id": "documentary", "name": "Documentary" },
    { "id": "drama", "name": "Drama" },
    { "id": "family", "name": "Family" },
    { "id": "fantasy", "name": "Fantasy" },
    { "id": "history", "name": "History" },
    { "id": "horror", "name": "Horror" },
    { "id": "music", "name": "Music" },
    { "id": "mystery", "name": "Mystery" },
    { "id": "news", "name": "News" },
    { "id": "reality", "name": "Reality" },
    { "id": "romance", "name": "Romance" },
    { "id": "scifi", "name": "Science Fiction" },
    { "id": "talk", "name": "Talk Show" },
    { "id": "thriller", "name": "Thriller" },
    { "id": "war", "name": "War" },
    { "id": "western", "name": "Western" }
];

// Populate dropdown with genres
const genreDropdown = document.getElementById('genreDropdown');
genres.forEach(genre => {
    const option = document.createElement('option');
    option.value = genre.id; // Use genre ID as the value
    option.textContent = genre.name; // Display genre name
    genreDropdown.appendChild(option);
});

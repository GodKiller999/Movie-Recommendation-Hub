const genreDropdown = document.getElementById('genreDropdown');
genres.forEach(genre => {
    const option = document.createElement('option');
    option.value = genre.id; // Use the genre ID for API requests
    option.textContent = genre.name; // Display the genre name
    genreDropdown.appendChild(option);
});

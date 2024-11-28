genreDropdown.addEventListener('change', () => {
    const selectedGenre = genreDropdown.value;
    if (selectedGenre) {
        // Example API request (replace with your API endpoint)
        fetch(`https://example.com/movies?genre=${selectedGenre}&apikey=YOUR_API_KEY`)
            .then(response => response.json())
            .then(data => {
                console.log(data); // Handle the response
            });
    }
});

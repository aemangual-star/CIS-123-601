<?php
// 1. RECEIVE THE QUERY
$show_query = urlencode($_GET['query']); // Get and clean the show name from the HTML form

// 2. DEFINE API DETAILS (You need to get a real API key from a service like TMDB)
$api_key = "YOUR_API_KEY_HERE"; 
$api_url_base = "https://api.themoviedb.org/3/search/tv"; 

// 3. CONSTRUCT THE API REQUEST URL
// This URL will search the database for the show's title.
$search_url = "{$api_url_base}?api_key={$api_key}&query={$show_query}";

// 4. EXECUTE THE API REQUEST (cURL is a common way to do this)
$response = file_get_contents($search_url);
$data = json_decode($response, true); // Decode the JSON response into a PHP array

// --- Step 4.a: Get the TV Show ID ---
// Find the ID of the correct show from the search results (usually the first one)
if (isset($data['results'][0]['id'])) {
    $tv_id = $data['results'][0]['id'];
    
    // 5. GET THE CAST LIST (Send a SECOND API request using the show ID)
    $cast_url = "https://api.themoviedb.org/3/tv/{$tv_id}/credits?api_key={$api_key}";
    $cast_response = file_get_contents($cast_url);
    $cast_data = json_decode($cast_response, true);
    
    // 6. PROCESS AND DISPLAY (Generate the final HTML for the user)
    echo "<h2>Cast for: " . $data['results'][0]['name'] . "</h2>";
    echo "<div id='cast-list'>";
    
    // Loop through the cast and display their name and role
    foreach ($cast_data['cast'] as $actor) {
        echo "<p><strong>" . htmlspecialchars($actor['name']) . "</strong> as " . htmlspecialchars($actor['character']) . "</p>";
    }
    
    echo "</div>";

} else {
    // Part of the error handling in search.php
    // This is the friendly message displayed if the show is not found
    echo "<h2>Search Results</h2>";
    echo "<p>Sorry, no cast information could be found for that TV show. Please check the spelling and try again.</p>";
}


?>
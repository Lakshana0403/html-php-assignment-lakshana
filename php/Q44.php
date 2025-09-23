44. Develop a music playlist management system for a streaming service. The system should allow users to
create, modify, and organize playlists. How would you use arrays and array functions to store and
manipulate the song data and playlist information efficiently?

<?php
// Create songs
$song1 = ["id"=>1, "title"=>"Shape of You", "artist"=>"Ed Sheeran", "duration"=>"4:24"];
$song2 = ["id"=>2, "title"=>"Blinding Lights", "artist"=>"The Weeknd", "duration"=>"3:20"];
$song3 = ["id"=>3, "title"=>"Levitating", "artist"=>"Dua Lipa", "duration"=>"3:40"];

// Playlists array
$playlists = [
    "My Favorites" => [$song1, $song2],
    "Workout Mix" => [$song3]
];

// Function to display playlist
function displayPlaylist($name, $playlist) {
    echo "🎵 Playlist: $name\n";
    foreach ($playlist as $song) {
        echo "- {$song['title']} by {$song['artist']} ({$song['duration']})\n";
    }
    echo "\n";
}

// Add a song to a playlist
function addSong(&$playlists, $playlistName, $song) {
    $playlists[$playlistName][] = $song;  // array_push alternative
}

// Remove a song by ID
function removeSong(&$playlists, $playlistName, $songId) {
    $playlists[$playlistName] = array_filter($playlists[$playlistName], function($song) use ($songId) {
        return $song['id'] !== $songId;
    });
}

// Sort playlist by song title
function sortPlaylist(&$playlists, $playlistName) {
    usort($playlists[$playlistName], function($a, $b) {
        return strcmp($a['title'], $b['title']);
    });
}

// ---- Test the system ----

// Display initial
displayPlaylist("My Favorites", $playlists["My Favorites"]);

// Add a song
addSong($playlists, "My Favorites", $song3);
displayPlaylist("My Favorites", $playlists["My Favorites"]);

// Remove a song
removeSong($playlists, "My Favorites", 1);
displayPlaylist("My Favorites", $playlists["My Favorites"]);

// Sort playlist
sortPlaylist($playlists, "My Favorites");
displayPlaylist("My Favorites", $playlists["My Favorites"]);
?>


Output:

🎵 Playlist: My Favorites - Shape of You by Ed Sheeran (4:24) - Blinding Lights by The Weeknd (3:20) 🎵 Playlist: My Favorites - Shape of You by Ed Sheeran (4:24) - Blinding Lights by The Weeknd (3:20) - Levitating by Dua Lipa (3:40) 🎵 Playlist: My Favorites - Blinding Lights by The Weeknd (3:20) - Levitating by Dua Lipa (3:40) 🎵 Playlist: My Favorites - Blinding Lights by The Weeknd (3:20) - Levitating by Dua Lipa (3:40)

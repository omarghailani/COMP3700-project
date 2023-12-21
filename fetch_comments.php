<?php
// Perform the database connection
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch comments from the "comments" table
$sql = "SELECT name, comment FROM comments";
$result = $conn->query($sql);

$comments = [];

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $comments[] = [
            'name' => $row['name'],
            'comment' => $row['comment']
        ];
    }
}

// Close the database connection
$conn->close();

// Return comments as JSON
header('Content-Type: application/json');
echo json_encode($comments);
?>
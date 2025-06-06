<?php
// Database configuration
$host = 'localhost';      // Database host
$user = 'root';   // Database username
$pass = '';   // Database password
$db   = 'formdata';   // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $event_name = isset($_POST['eventName']) ? trim($_POST['eventName']) : '';
    $event_date = isset($_POST['eventDate']) ? trim($_POST['eventDate']) : '';

    // Simple validation
    if (!empty($event_name) && !empty($event_date)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO sheduler (name, date) VALUES (?, ?)");
        $stmt->bind_param("ss", $event_name, $event_date);

        if ($stmt->execute()) {
            echo "Event added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in all fields.";
    }
}
?>
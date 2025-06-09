<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get event date and action
$date = $_POST['date'] ?? '';
$action = $_POST['action'] ?? '';

if (!empty($date) && in_array($action, ['accept', 'reject'])) {
    $status = ($action === 'accept') ? 'accepted' : 'rejected';

    $stmt = $conn->prepare("UPDATE myform SET stati = ? WHERE date = ?");
    $stmt->bind_param("ss", $status, $date);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Status updated to '$status' for event date $date.";
        } else {
            echo "No event found on $date.";
        }
    } else {
        echo "Error executing update.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input values
    $name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
    $contact = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

    // Insert into database
    $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$contact', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Contact information submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
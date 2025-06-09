<?php
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

$sql = "SELECT name, date FROM sheduler";
$result = $conn->query($sql);

$events = [];
if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #0044cc;
            color: white;
            text-align: center;
            padding: 1rem;
        }
        section {
            padding: 2rem;
        }
        .event {
            background: radial-gradient(circle, rgba(246, 28, 28, 0.7) 0%, rgba(9, 9, 9, 0.7) 100%);
            margin: 1rem auto;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
            max-width: 600px;
            text-align: left;
        }
        .event h3 {
            color: #0044cc;
        }
    </style>
    <link rel="stylesheet" href="sd.css">
</head>
<body>
    <header>
        <h1>Upcoming Events</h1>
        
    </header>
    <nav>
            <a href="index.html">Home</a>
            <a href="event.php">Events</a>
            <a href="service.html">Services</a>
            <a href="contact.html">Contact</a>
        </nav>
    <section>
        <div class="event">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="event-details">
                        <?php foreach ($event as $field => $value): ?>
                            <p><strong><?php echo htmlspecialchars(ucfirst($field)); ?>:</strong> <?php echo htmlspecialchars($value); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
        
            
        
    </section>
    <footer style="position: absolute; bottom: 0; width: 100%;">
        <p>&copy; 2025 Eventify. All rights reserved.</p>
    </footer>
</body>
</html>

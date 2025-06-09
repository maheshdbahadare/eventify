<?php
// Database connection settings
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'formdata';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from myform table
$sql = "SELECT stati, date, evtype, guests FROM myform";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="sd.css">
    <title>Status List</title>
    <link rel="stylesheet" href="sd.css">
    <style>
        
        table { border-collapse: collapse; width: 80%; margin: 40px auto; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: center; }
        th { background: #007bff; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        h2 { text-align: center; margin-top: 30px; }
    </style>
    
</head>
<body>
    <h2 style="color:white;">Status Details</h2>
     <nav>
            <a href="index.html">Home</a>
            <a href="pages/event.php">Events</a>
            <a href="pages/service.html">Services</a>
            <a href="pages/contact.html">Contact</a>
            
        </nav>
    
    <table>
        <tr>
            <th>Status</th>
            <th>Date</th>
            <th>Event Type</th>
            <th>Guest Numbers</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['stati']); ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td><?php echo htmlspecialchars($row['evtype']); ?></td>
                    <td><?php echo htmlspecialchars($row['guests']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No records found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>
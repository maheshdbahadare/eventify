<?php
include 'config.php';
$queryDetails = "SELECT evtype, date, venue, guests FROM myform";
$resultDetails = $conn->query($queryDetails);
$dataDetails = $resultDetails->fetch_all(MYSQLI_ASSOC);

// Query Total Events
$queryEvents = "SELECT COUNT(*) as total_events FROM myform";
$resultEvents = $conn->query($queryEvents);
$dataEvents = $resultEvents->fetch_assoc();
$totalEvents = $dataEvents['total_events'];

// Query Total Users
$queryUsers = "SELECT COUNT(*) as total_users FROM myform"; // Corrected COUNT query
$resultUsers = $conn->query($queryUsers);
$dataUsers = $resultUsers->fetch_assoc();
$totalUsers = $dataUsers['total_users'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h1>Admin Dashboard</h1>

    <div class="widgets">
        <div class="widget">
            <h2>Overview</h2>
            <p>Total Events: <span id="totalEvents"><?php echo $totalEvents; ?></span></p>
            
        </div>
        <div class="widget">
            <h2>Event Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Event Type</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Guests</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataDetails as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['evtype']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['venue']); ?></td>
                        <td><?php echo htmlspecialchars($row['guests']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <h2>Overview</h2>
            <p>event type: <span id="event_type"><?php echo $evtype; ?></span></p>
            <p>date: <span id="date"><?php echo $date; ?></span></p>
            <p>venue:<span id="venue"><?php echo $venue; ?></span></p>
            <p>guests :<span id="guests"><?php echo $guests; ?></span></p> -->
        </div>
    </div>
    
    <!-- Additional dashboard widgets can be added here -->
    
    <!-- JavaScript for AJAX updates -->
    <script>
      // Function to fetch updated data from the backend
      function updateDashboardData() {
          fetch('update_dashboard.php')
              .then(response => response.json())
              .then(data => {
                  // Update the DOM elements with new data
                  document.getElementById('totalEvents').innerText = data.totalEvents;
                  document.getElementById('totalUsers').innerText = data.totalUsers;
                  // Extend here for more widgets if needed.
              })
              .catch(error => console.error('Error fetching update:', error));
      }
      
      // Poll the backend every minute
      setInterval(updateDashboardData, 60000);
      
      // Optionally, trigger an immediate update on page load:
      updateDashboardData();
    </script>
</body>
</html>
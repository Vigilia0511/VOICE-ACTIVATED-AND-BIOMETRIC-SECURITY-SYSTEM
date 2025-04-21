<?php  
    session_start();
    require "include/connect.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
        }
        /* Side navigation */
        .side-nav {
            width: 250px;
            background-color: #333;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .side-nav .top-section {
            padding: 20px;
        }
        .side-nav h2 {
            color: #fff;
            margin-bottom: 20px;
        }
        .side-nav a {
            display: flex;
            align-items: center;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .side-nav a img.nav-icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .side-nav a:hover {
            background-color: #575757;
        }
        .side-nav .profile {
            padding: 20px;
            border-top: 1px solid #444;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .side-nav .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .side-nav .profile div {
            color: white;
        }
        .side-nav .profile div strong {
            display: block;
        }
        .side-nav .profile div span {
            font-size: 0.9em;
            color: #ccc;
        }
        .side-nav .logout {
            padding: 20px;
            border-top: 1px solid #444;
        }
        /* Content area */
        .content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #575757;
            color: white;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #888;
        }
        .new-energy {
            background-color: #e6f7ff;
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Side Navigation -->
    <div class="side-nav">
    <div class="top-section">
        <h2>Smart Lock</h2>
        <a href="dashboard.php"><img src="dashboard.png" alt="Dashboard Icon" class="nav-icon"> Dashboard</a>
        <a href="settings.php"><img src="setting-removebg-preview.png" alt="Settings Icon" class="nav-icon"> Settings</a>
        <a href="interface.php"><img src="interface.png" alt="Interface Icon" class="nav-icon"> Interface</a>
        <a href="battery.php"><img src="energy-removebg-preview.png" alt="Energy Icon" class="nav-icon"> Battery Percentage</a>
    </div>
        <div class="profile">
            <img src="profile-removebg-preview.png" alt="Profile Picture">
            <div>
                <strong>User ID</strong>
                <span>051123</span>
            </div>
        </div>
        <div class="logout">
            <a href="logout.php"><img src="logout-removebg-preview.png" alt="Logout Icon" class="nav-icon"> Logout</a>
        </div>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h1>Energy Consumption Data</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Percentage</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
<tbody id="energy-body">
    <!-- <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['total_energy']}</td>
                    <td>{$row['timestamp']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3' class='no-data'>No energy consumption data found.</td></tr>";
    }
    ?> -->
</tbody>
        </table>
    </div>

    <!-- JavaScript for Auto-Refresh Energy Data -->
    <script>
let lastEnergyId = <?php echo $last_energy_id; ?>;

function checkNewEnergyData() {
    fetch(`energy_dash1.php?last_id=${lastEnergyId}`)
        .then(response => response.json())
        .then(newEnergyData => {
            if (newEnergyData.length > 0) {
                const tbody = document.getElementById('energy-body');
                newEnergyData.forEach(energy => {
                    const newRow = document.createElement('tr');
                    newRow.classList.add('new-energy');
                    newRow.innerHTML = `
                        <td>${energy.id}</td>
                        <td>${energy.total_energy}</td>
                        <td>${energy.timestamp}</td>
                    `;
                    tbody.insertBefore(newRow, tbody.firstChild); // Add new rows at the top
                    lastEnergyId = Math.max(lastEnergyId, energy.id); // Update the last ID
                });
            }
        })
        .catch(error => console.error('Error:', error));
}

// Check for new data every 2 seconds
setInterval(checkNewEnergyData, 2000);
    </script>
</body>
</html>
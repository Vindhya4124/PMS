<?php
session_start(); // Start the session

// Check if the user is not logged in (user_type session variable is not set)
if (!isset($_SESSION['user_type'])) {
    // Redirect the user to the login page
    header("Location: login.php");
    exit(); // Ensure that no further code is executed after redirection
}

// If user_type session variable is set, proceed with displaying the content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Table Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%; /* Reduced table width */
            margin: 20px auto; /* Center align the table */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="btn-container">
        <button class="btn" onclick="window.print()">Print Table</button>
    </div>
    <div class="btn-container">
        <button class="btn" onclick="update()">Update values</button>
    </div>
    <table>
        <tr>
            <th>Team</th>
            <th>Mentor</th>
            <th>Project Title</th>
            <th>Updates</th>
            <th>Remarks</th>
        </tr>
        <?php
        // Include the connection file
        include 'connection.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to select data from the table
        $sql = "SELECT * FROM cse1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Team"]."</td><td>".$row["Mentor"]."</td><td>".$row["Project_Title"]."</td><td>".$row["Updates"]."</td><td>".$row["Remarks"]."</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <!-- Your JavaScript functions -->
    <script>
        function update() {
            // Check the user_type session variable
            <?php if(isset($_SESSION['user_type'])): ?>
                <?php if($_SESSION['user_type'] == 'Student'): ?>
                    window.location.href = 'supdate.php'; // Redirect to supdate.php for students
                <?php elseif($_SESSION['user_type'] == 'Faculty'): ?>
                    window.location.href = 'fupdate.php'; // Redirect to fupdate.php for faculty
                <?php endif; ?>
            <?php else: ?>
                alert("User type not set. Please login."); // Prompt user to login if user_type session variable is not set
            <?php endif; ?>
        }
    </script>
</body>
</html>

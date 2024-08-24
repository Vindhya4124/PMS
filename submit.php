<?php
include("connection.php");

// Define CSV files for teams
$teamCSV = ($_POST['section'] == 'cse1') ? 'result.csv' : 'result2.csv';
$mentorCSV = 'result5.csv';

// Check if team CSV exists and is readable
if (file_exists($teamCSV) && is_readable($teamCSV)) {
    // Open team CSV file for reading
    $teamFile = fopen($teamCSV, "r");
    
    // Check if file opened successfully
    if ($teamFile) {
        // Open mentor CSV file for reading
        $mentorFile = fopen($mentorCSV, "r");

        // Check if mentor file opened successfully
        if ($mentorFile) {
            // Read each line (row) from the team CSV file
            while (($teamData = fgetcsv($teamFile)) !== false) {
                // Read corresponding mentor from the mentor CSV file
                $mentorData = fgetcsv($mentorFile);
                
                // Extract values from the CSV rows
                $team = $teamData[0]; // Assuming the team value is in the first column
                $mentor = $mentorData[0]; // Assuming the mentor value is in the first column
                
                // Check the selected section to determine the table to insert the data
                if ($_POST['section'] == 'cse1') {
                    // Insert data into cse1 table
                    $sql = "INSERT INTO cse1 (Team, Mentor) VALUES ('$team', '$mentor')";
                } elseif ($_POST['section'] == 'cse2') {
                    // Insert data into cse2 table
                    $sql = "INSERT INTO cse1 (Team, Mentor) VALUES ('$team', '$mentor')";
                }
                
                // Execute the SQL query
                if (mysqli_query($conn, $sql)) {
                    // Data inserted successfully, continue to the next row
                    continue;
                } else {
                    // Error occurred while inserting data, break the loop
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    break;
                }
            }

            // Close the mentor CSV file
            fclose($mentorFile);
        } else {
            // Unable to open the mentor CSV file
            echo "Error: Unable to open mentor CSV file.";
        }
        
        // Close the team CSV file
        fclose($teamFile);
    } else {
        // Unable to open the team CSV file
        echo "Error: Unable to open team CSV file.";
    }
} else {
    // Team CSV file does not exist or is not readable
    echo "Error: Team CSV file not found or not readable.";
}
?>
<html>
<head>
    <style>
         img {
      position: absolute;
      top: 22px;
      left: 70px;
    }

    .text-after-image {
      position: absolute;
      top: 0;
      left: 200px;
      font-size: 35px;
      font-family: 'Times New Roman', Times, serif;
    }
        .button-container {
      text-align: center;
      margin-top: 400px; 
      top: 100%; 
      transform: translateY(-100%);
    }

    .my-button {
      display: block; 
      width: 300px; 
      height:70px;
      padding: 10px 20px;
      font-size: 18px;
      font-family: 'Times New Roman', Times, serif;
      background-color: #1f2463;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 20px auto;
    }
    </style>
    </head>
    <body>
    <img src="https://i.ibb.co/BPYyhp5/PMS-logo.png" height="15%">
  <span class="text-after-image"><h1>PROJECT MANAGEMENT SYSTEM</h1></span>
  <div class="button-container">
    <button class="my-button" onclick="goback()">Go Back</button>
    </div>
  <script>
    function goback() {
      window.location.href = 'flogin.php'; // Change the file extension to .php
    }
    </script>
</body>
</html>
<?php
include("connection.php");

// PHP code for writing to CSV file
if (isset($_POST['projectName']) && isset($_POST['mentors']) && isset($_POST['section'])) {
    $projectName = $_POST['projectName'];
    $section = $_POST['section']; // Get the selected section
    $mentors = $_POST['mentors']; // Array of mentors

    // Write project details to the CSV file
    $file = fopen("result5.csv", "a"); // Open the CSV file in append mode


    // Write mentors to the CSV file after trimming spaces
    foreach ($mentors as $mentor) {
        $trimmedMentor = trim($mentor);
        fputcsv($file, [$trimmedMentor]);
    }

    fclose($file); // Close the CSV file

    // Write mentors list to a new file (if needed)
    $mentorsFile = fopen("mentors_list.txt", "a"); // Open a new file for appending
    fwrite($mentorsFile, implode(", ", $mentors) . "\n"); // Write mentors list to the file
    fclose($mentorsFile); // Close the file

    // Display success message
    echo '<div id="successMessage" class="success">Team assignments saved successfully!</div>';
}

$sql = "SELECT username FROM login WHERE user_type = 'Faculty'";
$result = mysqli_query($conn, $sql);

// Initialize an empty string to store the options
$options = "";

// Check if query executed successfully
if ($result && mysqli_num_rows($result) > 0) {
    // Populate options for "Faculty Mentor"
    while ($row = mysqli_fetch_assoc($result)) {
        $options .= '<option value="' . $row['username'] . '">' . $row['username'] . '</option>';
    }
} else {
    $options = '<option value="">No Faculty Mentors available</option>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your new project form page CSS styles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management System</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        h1 {
            margin: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select[multiple] {
            height: auto;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success {
            color: #008000;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<!-- Your new project form page content -->
<div class="container">
    <div class="header">
        <div>
            <img src="https://i.ibb.co/BPYyhp5/PMS-logo.png" alt="Company Logo" class="logo" height=100px
                 width=100px>
        </div>
        <div class="header">
            <h1>Project Management System</h1>
        </div>
    </div>
    <form id="projectForm" action="submit.php" method="POST"> <!-- Changed action to submit.php -->
        <label for="projectName">Project Name</label>
        <input type="text" id="projectName" name="projectName" required>
        <label for="section">Select Section</label>
        <select id="section" name="section" required>
            <option value="">Select Section</option>
            <option value="cse1">cse1</option>
            <option value="cse2">cse2</option>
        </select>
        <label for="mentors">Faculty Mentor (Hold ctrl and select options)</label>
        <select id="mentors" name="mentors[]" required multiple>
            <option value="">--Default--</option>
            <?php echo $options; ?> <!-- Insert options here -->
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>
    <div id="successMessage" class="success" style="display: none;">Submitted! Team assignments saved successfully!</div>
</div>
</body>
</html>

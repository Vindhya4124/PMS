<?php
// Include the connection file
include 'connection.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($conn, $input) {
    return mysqli_real_escape_string($conn, $input);
}

// Function to handle form submission
function submitUpdates($conn, $update, $mentor) {
    $update = sanitizeInput($conn, $update);
    $mentor = sanitizeInput($conn, $mentor);
    
    // SQL to update the row where Mentor matches the user input
    $sql = "UPDATE cse1 SET Updates = '$update' WHERE Mentor = '$mentor'";
    
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Update submitted successfully";
        } else {
            echo "No matching Mentor found in the database";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the update and Mentor from the form
    $update = $_POST['update'];
    $mentor = $_POST['mentor'];
    
    // Submit the update
    submitUpdates($conn, $update, $mentor);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
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
        
        .form-container {
            margin-top: 200px;
            text-align: center;
        }
        
        .form-input {
            width: 300px;
            height: 40px;
            font-size: 18px;
            margin: 10px;
            padding: 5px;
        }
        
        .submit-button {
            width: 150px;
            height: 50px;
            font-size: 18px;
            background-color: #1f2463;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<img src="https://i.ibb.co/BPYyhp5/PMS-logo.png" height="15%">
    <span class="text-after-image"><h1>PROJECT MANAGEMENT SYSTEM</h1></span>
    <h2>Update Form</h2>
    <div class="form-container">
    <form action="update.php" method="post">
        <label for="mentor">Mentor:</label>
        <input type="text" id="mentor" name="mentor">
        <br>
        <label for="update">Update:</label>
        <textarea id="update" name="update"></textarea>
        <br>
        <button type="submit">Submit Update</button>
    </form>
    </div>
</body>
</html>

<?php
include("connection.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management System - Login</title>
  <style>
    /* Your login page CSS styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 20%;
      display: flex;
      align-items: center;
    }
    header img {
      width: 10%;
      height: auto;
    }
    header h1 {
      margin: 0;
      font-size: 24px;
      flex-grow: 1;
      text-align: center;
    }
    .login-container,
    .recent-projects {
      position: absolute;
      top: 40%;
      left: 0;
      width: 20%;
      padding: 10px;
    }
    .login-container {
      left: 40%;
      height: 40%;
    }
    .login-form,
    .recent-projects {
      background-color: #fff;
      border: 2px solid #ccc;
      border-radius: 7px;
      padding: 20px;
      height: 100%;
    }
    .form-group {
      margin-bottom: 10px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
    }
    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group select {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-group select {
      margin-top: 3px;
    }
    .recent-projects h3 {
      margin-top: 0;
      font-size: 30px
    }
  </style>
</head>
<body>
  <!-- Your login page content -->
  <header>
    <img src="https://i.ibb.co/BPYyhp5/PMS-logo.png" alt="Logo">
    <p style="font-size:80px; text-align: center;">Project Management System</p>
  </header>

  <div class="login-container">
    <div class="login-form">
    <form id="loginForm" action="login.php" method="POST">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required pattern="[a-zA-Z0-9!@#$%^&*()_+-]+">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="user_type">User Type:</label>
          <select id="user_type" name="user_type">
            <option value="Faculty">Faculty</option>
            <option value="Student">Student</option>
          </select>
        </div>
        <button type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>
</body>
</html>

<?php
include("connection.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Add your dashboard page CSS styles -->
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
  <!-- Your dashboard page content -->
  <img src="https://i.ibb.co/BPYyhp5/PMS-logo.png" height="15%">
  <span class="text-after-image"><h1>PROJECT MANAGEMENT SYSTEM</h1></span>
  <div class="button-container">
    <button class="my-button" onclick="startNewProject()">Project Title</button>
    <button class="my-button" onclick=viewExistingProjects()>Updates</button>
  </div>
  <script>
    function startNewProject() {
      window.location.href = 'project.php'; // Change the file extension to .php
    }
    function viewExistingProjects() {
        window.location.href = 'update.php'; // Change the file name to view_projects.php
    }
  </script>
</body>
</html>

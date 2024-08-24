<?php
include("connection.php");
session_start(); // Start the session

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $user_type=$_POST['user_type'];

    $sql="SELECT * FROM login WHERE username = '$username' AND password = '$password' AND user_type = '$user_type'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
    
    if($count == 1 && $user_type == "Faculty"){
        $_SESSION['user_type'] = $user_type; // Set user_type session variable
        header("Location: flogin.php");
        exit();
    } 
    if($count == 1 && $user_type == "Student"){
        $_SESSION['user_type'] = $user_type; // Set user_type session variable
        header("Location: slogin.php");
        exit();
    } 
    else {
        echo '<script>
        window.location.href="index.php";
        alert("Login failed. Invalid username or password!!!")
        </script>';
        exit();
    }
}
?>
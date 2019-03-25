<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Bullbots Scouting Site.</h1>
    </div>
    <p>
    </p>
    <a type=class="btn btn-outline-primary" href="index.php">View Teams</a>
    <br>
    <a type=class="btn btn-outline-primary" href="#">View Matches</a>
    <br>
    <a type=class="btn btn-outline-primary" href="#">Add Teams</a>
    <br>
    <a type=class="btn btn-outline-primary" href="addmatches.php">Add Matches</a>
    <br>
    <a type=class="btn btn-outline-primary" href="logout.php">Logout</a>
</body>
</html>

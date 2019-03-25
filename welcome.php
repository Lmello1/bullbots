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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/jordan.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 30px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h4>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to the Bullbots Scouting Site.</h4>
    </div>
    <p>
    </p>
    <a type=class="btn btn-outline-primary" href="index.php">View Teams</a>
    <br>
    <a type=class="btn btn-outline-primary" href="matches.html">View Matches</a>
    <br>
    <a type=class="btn btn-outline-primary" href="#">Add Teams</a>
    <br>
    <a type=class="btn btn-outline-primary" href="addmatches.php">Add Matches</a>
    <br>
    <a type=class="btn btn-outline-primary" href="logout.php">Logout</a>
</body>
</html>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<head>
<center>
<h1> Add new team </h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/jordan.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

if(isset($_POST['submit'])){
        $data_missing = array();

        if(empty($_POST['teamNum'])){
                $data_missing[] = 'Team Number';
        } else {
                $teamNum = trim($_POST['teamNum']);
        }
        if(empty($_POST['teamName'])){
                $data_missing[] = 'Team Name';
        } else {
                $teamName = trim($_POST['teamName']);
        }


        if(empty($data_missing)){
                require_once('../../mysqli_connect.php');

                $query = "INSERT INTO teams (TeamNum, TeamName) VALUES (?,?)";

                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "is", $teamNum, $teamName);

                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);

                echo $affected_rows . ' affected.';

                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
        }
}
?>
<br>
<!--<meta http-equiv='refresh' content='0; URL=http://54.244.1.37/addteams.php'>-->
<form action="/addteams.php" method="post">
  Team Number:<br>
  <input type="number" name="teamNum"><br><br>
  Team Name:<br>
  <input type="text" name="teamName"><br><br>
  <input type="submit" value="submit" name="submit">
</form>
<br>

<a href = "index.php"> Back </a>
</center>
</body>

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
<h1> Input match data </h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/jordan.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="/addmatches.php" method="post">
  Match Number:<br>
  <input type="number" name="matchName"><br>
  Red team one:<br>
  <input type="number" name="red1"><br>
  Red team two:<br>
  <input type="number" name="red2"><br>
  Red team three:<br>
  <input type="number" name="red3"><br>
  Blue team one:<br>
  <input type="number" name="blue1"><br>
  Blue team two:<br>
  <input type="number" name="blue2"><br>
  Blue team three:<br>
  <input type="number" name="blue3"><br>
  <br>
  <input type="submit" value="submit" name="submit">
</form>
<br>
<?php


if(isset($_POST['submit'])){

        $data_missing = array();

        if(empty($_POST['matchName'])){
                $data_missing[] = 'Match Name';
        } else {
                $matchName = trim($_POST['matchName']);
        }
        if(empty($_POST['red1'])){
                $data_missing[] = 'Team 1';
        } else {
                $team1 = trim($_POST['red1']);
        }
        if(empty($_POST['red2'])){
                $data_missing[] = 'team2';
        } else {
                $team2 = trim($_POST['red2']);
        }
        if(empty($_POST['red3'])){
                $data_missing[] = 'team3';
        } else {
                $team3 = trim($_POST['red3']);
        }
        if(empty($_POST['blue1'])){
                $data_missing[] = 'team4';
        } else {
                $team4 = trim($_POST['blue1']);
        }
        if(empty($_POST['blue2'])){
                $data_missing[] = 'team5';
        } else {
                $team5 = trim($_POST['blue2']);
        }
        if(empty($_POST['blue3'])){
                $data_missing[] = 'team6';
        } else {
                $team6 = trim($_POST['blue3']);
        }


        if(empty($data_missing)){

                require_once('../mysqli_connect.php');

                $matchQuery = "INSERT INTO matches(MatchName) VALUES (?)";
                $matchStmt = mysqli_prepare($dbc, $matchQuery);
                mysqli_stmt_bind_param($matchStmt, "s", $matchName);
                mysqli_stmt_execute($matchStmt);
                mysqli_stmt_close($matchStmt);

                $idQuery = "SELECT MatchNum FROM matches WHERE MatchName = ? LIMIT 1";
                $idStmt = mysqli_prepare($dbc, $idQuery);
                mysqli_stmt_bind_param($idStmt, "s", $matchName);
                mysqli_stmt_execute($idStmt);
                $response= mysqli_stmt_get_result($idStmt);
                $row = mysqli_fetch_array($response);
                $matchID = $row['MatchNum'];
                mysqli_stmt_close($idStmt);

                $perfQuery = 'INSERT INTO performances(MatchID, TeamNum, Color) VALUES
                                (?, ?, "red"),
                                (?, ?, "red"),
                                (?, ?, "red"),
                                (?, ?, "blue"),
                                (?, ?, "blue"),
                                (?, ?, "blue")';
                $perfStmt = mysqli_prepare($dbc, $perfQuery);
                mysqli_stmt_bind_param($perfStmt, "iiiiiiiiiiii", $matchID, $team1, $matchID, $team2, $matchID, $team3, $matchID, $team4, $matchID, $team5, $matchID, $team6);
                mysqli_stmt_execute($perfStmt);
                mysqli_stmt_close($idStmt);
		echo "Added Match<br>";
                mysqli_close($dbc);
        }else{
                echo "Missing Data";
        }
}
?>

<a href = "index.php"> Back </a>
</body>

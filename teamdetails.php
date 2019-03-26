<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<center>
<link rel="stylesheet" href="css/jordan.css">
<?php

if(!empty($_GET['teamNum'])){
$teamNum = $_GET['teamNum'];
require_once('../mysqli_connect.php');

$statQuery = "SELECT * FROM teams WHERE teamNum = ?";

$statStmt = mysqli_prepare($dbc, $statQuery);
mysqli_stmt_bind_param($statStmt, "i", $teamNum);
mysqli_stmt_execute($statStmt);
$response1 = mysqli_stmt_get_result($statStmt);
mysqli_stmt_close($statStmt);
if($response1){

	echo '<h3>Stats For Team ' . $teamNum . '</h3><br>';
	while($row = mysqli_fetch_array($response1)){
		echo '<tr><td>Hab start</td><td>';
		if($row['LevelTwoStart']==1){
			echo "Yes</td></tr><tr>";
		}else if($row['LevelTwoStart']==0){ 
			echo "No</td></tr><tr>";
		}else{
			echo "</td></tr><tr>";
		}
		echo "<td>Ball Levals</td><td>";
		echo $row['BallLevels'] . '</td></tr><tr>';
		echo "<td>Hatch Levels</td><td>";
		echo $row['HatchLevels'] . '</td></tr><tr>';
		echo "<td>Climb Levels</td><td>";
		echo $row['ClimbLevels'] . '</td></tr><tr>';
		echo "<td>Practice Time</td><td>";
		echo $row['PracticeTime'] . '</td></tr>';
	}
	echo '</table>';
}else{
	echo "Couldn't issue database query";
	echo mysqli_error($dbc);
}

$matchQuery = "SELECT m.MatchName FROM teams t LEFT JOIN performances p ON t.TeamNum = p.TeamNum LEFT JOIN matches m ON m.MatchNum = p.MatchID WHERE m.MatchNum ORDER BY m.MatchNum ASC";

mysqli_close($dbc);
}else{
	echo "NOPE";
}
?>
<a href = "index.php"> Back </a>
</center>

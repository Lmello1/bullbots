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

	echo '<h3>Stats For Team ' .$teamNum . '</h3><br>';
	echo '<table><tr><td>Hab Start</td><td>Ball Levels</td><td>Hatch Levels</td><td>Climb Levels</td><td>Practice Time</td></tr>';
	while($row = mysqli_fetch_array($response1)){
		echo '<tr><td>';
		if($row['LevelTwoStart']==1){
			echo "Yes</td><td>";
		}else if($row['LevelTwoStart']==0){
			echo "No</td><td>";
		}else{
			echo "</td><td>";
		}

		echo $row['BallLevels'] . '</td><td>';
		echo $row['HatchLevels'] . '</td><td>';
		echo $row['ClimbLevels'] . '</td><td>';
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

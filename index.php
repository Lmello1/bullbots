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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/jordan.css">
</head>
<body>
<h1>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
<h1>All teams</h1>
<a href="logout.php">Logout</a>
<br>
<br>
  <a href = "dashboard.php">Dashboard </a>
  <br>
<br>
  <a href = "addmatches.php"> Add Match Data</a>
  <br>
<br>
  <a href = "matches.html"> View Matches</a>
  <br>
<br>
  <a href = "editteams.php"> Add Team Data</a>
  <br>
<br>
  <a href = "https://github.com/Lmello1/bullbots"> GitHub </a>
  <br>
<br>
<?php

require_once('../mysqli_connect.php');

$query = "SELECT TeamName, TeamNum FROM teams";

$response = @mysqli_query($dbc, $query);

if($response){
	echo '<table>';
	while($row = mysqli_fetch_array($response)){
		echo '<tr><td><a href = "./teamdetails.php?teamNum='. $row['TeamNum'] .'">' .
		$row['TeamNum']. '    '.
		$row['TeamName']. '</a></td></tr>';
	}
	echo '</table>';
}else{
	echo "Couldn't issue database query";
	echo mysqli_error($dbc);
}

mysqli_close($dbc);

?>
<br>
<a href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ"> Click here to delete all data </a>
</center>
</body>

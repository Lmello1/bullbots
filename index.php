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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<h1>All teams</h1>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/jordan.css">
</head>
<body>
<a href = "welcome.php"> Back </a>
<br>
<br>
<a href = "livedashboard.html"> View the Bullbots live dashboard </a>
<br>
<br>
<a href = "passwordmatchdata.html"> Input match data</a>
<br>
<br>
<a href = "matches.html"> View matches</a>
<br>
<br>
<a href = "passwordpage.html"> Input team data</a>
<br>
<br>
<a href = "https://github.com/Lmello1/bullbots"> We have a git repo </a>
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
</body>

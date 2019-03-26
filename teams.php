<center>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/jordan.css">
<?php

require_once('../../mysqli_connect.php');

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
<a href = "index.php">Back</a>
</center>
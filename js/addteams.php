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
		require_once('../mysqli_connect.php');

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
<meta http-equiv='refresh' content='0; URL=http://54.244.1.37/index.php'>

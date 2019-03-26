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
<h1> Input team data </h1>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/jordan.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="./editteams.php" method="post">
  Team number:<br>
  <input type="number" name="teamNum"><br>
  Team name:<br>
  <input type="text" name="teamName"><br>
  Hab Start level:<br>
  <input type="number" name="lvl2Start"><br>
  Ball levels:<br>
  <input type="text" name="ballLevels"><br>
  Hatch levels:<br>
  <input type="text" name="hatchLevels"><br>
  Gear ratio:<br>
  <input type="text" name="gearRatio"><br>
  Motor types:<br>
  <input type="text" name="mtrTypes"><br>
  Number of motors:<br>
  <input type="number" name="mtrNum"><br>
  Practice time:<br>
  <input type="text" name="practiceTime"><br>
  <br>
  <input type="submit" value="submit" name="submit">
</form>
<br>
<?php
if(isset($_POST['submit'])){
        $data_missing = array();

        if(empty($_POST['teamNum'])){
                $data_missing[] = 'Team Number';
        } else {
                $teamNum = trim($_POST['teamNum']);
        }

        $teamName = $_POST['teamName'];
        $lvl2Start = $_POST['lvl2Start'];
        $ballLevels = $_POST['ballLevels'];
        $hatchLevels = $_POST['hatchLevels'];
        $climbLevels = $_POST['climbLevels'];
        $gearRatio = $_POST['gearRatio'];
        $mtrType = $_POST['mtrType'];
        $mtrNum = $_POST['mtrNum'];
        $practiceTime = $_POST['practiceTime'];

        if(empty($data_missing)){
                require_once('../mysqli_connect.php');
                $query = "UPDATE teams SET
                        TeamName = IfNull(?, TeamName),
                        LevelTwoStart = IfNull(?, LevelTwoStart),
                        BallLevels = IfNull(?, BallLevels),
                        HatchLevels = IfNull(?, HatchLevels),
                        ClimbLevels = IfNull(?, ClimbLevels),
                        GearRatio = IfNull(?, GearRatio),
                        MotorType = IfNull(?, MotorType),
                        MotorNum = IfNull(?, MotorNum),
                        PracticeTime = IfNull(?, PracticeTime)
                WHERE
                        TeamNum = ?";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "sisssssiii",$teamName,$lvl2Start,$ballLevels,$hatchLevels, $climbLevels,$gearRatio,$mtrType,$mtrNum,$practiceTime,$teamNum);

                mysqli_stmt_execute($stmt);
                $affected_rows = mysqli_stmt_affected_rows($stmt);
                echo $affected_rows . ' rows changed.<br>';
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
		echo "Updated Team Data<br>";
        }else{
                echo "Error";
        }
}
?>

<a href = "index.php"> Back </a>
</center>
</body>

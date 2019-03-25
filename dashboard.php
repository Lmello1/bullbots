<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/jordan.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <center>
    <h1>Welcome to the bullbots live dashboard</h1>
    <h3>The only place for LIVE bullbots updates</h3>
</head>
<body>
<?php
require_once('../mysqli_connect.php');

$query = 'SELECT COUNT(SELECT * FROM performances p LEFT JOIN matches m ON m.MatchNum = p.MatchID WHERE p.TeamNum = 1891 AND (m.Color = "blue" AND m.BlueScore > m.RedScore) OR (m.Color="red" AND m.RedScore > m.BlueScore))'

?>
    <p>The bullbots are currently ranked number [number] out of [number] in the idaho reginal</p>
    <p>Our next match is agenst teams [team1][team2][team3] in match number [matchnumber] at [time]</p>
    <p>We are on day [day] of 3 of compotition</p>
    <h3>Stats at a glance</h3>
    <table>
    <tr>
        <td>Win/Loss/tie</td>
        <td>5/0/0</td>
    </tr>
    <br>
    <tr>
        <td>Matches played</td>
        <td>5</td>
    </tr>
    <br>
    <tr>
        <td>Ranking</td>
        <td>1</td>
    </tr>
    <tr>
        <td>ranking points</td>
        <td>4</td>
    </tr>
    </table>
    <h1> Match data </h1>
    <table>
            <tbody>
            <tr>
            <td>Match number</td>
            <td>Red team 1</td>
            <td>Red team 2</td>
            <td>Red team 3</td>
            <td>Blue team 1</td>
            <td>Blue team 2</td>
            <td>Blue team 3</td>
            </tr>
            <tr>
            <td>1</td>
            <td style="background-color:red;color:black;">1891</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:green;color:white;"> win &#x263a;</td>
            </tr>
            <tr>
            <td>2</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:black;">1891</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:green;color:white;"> win &#x263a;</td>
            </tr>
            <tr>
            <td>3</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:red;color:white;">118</td>
            <td style="background-color:red;color:black;">1891</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:rgb(54, 111, 255);color:white;">118</td>
            <td style="background-color:green;color:white;"> win &#x263a;</td>
            </tr>
            </tbody>
            </table>
            <br>
            <br>
            <a href = "index.php"> Home </a>
</body>

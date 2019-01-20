<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Database</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet' href='css/34b729901a37198f5d0414728.css'>
      <link rel="stylesheet" href="css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
      <link href="css/menu.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>   
      <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  
</head>

<body style="background-image: linear-gradient(to right top, #1600ff, #9300a5, #930061, #751039, #4c2e2e);">
    <canvas class="fireworks">
        
      </canvas>
  <section>
      <ul class="menu cf navbar">
          <li><a href="../INDEX.html">Home</a></li>
          <li><a href="../search_player/player_search.html">Search</a> </li>
          <li><a href="../update_player/update_player.html">Update</a></li>
          <li><a href="../insert_player/insert_new_player.html">Insert</a></li>
          <li><a href="database.php">Database</a></li>
            <li><a href="../report/project_report.html">Report</a></li>
          <li><a href="../procedures/procedures.html">Procedures</a></li>
          <li><a href="../about/about.html">About</a></li>
        </ul>  <br>      
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fifa";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
?>
  <h1>PERSONAL DETAILS</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>PLAYER ID</th>
          <th>NAME</th>
          <th>AGE</th>
          <th>OVERALL RATING</th>
          <th>NATIONALITY</th>
        </tr>
      </thead>
    </table>
  </div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<!--<tbody>-->
<?php
$sql = "SELECT * FROM personal_details ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody>";
        echo "<tr>";
         echo "<td>" .$row["player_id"]. "</td>";
          echo "<td>" .$row["player_name"]. "</td>";
          echo "<td>" .$row["age"]. "</td>";
         echo "<td>" .$row["overall_rating"]. "</td>";
          echo "<td>" .$row["nationality"]. "</td>";
         echo "</tr>";
        echo "</tbody>";
    }
}else {
     echo "0 results";
 }    
?>
<!-- </tbody>-->
</table>
</div><br>

  <h1>PLAYER POSITIONS</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>PLAYER ID</th>
          <th>GOALKEEPER</th>
          <th>DEFENDER</th>
          <th>CENTRAL-MID</th>
          <th>FORWARD</th>
        </tr>
      </thead>
    </table>
  </div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<!--<tbody>-->
<?php
$sql = "SELECT * FROM position ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody>";
        echo "<tr>";
         echo "<td>" .$row["player_id"]. "</td>";
          echo "<td>" .$row["gk"]. "</td>";
          echo "<td>" .$row["df"]. "</td>";
         echo "<td>" .$row["cm"]. "</td>";
          echo "<td>" .$row["fr"]. "</td>";
         echo "</tr>";
        echo "</tbody>";
    }
}else {
     echo "0 results";
 }    
?>
<!-- </tbody>-->
</table>
</div><br>
      
  <h1>PLAYER EARNINGS</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>PLAYER ID</th>
          <th>WAGE</th>
          <th>VALUE</th>
        </tr>
      </thead>
    </table>
  </div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<!--<tbody>-->
<?php
$sql = "SELECT * FROM salary ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody>";
        echo "<tr>";
         echo "<td>" .$row["player_id"]. "</td>";
          echo "<td>" .$row["wage"]. "</td>";
          echo "<td>" .$row["value"]. "</td>";
         echo "</tr>";
        echo "</tbody>";
    }
}else {
     echo "0 results";
 }    
?>
<!-- </tbody>-->
</table>
</div><br>
        <h1>PLAYER STATS</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>PLAYER ID</th>
        <th>ACCELERA TION</th>
            <th>BALANCE</th>
            <th>BALL CONTROL</th>
            <th>CROSSING</th>
            <th>CURVE</th>
            <th>DRIBBLING</th>
            <th>FINISHING</th>
            <th>GK KICKING</th>
            <th>GK POSITIONING</th>
            <th>PENALTIES</th>
            <th>SHORT PASS</th>
            <th>STAMINA</th>
            <th>STRENGTH</th>
        </tr>
      </thead>
    </table>
  </div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<!--<tbody>-->
<?php
$sql = "SELECT * FROM player_stats ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody>";
        echo "<tr>";
         echo "<td>" .$row["player_id"]. "</td>";
        echo "<td>" .$row["acceleration"]. "</td>";
          echo "<td>" .$row["balance"]. "</td>";
         echo "<td>" .$row["ball_control"]. "</td>";
         echo "<td>" .$row["crossing"]. "</td>";
         echo "<td>" .$row["curve"]. "</td>";
         echo "<td>" .$row["dribbling"]. "</td>";
         echo "<td>" .$row["finishing"]. "</td>";
         echo "<td>" .$row["gk_kicking"]. "</td>";
         echo "<td>" .$row["gk_positioning"]. "</td>";
         echo "<td>" .$row["penalties"]. "</td>";
         echo "<td>" .$row["short_pass"]. "</td>";
         echo "<td>" .$row["stamina"]. "</td>";
         echo "<td>" .$row["strength"]. "</td>";
         echo "</tr>";
        echo "</tbody>";
    }
}else {
     echo "0 results";
 }    
?>
<!-- </tbody>-->
</table>
</div><br>
            
  <h1>PLAYER CLUB</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>PLAYER ID</th>
          <th>CLUB</th>
          <th>PREFERRED POSITION</th>
        </tr>
      </thead>
    </table>
  </div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<!--<tbody>-->
<?php
$sql = "SELECT * FROM other_details ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody>";
        echo "<tr>";
         echo "<td>" .$row["player_id"]. "</td>";
          echo "<td>" .$row["club"]. "</td>";
          echo "<td>" .$row["preferred_position"]. "</td>";
         echo "</tr>";
        echo "</tbody>";
    }
}else {
     echo "0 results";
 }  
$conn-> close();
?>
<!-- </tbody>-->
</table>
</div><br>
      
  <defs>
      <radialGradient cx="50%" cy="0%" fx="50%" fy="0%" r="50%" id="radialGradient-1">
        <stop stop-color="#329FFF" offset="0%"></stop>
        <stop stop-color="#206EFF" offset="100%"></stop>
      </radialGradient>
      <radialGradient cx="50%" cy="0%" fx="50%" fy="0%" r="50%" id="radialGradient-2">
        <stop stop-color="#FF7894" offset="0%"></stop>
        <stop stop-color="#FF324A" offset="100%"></stop>
      </radialGradient>
      <radialGradient cx="50%" cy="0%" fx="50%" fy="0%" r="100%" id="radialGradient-3">
        <stop stop-color="#FF7894" offset="0%"></stop>
        <stop stop-color="#FF324A" offset="100%"></stop>
      </radialGradient>
      <radialGradient cx="50%" cy="0%" fx="50%" fy="0%" r="100%" id="radialGradient-4">
        <stop stop-color="#359FFC" offset="0%"></stop>
        <stop stop-color="#206EFF" offset="100%"></stop>
      </radialGradient>
      <radialGradient cx="50%" cy="0%" fx="50%" fy="0%" r="50%" id="radialGradient-5">
        <stop stop-color="#5FFFD2" offset="0%"></stop>
        <stop stop-color="#31FFA6" offset="100%"></stop>
      </radialGradient>
    </defs>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <rect id="dot-js" x="80" y="352" width="32" height="32" rx="16"></rect>
    </g>
</section>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <script src='js/4032af61ca0478304ab7b31b7.js'></script>

    <script  src="js/index.js"></script>


</body>

</html>

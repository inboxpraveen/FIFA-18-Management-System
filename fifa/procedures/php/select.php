<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>Triggers</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='css/34b729901a37198f5d0414728.css'>
<link rel="stylesheet" href="css/style.css">
<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
<link href="css/menu.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>   
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

</head>

<body style="background-image: linear-gradient(to right top, #1a4a5b, #004b55, #004c48, #004b33, #094819);">
<canvas class="fireworks">

</canvas>
<section>
<ul class="menu cf navbar">
<li><a href="../../INDEX.html">Home</a></li>
<li><a href="../../search_player/player_search.html">Search</a> </li>
<li><a href="../../update_player/update_player.html">Update</a></li>
<li><a href="../../insert_player/insert_new_player.html">Insert</a></li>
<li><a href="../../database/database.php">Database</a></li>
<li><a href="../../report/project_report.html">Report</a></li>
<li><a href="../procedures.html">Procedures</a></li>
<li><a href="../../about/about.html">About</a></li>
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
$choices = $_POST["choices-single-defaul"];   

?>
<?php
if($choices=='TRIGGER PROCEDURE'){
echo "  <h1>INSERT TRIGGERS</h1>";
echo "<div class=\"tbl-header\">";
echo " <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
echo "<thead>";
echo "<tr>";
echo " <th>ID</th>";
echo " <th>ACTION</th>";
echo " <th>TIME</th>";
echo "</tr>";
echo " </thead>";
echo " </table>";
echo "</div>";
echo "<div class=\"tbl-content\">";
echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
$sql = "SELECT * FROM insert_logs ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
while($row = $result->fetch_assoc()) { 
echo "<tbody>";
echo "<tr>";
echo "<td>" .$row["id"]. "</td>";
echo "<td>" .$row["action"]. "</td>";
echo "<td>" .$row["time"]. "</td>";
echo "</tr>";
echo "</tbody>";
}
}else {
echo "<h3 style=\"text-align:center; font-family:cursive;\">No changes yet !</h3>";
}    
echo "</table>";
echo "</div><br>";


echo "  <h1>UPDATE TRIGGERS</h1>";
echo "<div class=\"tbl-header\">";
echo " <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
echo "<thead>";
echo "<tr>";
echo " <th>ID</th>";
echo " <th>ACTION</th>";
echo " <th>TIME</th>";
echo "</tr>";
echo " </thead>";
echo " </table>";
echo "</div>";
echo "<div class=\"tbl-content\">";
echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
$sql = "SELECT * FROM update_logs ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
while($row = $result->fetch_assoc()) { 
echo "<tbody>";
echo "<tr>";
echo "<td>" .$row["id"]. "</td>";
echo "<td>" .$row["action"]. "</td>";
echo "<td>" .$row["time"]. "</td>";
echo "</tr>";
echo "</tbody>";
}
}else {
echo "<h3 style=\"text-align:center; font-family:cursive;\">No changes yet !</h3>";
}    
echo "</table>";
echo "</div><br>";


echo "  <h1>DELETE TRIGGERS</h1>";
echo "<div class=\"tbl-header\">";
echo " <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
echo "<thead>";
echo "<tr>";
echo " <th>ID</th>";
echo " <th>ACTION</th>";
echo " <th>TIME</th>";
echo "</tr>";
echo " </thead>";
echo " </table>";
echo "</div>";
echo "<div class=\"tbl-content\">";
echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
$sql = "SELECT * FROM delete_logs ORDER BY id";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
while($row = $result->fetch_assoc()) { 
echo "<tbody>";
echo "<tr>";
echo "<td>" .$row["id"]. "</td>";
echo "<td>" .$row["action"]. "</td>";
echo "<td>" .$row["time"]. "</td>";
echo "</tr>";
echo "</tbody>";
}
}else {
echo "<h3 style=\"text-align:center; font-family:cursive;\">No changes yet !</h3>";
}    

echo "</table>";
echo "</div><br>";
}
else if ($choices=='STORED PROCEDURE'){
header("Location:phpforstoredprocedure/player_search.html");
}
else {
header("Location:index.html");
}

?>
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

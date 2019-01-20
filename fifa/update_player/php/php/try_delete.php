<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>Delete Player Data</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link rel='stylesheet' href='css/34b729901a37198f5d0414728.css'>

<link rel="stylesheet" href="css/style.css">
<link href='https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
<link href="css/menu.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
<link href="css/searchbar.css" rel="stylesheet" />

</head>

<body>

<canvas class="fireworks">

</canvas>
<section>

<ul class="menu cf">
<li><a href="../../../INDEX.html">Home</a></li>
<li><a href="../../../search_player/player_search.html">Search</a> </li>
<li><a href="../../update_player.html">Update</a></li>
<li><a href="../../../insert_player/insert_new_player.html">Insert</a></li>
<li><a href="../../../database/database.php">Database</a></li>
<li><a href="../../../report/project_report.html">Report</a></li>
<li><a href="../../../procedures/procedures.html">Procedures</a></li>
<li><a href="../../../about/about.html">About</a></li>
</ul>   

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

$choices = $_POST["choices-single-defaul"];
?>
<?php
if($choices=='BY AGE'){
echo "<form action=\"php_submit_delete/delete_byage.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PLAYER AGE\" required autofocus name=\"page\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">PLAYER AGE</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit_delete/delete_byage.php\" class=\"signup-button\">DELETE</button>";
echo "<p class=\"tip\">Press Tab</p>";
//    echo "<div class=\"signup-button\">INSERT</div>";
echo "</form>";
}

else  if($choices=='BY NAME'){

echo "<form action=\"php_submit_delete/delete_byname.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PLAYER NAME\" required autofocus name=\"pname\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">PLAYER NAME</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit_delete/delete_byname.php\" class=\"signup-button\">DELETE</button>";
echo "<p class=\"tip\">Press Tab</p>";
//    echo "<div class=\"signup-button\">INSERT</div>";
echo "</form>";

}

else  if($choices=='BY PLAYER ID'){

echo "<form action=\"php_submit_delete/delete_byplayerid.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PLAYER ID\" required autofocus name=\"pid\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">PLAYER ID</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit_delete/delete_playerid.php\" class=\"signup-button\">DELETE</button>";
echo "<p class=\"tip\">Press Tab</p>";
//    echo "<div class=\"signup-button\">INSERT</div>";
echo "</form>";
}

else  if($choices=='BY OVERALL RATING'){

echo "<form action=\"php_submit_delete/delete_byoverallrating.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"OVERALL RATING\" required autofocus name=\"poverall_rating\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">PLAYER OVERALL RATING</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit_delete/delete_byoverallrating.php\" class=\"signup-button\">DELETE</button>";
echo "<p class=\"tip\">Press Tab</p>";
//    echo "<div class=\"signup-button\">INSERT</div>";
echo "</form>";

}
else if($choices=='BY NATIONALITY'){

echo "<form action=\"php_submit_delete/delete_bynationality.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PLAYER NATIONALITY\" required autofocus name=\"pnationality\" />";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">PLAYER NATIONALITY</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit_delete/delete_bynationality.php\" class=\"signup-button\">DELETE</button>";
echo "<p class=\"tip\">Press Tab</p>";
//    echo "<div class=\"signup-button\">INSERT</div>";
echo "</form>";

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

<script src='js/4032af61ca0478304ab7b31b7.js'></script>

<script  src="js/index.js"></script>

<script src="js/extention/choices.js"></script>
<script>
const choices = new Choices('[data-trigger]',
{
searchEnabled: false,
itemSelectText: '',
});

</script>

</body>

</html>

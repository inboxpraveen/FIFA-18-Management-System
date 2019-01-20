<!DOCTYPE html>
<html lang="en" >

<head>
<meta charset="UTF-8">
<title>Insert Player Data</title>

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
<li><a href="../../INDEX.html">Home</a></li>
<li><a href="../../search_player/player_search.html">Search</a> </li>
<li><a href="../../update_player/update_player.html">Update</a></li>
<li><a href="../insert_new_player.html">Insert</a></li>
<li><a href="../../database/database.php">Database</a></li>
<li><a href="../../report/project_report.html">Report</a></li>
<li><a href="../../procedures/procedures.html">Procedures</a></li>
<li><a href="../../about/about.html">About</a></li>
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
if($choices=='PERSONAL DETAILS'){
echo "<form action=\"php_submit/into_personal_details.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PlayerID\" required autofocus name=\"pid\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">Player ID</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-2\" type=\"text\" placeholder=\"Player Name\" required name=\"pname\"/>";
echo "<label for=\"input-2\">";
echo "<span class=\"label-text\">Player Name</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-3\" type=\"text\" placeholder=\"Age\" required name=\"page\"/>";
echo "<label for=\"input-3\">";
echo " <span class=\"label-text\">Player Age</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-4\" type=\"text\" placeholder=\"Overall Rating\" required name=\"poverallrating\"/>";
echo "<label for=\"input-4\">";
echo "  <span class=\"label-text\">Overall Rating</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Nationality\" required name=\"pnationality\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Nationality</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit/into_personal_details.php\" class=\"signup-button\">INSERT</button>";
echo "<p class=\"tip\">Press Tab</p>";
echo "</form>";
}

else  if($choices=='PLAYER CLUB'){

echo "<form action=\"php_submit/into_other_details.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PlayerID\" required autofocus name=\"pid\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">Player ID</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-2\" type=\"text\" placeholder=\"Player Club\" required name=\"pclub\"/>";
echo "<label for=\"input-2\">";
echo "<span class=\"label-text\">Player Club</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-3\" type=\"text\" placeholder=\"Preferred Position\" required name=\"ppreferredposition\"/>";
echo "<label for=\"input-3\">";
echo " <span class=\"label-text\">Preferred Position</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit/into_other_details.php\" class=\"signup-button\">INSERT</button>";
echo "<p class=\"tip\">Press Tab</p>";
echo "</form>";

}

else  if($choices=='PLAYER POSITION'){

echo "<form action=\"php_submit/into_position.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PlayerID\" required autofocus name=\"pid\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">Player ID</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-2\" type=\"text\" placeholder=\"Player@GoalKeeper\" required name=\"pgk\"/>";
echo "<label for=\"input-2\">";
echo "<span class=\"label-text\">Player@Goalkeeper Rating</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-3\" type=\"text\" placeholder=\"Player@Defender\" required name=\"pdf\"/>";
echo "<label for=\"input-3\">";
echo " <span class=\"label-text\">Player@Defender Rating</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-4\" type=\"text\" placeholder=\"Player@Central-Mid\" required name=\"pcm\"/>";
echo "<label for=\"input-4\">";
echo "  <span class=\"label-text\">Player@Central-mid Rating</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player@Forward\" required name=\"pfr\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Player@Forward Rating</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit/into_position.php\" class=\"signup-button\">INSERT</button>";
echo "<p class=\"tip\">Press Tab</p>";
echo "</form>";
}

else  if($choices=='PLAYER STATS'){

echo "<form action=\"php_submit/into_player_stats.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PlayerID\" required autofocus name=\"pid\"/>";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">Player ID</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-2\" type=\"text\" placeholder=\"Player Acceleration\" required name=\"pacceleration\"/>";
echo "<label for=\"input-2\">";
echo "<span class=\"label-text\">Acceleration</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-3\" type=\"text\" placeholder=\"Player Balance\" required name=\"pbalance\" />";
echo "<label for=\"input-3\">";
echo " <span class=\"label-text\">Balance</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-4\" type=\"text\" placeholder=\"Player Ball Control\" required name=\"pballcontrol\"/>";
echo "<label for=\"input-4\">";
echo "  <span class=\"label-text\">Ball Control</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Crossing\" required name=\"pcrossing\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Crossing</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Curve\" required name=\"pcurve\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Curve</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Dribbling\" required name=\"pdribbling\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Dribbling</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Finishing\" required name=\"pfinishing\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Finishing</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player GK Kicking\" required name=\"pgkk\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">GK kicking</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player GK Positioning\" required name=\"pgkp\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">GK Positioning</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Penalties\" required name=\"ppenalties\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Penalties</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Short Pass\" required name=\"pshortpass\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Short pass</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Stamina\" required name=\"pstamina\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Stamina</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-5\" type=\"text\" placeholder=\"Player Strength\" required name=\"pstrength\"/>";
echo "<label for=\"input-5\">";
echo "  <span class=\"label-text\">Strength</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit/into_player_stats.php\" class=\"signup-button\">INSERT</button>";
echo "<p class=\"tip\">Press Tab</p>";
echo "</form>";

}
else if($choices=='PLAYER EARNINGS'){

echo "<form action=\"php_submit/into_salary.php\" method=\"post\">";
echo "<input id=\"input-1s\" type=\"text\" placeholder=\"PlayerID\" required autofocus name=\"pid\" />";
echo "<label for=\"input-1\">";
echo "<span class=\"label-text\">Player ID</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-2\" type=\"text\" placeholder=\"Player Wages\" required name=\"pwage\"/>";
echo "<label for=\"input-2\">";
echo "<span class=\"label-text\">Player Wage</span>";
echo "<span class=\"nav-dot\"></span>";
echo "</label>";
echo "<input id=\"input-3\" type=\"text\" placeholder=\"Player Value\" required name=\"pvalue\"/>";
echo "<label for=\"input-3\">";
echo " <span class=\"label-text\">Player Value</span>";
echo "  <span class=\"nav-dot\"></span>";
echo "</label>";
echo "<button type=\"submit\" onclick=\"php_submit/into_salary.php\" class=\"signup-button\">INSERT</button>";
echo "<p class=\"tip\">Press Tab</p>";
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

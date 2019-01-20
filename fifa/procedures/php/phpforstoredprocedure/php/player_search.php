<html>
    
<head>
    
    <meta charset="UTF-8">
    <title>Player Search successfull</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='css/34b729901a37198f5d0414728.css'>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>  
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />

</head>
    
<body>

<canvas class="fireworks"></canvas>
    
<section>
<ul class="menu cf">
    <li><a href="../../../../INDEX.html">Home</a></li>
    <li><a href="../../../../search_player/player_search.html">Search</a> </li>
    <li><a href="../../../../update_player/update_player.html">Update</a></li>
    <li><a href="../../../../insert_player/insert_new_player.html">Insert</a></li>
    <li><a href="../../../../database/database.php">Database</a></li>
    <li><a href="../../../../report/project_report.html">Report</a></li>
    <li><a href="../../../procedures.html">Procedures</a></li>
    <li><a href="../../../../about/about.html">About</a></li>
</ul>  

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fifa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
    
$choices = $_POST['choices-single-defaul'];
$input_name = $_POST['input_search_keyword'];

    
#stored procedures
    
$spforage = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchAge`(IN `page` INT(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT player_name,age,overall_rating,nationality FROM personal_details WHERE personal_details.age = page;"); 

$spfornationality = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchNationality`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM personal_details WHERE personal_details.nationality=page;"); 

$spforoverallrating = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchOverallRating`(IN `page` INT(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM personal_details WHERE personal_details.overall_rating = page;"); 

$spforteam = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchTeam`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT pd.player_name,pd.overall_rating,pd.age,pd.nationality,od.club FROM personal_details pd,other_details od WHERE od.club = page AND pd.player_id = od.player_id ORDER BY pd.player_id;"); 

$spforname = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchName`(IN `page` VARCHAR(30)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM personal_details WHERE player_name = page");

$spforplayerid = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `Searchplayerid`(IN `page` INT(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM personal_details WHERE player_id = page;");

$spforposition = mysqli_query($conn, "CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchPosition`(IN `page` VARCHAR(11)) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT pd.player_name, pd.overall_rating, od.preferred_position, p.gk, p.df, p.cm, p.fr FROM personal_details pd, other_details od, position p WHERE od.preferred_position = page AND p.player_id = od.player_id AND p.player_id = pd.player_id GROUP BY pd.player_id;"); 

    
if ($choices == 'AGE' && ctype_digit(strval($input_name))) {
    $call = "CALL SearchAge('$input_name')";
?>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
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
<tbody>
    
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
// output data of each row
    while($row = $result->fetch_assoc()) { 
            echo "<tr>";
            echo("<td>" . $row["player_name"] . "</td> <td>" . $row["age"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["nationality"]. "</td>");
            echo "</tr>";
        }
    } 
}

else if ($choices == 'NATIONALITY' && !ctype_digit(strval($input_name))) {
    $call = "CALL SearchNationality('$input_name')";
?>
</tbody>
</table>
</div>
    
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
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
<tbody>
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo("<td>" . $row["player_name"] . "</td> <td>" . $row["age"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["nationality"]. "</td>");
        echo "</tr>";
        }
    } 
}
    
else if ($choices == 'OVERALL RATING' && ctype_digit(strval($input_name))) {
    $call = "CALL SearchOverallRating('$input_name')";
?>
</tbody>
</table>
</div>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
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
<tbody>
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo("<td>" . $row["player_name"] . "</td> <td>" . $row["age"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["nationality"]. "</td>");
        echo "</tr>";
    }
} 
}
    
else if ($choices == 'PLAYER ID' && ctype_digit(strval($input_name))) {
    $call = "CALL Searchplayerid('$input_name')";
?>
</tbody>
</table>
</div>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
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
<tbody>
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo("<td>" . $row["player_name"] . "</td> <td>" . $row["age"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["nationality"]. "</td>");
        echo "</tr>";
    }
}
}
    
else if ($choices == 'PLAYER NAME' && !ctype_digit(strval($input_name))) {
    $call = "CALL SearchName('$input_name')";
?>
</tbody>
</table>
</div>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
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
<tbody>
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo("<td>" . $row["player_name"] . "</td> <td>" . $row["age"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["nationality"]. "</td>");
        echo "</tr>";
    }
} 
}
    
else if ($choices == 'TEAM' && !ctype_digit(strval($input_name))) {
$call = "CALL SearchTeam('$input_name')";
?>
</tbody>
</table>
</div>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
        <th>NAME</th>
        <th>AGE</th>
        <th>OVERALL RATING</th>
        <th>NATIONALITY</th>
        <th>TEAM</th>
    </tr> 
</thead>    

</table>  
</div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<tbody>
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo("<td>" . $row["player_name"] . "</td> <td>" . $row["age"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["nationality"]. "</td><td>" . $row["club"] . "</td>");
        echo "</tr>";
    }
} 
}
    
else if ($choices == 'PLAYING POSITION' && !ctype_digit(strval($input_name))) {
    $call = "CALL SearchPosition('$input_name')";
?>
</tbody>
</table>
</div>
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
        <th>NAME</th>
        <th>PLAYING POSITION</th>
        <th>OVERALL RATING</th>
        <th colspan="4">RATING AT OTHER POSITIONS</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>GOALKEEPER</th>
        <th>DEFENDER</th>
        <th>CENTER-MID</th>
        <th>FORWARD</th>
    </tr>
</thead>    
</table>  
</div>
<div class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
<tbody>
<?php
$result = mysqli_query($conn, $call) ;
if ($result) {
// output data of each row
    while($row = $result->fetch_assoc()) { 
        echo "<tr>";
        echo("<td>" . $row["player_name"] . "</td> <td>" . $row["preferred_position"] . "</td> <td>" . $row["overall_rating"] . "</td><td>" .$row["gk"]. "</td><td>" . $row["df"] . "</td><td>" . $row["cm"] . "</td><td>" . $row["fr"] . "</td>");
        echo "</tr>";
        }
    } 
} 
    else {
        header("Location:index.html");
}

$conn->close();
?> 
</tbody>
</table>
</div>

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

<script src='../js/4032af61ca0478304ab7b31b7.js'></script>
<script  src="../js/index.js"></script>
<script src="../js/extention/choices.js"></script>
    
<script>
const choices = new Choices('[data-trigger]',
{
searchEnabled: false,
itemSelectText: '',
});
</script>
    
</body>
</html>
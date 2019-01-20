
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Modify Player Data</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

 <link rel='stylesheet' href='css/34b729901a37198f5d0414728.css'>

      <link rel="stylesheet" href="css/style.css">
<link href='https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
    <link href="css/menu.css" rel="stylesheet" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js" type="text/javascript"></script>    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/searchbar.css" rel="stylesheet" />
  
    <style>
    
    
.styling_selection {
    margin-left:200px;
    width: 70%;
    margin-top: 3%;
    padding:10px;
}
 .search_categories {
            background: red;   
/*align-items: center;*/
       font-size: 23px;
     width: 80% ;
     margin-left: 138px;

 background-image: linear-gradient(to right top, #123e80, #003462, #002843, #021a26, #030709);
/*  border: 1px solid #ccc;*/
  border-radius: 6px;

        }
        
.search {
            
        }
        
</style>
    
    
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
$database = "fifa";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$choices = $_POST["choices-single-defaul"];

if($choices=='PERSONAL DETAILS'){
header("Location:test_personal_details/inline-table-edit.php");
}
else  if($choices=='PLAYER EARNINGS'){
    header("Location:test_player_salary/inline-table-edit.php");
}

else  if($choices=='PLAYER POSITION'){
header("Location:test_player_position/inline-table-edit.php");
}

else  if($choices=='PLAYER CLUB'){
header("Location:test_player_club/inline-table-edit.php");
}
else if($choices=='PLAYER STATS'){
header("Location:test_player_stats/inline-table-edit.php");
       
}
else {
     header("Location:index.html");
//    echo "oopss";
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

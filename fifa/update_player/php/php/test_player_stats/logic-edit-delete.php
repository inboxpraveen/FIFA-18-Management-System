<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

//header('Content-Type: application/json');

include('db-connect.php');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') 
{	
    $sql = " UPDATE player_stats SET ".
        "acceleration ='" . $input['acceleration'] . "',balance ='" . $input['balance'] . "',ball_control ='" . $input['ball_control'] . "',crossing ='" . $input['crossing'] . "',curve ='" . $input['curve'] . "',dribbling ='" . $input['dribbling'] . "' ".
        " ,finishing ='" . $input['finishing'] . "',gk_kicking ='" . $input['gk_kicking'] . "',gk_positioning ='" . $input['gk_positioning'] . "' ".
        " ,penalties ='" . $input['penalties'] . "',short_pass ='" . $input['short_pass'] . "',stamina ='" . $input['stamina'] . "' ".
        ", strength= '" . $input['strength'] . "' ".
        " WHERE player_id='" . $input['player_id'] . "'";
    
	
    mysqli_query($con,$sql);
} 
if ($input['action'] === 'delete') 
{
    mysqli_query($con,"DELETE FROM player_stats WHERE player_id='" . $input['player_id'] . "'");
} 

mysqli_close($mysqli);

echo json_encode($input);
?>

<?php

	$apikey = 'A868DCA41233F1D33037A15830D5CCE7'; // API key
	$steamid = '76561198051605733'; // Community ID

	$appid = $_GET['appid'];

	$response = file_get_contents('http://store.steampowered.com/api/appdetails?appids='.$appid.''); 

	echo $response;


	
	
?>


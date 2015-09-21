<?php

	$apikey = 'A868DCA41233F1D33037A15830D5CCE7'; // API key
	$steamid = '76561198051605733'; // Community ID

	$response = file_get_contents('http://api.steampowered.com/ISteamApps/GetAppList/v2'); 

	echo $response;


	
	
?>


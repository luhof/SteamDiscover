<!doctype html>

<html>
<head>
	<title>Steam Discover</title>
	<link rel="icon" type="image/png" href="favicon.png" />
	<link rel="stylesheet" href="style/reset.css"/>
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style/main.css"/>
	<meta charset="UTF-8"/>
</head>
<body>

	<div id="menu">
		<div id="menuWrapper">

			<h1 id="logo">
				<img src="img/steamlogo.png" alt="steam logo"/> <span class="title">Steam Discover</span>
			</h1>


			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="stats.php">My Games</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>

		</div>

	</div>

	<div id="topBanner">
		&nbsp;
		<div id="bannerContent">
				Don't know what to play&nbsp;?
			<div id="hoverContent">
				Let us surprise you today !
			</div>
		</div>
	</div>

	<div id="wrapper">


		<?php
		if( (isset($_POST["steamID"])) && (!empty($_POST["steamID"]) ) ){

			$id = $_POST['steamID'];

			$apikey = 'A868DCA41233F1D33037A15830D5CCE7'; // API key
			//$steamid = $id; // Community ID

			$response = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $apikey . '&steamids=' . $id); 
			//echo ''.(var_dump($response)).'<br/>';
			$json = json_decode($response, true);
			//echo ''.(var_dump($json)).'<br/>';

			$player = $json['response']['players'][0];
			$pseudo = $player['personaname'];
			$realname = $player['realname'];
			$avatarurl = $player['avatarmedium'];

			?>

			<div id="profile">

				<div id="profilePic">
					<?php echo '<img src="'.$avatarurl.'" alt="steamPic"/>'; ?>
				</div>
				<div id="profileInfos">
					<?php
					echo '<h2>'.$pseudo.'</h2>';
					echo '<h3>'.$realname.'</h3>';
					?>
				</div>
			</div>

				<div id="gameList">
					<?php

					$response = file_get_contents('http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key='.$apikey.'&steamid='.$id.'&include_appinfo=1');
					$json = json_decode($response, true);
					$gamesArray = $json['response']['games'];
					$nbGames = $json['response']['game_count'];
					echo "<br/>Here are the ".$nbGames." games you own : <br/>";
					foreach($gamesArray as $i){
						echo '<div class="game">';
						echo '<img src="http://media.steampowered.com/steamcommunity/public/images/apps/'.$i['appid'].'/'.$i['img_logo_url'].'.jpg" onError="this.onerror=null;this.src=\'img/noPict.png\';"/><br/>';
						echo $i['name'];
						echo '</div>';
					}

					?>
				</div>
				

			
			<?php 

		}
		else{
			?>
			<div class="stats">
			<h2>Please enter your steamID in this box to see your stats</h2>
			<form method="POST" action="stats.php">
				<input type="text" name="steamID" id="steamID" required placeholder="My Steam ID"/>
				<input type="submit" value="Go !"/>
			<p><a href="http://steamid.co/" target="_blank">How to know my Steam ID ?</a></P>
			<p>If you don't have any Steam account, you can try this feature using our IDs!<br/>
			Lucas Horand - 76561198051605733<br/>
			Romain François - 76561197983224011<br/>
			</form>
			</div>
			<?php
		}

		?>


	</div>

	<footer>

		<p>Website developed by Lucas Horand & Romain François</p><br/>
		Powered by : <a class="powered" target="_blank" href="http://store.steampowered.com/about/"><i class="powered_icon"></i>Steam</a>
		<p>This site is not affiliated with Valve, Steam, or any of their partners.<br/>Copyrights 2015®</p>

	</footer>

	<script src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
</body>
</html>
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
	

	<div id="gameList">
		
		<div id="thumbs">
			
			<div id="randGame_0" class="game_thumb"></div>
			<div id="randGame_1" class="game_thumb"></div>
			<div id="randGame_2" class="game_thumb"></div>
			<div id="randGame_3" class="game_thumb"></div>
			<div id="loadingMask">
				<div class="spinner"></div>
				<div id="loadingStatus">Steam Discover is crawling through Steam Database...<br/>Please wait !</div>
				<div id="loadingStatusDetail"></div>
			</div>
		</div>

		<div id="infoGame_0" class="infoGame"></div>
		<div id="infoGame_1" class="infoGame"></div>
		<div id="infoGame_2" class="infoGame"></div>
		<div id="infoGame_3" class="infoGame"></div>

		<div id="reloadButton" onclick="startRand(tab, gameList, 0)">
			Roll 4 more games
			<img id="dice" src="img/dice.png" alt="dice"/>
		</div>
		
	
	</div>
</div>

<footer>

	<p>Website developed by Lucas Horand & Romain François</p><br/>
	Powered by : <a class="powered" target="_blank" href="http://store.steampowered.com/about/"><i class="powered_icon"></i>Steam</a>
	<p>This site is not affiliated with Valve, Steam, or any of their partners.<br/>Copyrights 2015®</p>

</footer>

<script src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
<script src="js/gameList.js"></script>
<script src="js/game.js"></script>

<script src="js/main.js"></script>
</body>
</html>


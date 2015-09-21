<!doctype html>

<html>
<head>
	<title>Steam API Test</title>
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
					<li><a href="#contact">Contact</a></li>
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


		<div id="contact">
			<h1>Contact</h1>
			<h2>Please contact us for more informations or questions</h2><hr/>
			<?php include 'traitement.php'; ?>
			<form action="contact.php" method="POST" class="contact-form">
				<div class="label"><label for="name">Name:</label></div>

				<input type="text" class="textbox" id="name" name ="name" required placeholder="My name"/><br/>
				<div class="label"><label for="email">Mail:</label></div>
				<input type="email" class="textbox" id="email" name="email" required placeholder="exemple@mail.com"><br/>
				<div class="label"><label for=message>Message:</label></div>
				<textarea class="textbox" rows=8 placeholder="Your message..." id="message" name="message"></textarea><br/>
				<input type="submit" value="Send">

				<span class="contact-notif"><?php if(isset($_SESSION['resultat'])) echo ("<center>".$_SESSION['resultat']."</center>"); ?></span>
			</form>
		</div>
	</div>

	<footer>

		<p>Website developed by Lucas Horand & Romain François</p><br/>
		Powered by : <a class="powered" target="_blank" href="http://store.steampowered.com/about/"><i class="powered_icon"></i>Steam</a>
		<p>This site is not affiliated with Valve, Steam, or any of their partners.<br/>Copyrights 2015©</p>

	</footer>

	<script src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
</body>
</html>


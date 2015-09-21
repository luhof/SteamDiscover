	var gameList = new gameList();
	var tab = new Array();

$(document).ready(function(){

		gameList.init();


	timer = setInterval(function(){
		if(gameList.isInit){
			console.log('initialized!!');
			clearInterval(timer);
			startRand(tab, gameList, 0);
		}
	}, 500);
	

})



function rollRandGame(game, gameList){

	game.getRandom(gameList.gameTab, gameList.length);
	game.getDetails(game.id);

}


function startRand(tab,gameList, i){

	//loading animation update
	$("#loadingMask").fadeIn();
	$("#loadingStatus").html("Steam Discover will now choose 4 random games just for you,<br/>please hold on for a sec !");
	
	tab[i] = new Game();
	rollRandGame(tab[i], gameList);
	gameInterval = setInterval(function(){
			if(tab[i].isInit){
				if(tab[i].type!="game"){
					clearInterval(gameInterval);
					startRand(tab, gameList, i);
					
				}
				else if (i<4){
					
					clearInterval(gameInterval);
					$("#loadingStatusDetail").html("Game "+(i+1)+" out of 4 found !");
					tab[i].displayGame(i);
					i++;
					startRand(tab, gameList, i);
				}
				else{
					$("#loadingMask").fadeOut();
					$("#loadingStatusDetail").html("");
					
					clearInterval(gameInterval);
					
				}

				
			}
		}, 300);

}
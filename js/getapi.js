$.ajaxSetup({
    beforeSend:function(){
        $("#loading").show();
    },
    complete:function(){
        $("#loading").hide();
    }
});

$( document ).ready(function() {
 	console.log("loading");
 	myCall();
 	console.log("done");

 	var gameList = 0;
 	var gameListLength = 0;

});



function myCall() {
		var request = $.ajax({
			url: "getsteam.php",
			success:function(msg){
				console.log("win");
			},
			error:function(msg){
				console.log("fail");
			},
		});

		
		request.done(function(msg) {
			//console.log(msg);
			msg = JSON.parse(msg);
			gameList = msg;
			length = msg.applist.apps.length;
			gameListLength = length;
			selectRandGame(msg, length);
		});
		


}

function selectRandGame(msg, length){
	selected = Math.floor((Math.random())*length);
	console.log("selected : "+selected);
	result = callDetails(msg.applist.apps[selected]['appid']);
	console.log("result : "+result);

	//while(callDetails(msg.applist.apps[selected]['appid']) == (0) ) console.log("wouhouh"); // si pas de type on relance
	$("#randGame").html("<h2><b>Appid :</b></h2>"+msg.applist.apps[selected]['appid']+"<br/><h1>"+msg.applist.apps[selected]['name']+"</h1>");
}

function callDetails(appid){
	console.log("calldetails launched with appid = "+appid+".");
		var request = $.ajax({
			url: 'getDetails.php?appid='+appid+'',
			success:function(msg){
				console.log("done");
			},
			error:function(msg){
				console.log("not done");
			},
		});

		
		type = request.done(function(msg) {
			
			msg = JSON.parse(msg);
			gameDetails = msg[appid].data;

			try{
				type = gameDetails.type;
			}
			catch(err){
				console.log("PAS DE TYPE");
				return type;
			}
			if(type == 'game'){
				type = gameDetails.type;
				free = gameDetails.is_free;
				desc = gameDetails.about_the_game;
				image = gameDetails.header_image;
				if(!free && type == "game"){
					price = gameDetails.price_overview.final/100;
				}
				else{
					price = 0;
				}
			}
			else return type;
		});

return type;

}

function displayDetails(type, price, desc, image){
	$("#randGame").append("<img src='"+image+"' alt='header'/>");
	$("#randGame").append("<br/><h2>Type :"+ type+"</h2>");
	$("#randGame").append("<br/><h2>Prix : "+price+" \u20AC</h2>");
	$("#randGame").append("<br/><h2>Description : </h2><br/>"+desc);
}
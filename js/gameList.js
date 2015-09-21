function gameList(){

	this.gameTab = 0;
	this.length = 0;
	this.isInit = false;

}

gameList.prototype.init = function(){


	obj = this;

	var request = $.ajax({
			url: "getsteam.php",
			success:function(msg){
				msg = JSON.parse(msg);
				obj.fillData(msg);
				obj.isInit = true;
			},
			error:function(msg){
				console.log("error");
			},
		});
	
}

gameList.prototype.fillData = function(msg){
	this.gameTab = msg.applist.apps;
	this.length = msg.applist.apps.length;
	console.log("data filled in object");
}
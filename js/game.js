$.ajaxSetup({
    beforeSend:function(){
        $("#loading").show();
    },
    complete:function(){
        $("#loading").hide();
    }
});

function Game(){

	this.isInit = false;
	this.isFound = false;

	this.id = 0;
	this.name = 0;
	this.price = 0;
	this.type = 0;
	this.desc = 0;
	this.img = 0;
	this.requirements = 0;
	this.languages = 0;
	this.dev = 0;

}



Game.prototype.getRandom = function(tab, length){
	selected = Math.floor((Math.random())*length);
	this.id = tab[selected]['appid'];
}

Game.prototype.getDetails = function(appid){

		obj = this;
		obj.isInit = false;

		var request = $.ajax({
			url: 'getDetails.php?appid='+appid+'',
			success:function(msg){
				msg = JSON.parse(msg);
				gameDetails = msg[appid].data;
				obj.fillData(msg);
				obj.isInit = true;

			},
			error:function(msg){
				console.log("not done");
			},
		});
		

}

Game.prototype.fillData = function(msg){
	tempId = this.id;
	data = msg[tempId].data;
	try{
		this.type = data.type;
	}
	catch(err){
		//console.log("undefined game");
		this.type = 0;
		return 1;
	}

	isFree = data.is_free;
	if(!isFree){
		try{
			this.price = data.price_overview.final/100;
		}catch(e){
			console.log("final price not defined");
			try{
				this.price = data.price_overview.initial/100;
			}
			catch(e){
				//console.log("initial price not defined");
				this.price = "non communiqué";
			}
		}
	}
	else{
		this.price = "Gratuit !";
	}

	this.name = data.name;
	this.desc = data.about_the_game;
	this.img = data.header_image;
	try{
		this.requirements = data.pc_requirements.minimum;
	}catch(e){
		console.log("pas de pc requirements");
		this.requirements = "NC";
	}
	this.languages = data.supported_languages;
	this.dev = data.developers;
	if(this.dev == undefined) this.dev = "NC";


	

	return 0;

}

Game.prototype.displayGame = function(i){
	div = $("#randGame_"+i+"");
	div.html("");
	div.append("<a class='fancybox' rel='group' href='#infoGame_"+i+"'><img class='imageGame'src='"+this.img+"' alt='' /></a>");

	div2 = $("#infoGame_"+i+"");
	div2.html("");
	//div2.append("<h4>appid : "+this.id+"</h4>");
	div2.append("\
		<h1>"+this.name+"</h1>\
		<img class='imageGame2' src='"+this.img+"'/>\
		<h2>Description : </h2>\
		<p class='gameDescription'>"+this.desc+"</p><br/>\
		<table>\
			<tr>\
				<td>PC Requirements :</td>\
				<td> "+this.requirements+"</td>\
			</tr>\
			<tr>\
				<td>Supported languages :</td>\
				<td>"+this.languages+"</td>\
			</tr>\
			<tr>\
				<td>Developed by</td>\
				<td>"+this.dev+"</td>\
			</tr>\
		</table>"
	);

	if(isNaN(this.price)) div2.append("<h1>PRIX : "+this.price+"</h1>");
	else div2.append("<h1>PRICE : "+this.price+"\u20AC</h1>");
	div2.append("<a class='buyLink' target='_blank' href='http://store.steampowered.com/app/"+this.id+"/'><h2>Buy it !</h2></a>");

	
	$(".fancybox").fancybox({

		'arrows':false,
		'autoSize':false,
		'width':1000,
		
	});

}
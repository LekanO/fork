var Result = function() {

	this.__construct = function() {
		console.log('Result Created');
	};


	this.success = function(msg) {
		if(typeof msg === "undefined"){
			$("#success").html("success").fadeIn();
		}else{
			$("#success").html(msg).fadeIn();
		}
	};

	this.error = function(msg) {

		if(typeof msg === "undefined"){
			$("#error").html("error").fadeIn();
		}

		if(typeof msg === "object"){

			var output = '<ul>';
				for(var key in msg){
					output+= '<li>' + msg[key] + '</li>';
				}
				output+= '</ul>';
				
				$("#error").html(output).fadeIn();

				setTimeout(function(){
					$("#error").fadeOut();
				}, 5000);
			}
			else{
				$("#error").msg.fadeIn();
			}
	};

	this.__construct();
};
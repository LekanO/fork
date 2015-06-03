var Event = function() {

	this.__construct = function(){

		console.log('Event Created');
	//	Template = new Template();
		create_todo();
		create_note();

	};

	// -------------------------------------------------------

	var create_todo = function() {
		$('#create_todo').submit(function(evt) {
		
			var url = $(this).attr('action');
			var postData = $(this).serialize();

			$.post(url, postData, function(o){

				if(o.result == 1 ) {
					Result.success('success');
					var output = Template.todo(o.data[0]);
					$('#list_todo').prepend(output);
				}else{
					Result.error(o.error);
				}

			}, 'json');

			return false;

		});
	};

	// -------------------------------------------------------

	var create_note = function() {

		$('#create_note').submit(function(evt){
			Result.success();
			return false;
		});
	};

// -------------------------------------------------------

	var delete_todo = function() {

	};

// -------------------------------------------------------

	var delete_note = function() {

	};

	this.__construct();
};
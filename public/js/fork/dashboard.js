var Dashboard = function() {

	this.__construct = function(){
		console.log('Dashboard Created');

		Result = new Result();
		Template = new Template();
		Event = new Event();
		load_todo();

		console.log(Template.todo({todo_id:1, content: 'This is the content'}));

		console.log(Template.note({note_id: 1, title: 'Note Title', content: 'This is note id content'}));

};

	var load_todo = function(){
		$.get('api/get_todo', function(o){
			var output = '';
			for(var i = 0; i < o.length; i++){
				output+= Template.todo(o[i]);
			}
			$('#list_todo').html(output);
		}, 'json');
	};

	var load_note = function() {

	};

	this.__construct();
};
let axios = require('axios');

$('body').on('click', '.delete-bookmark', function(){
	let id = $(this).data('id');
	axios.get('/bookmarks/' + id).then(function(){
		window.location.reload();
	}).catch(function(error){
		console.log(error);
	});
})
var interval = null;
var sendForm = document.getElementById('chForm');


$(document).ready(function(){
	$('#send').click(function () {
		let authors_login = $('#authors_login').val();
			console.log("author",authors_login);
		let message = $('#message').val();
			console.log("message",message);

		$.ajax({
			url: '../components/chat_send_mes.php',
			type: 'POST',
			cache: false,
			data: {'authors_login' : authors_login, 'message' : message},
			dataType: 'html',
			success: function(data) {
				if(data !='') {
					$('#send').text('Все готово');
					$('#errorBlock').hide();
				}else {
					$('#errorBlock').show();
					$('#errorBlock').text(data);
				}
			}
		});
	});

});

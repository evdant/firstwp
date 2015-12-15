$(document).ready(function() {
	$('#btn_send').click(function() {

		var error = false;

		$message = $('#message').val();
		$email = $('#inp_email').val();
		$name = $('inp_name').val();

		var regEmail = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;

		if (($name == "") || ($message == "")) {
			alert("Все поля обязательны!");
			error = true;
		} else if ((!regEmail.test($email)) || ($email == "")) {
			alert("Ошибка в E-Mail");
			error = true;
		}

		if (!error) {
			$.ajax({
				url: ajax_url,
				data: {
					'action': 'send_message',
					'email': $email,
					'name': $name,
					'message': $message
				},
				success: function(text){
					$('#btn_send').show();
					$('#ajax_loader').hide();
					$('#ajax_success').show(300, function(){
						$(this).delay(2000).hide(300);
					});
				},
				beforeSend: function(){
					$('#btn_send').hide();
					$('#ajax_loader').show();
				},
				error: function(){
					$('#btn_send').show();
					$('#ajax_loader').hide();
				}
			});
		}
		
	});
});
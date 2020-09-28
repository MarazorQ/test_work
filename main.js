//авторизация
$('.btn').click(function(e){

	e.preventDefault();
	
	let login = $('input[name="login"]').val(),
		password = $('input[name="password"]').val();

	$.ajax({
		url: 'log_in.php',
		type: 'POST',
		dataType: 'text',
		data: {
			login: login,
			password: password
		},
		success: function (data){
			console.log(data);
		}
	});

	console.log('fgf');
	
});
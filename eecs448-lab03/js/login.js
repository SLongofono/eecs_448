var username = "Bob";
var password = "rockchalk"

$('#submitCredentials').click(function(){
	console.log('Clicked submit');
	if($('#uname').val() == username && $('#pass').val() == password){
		$('#feedback').html('Welcome, ' + $('#uname').val() + '!');
		console.log('Correct credentials');
	}
	else{
		$('#feedback').html('Invalid username or password.');
		console.log('invalid credentials');
	}
});

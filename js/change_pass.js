
$(document).ready(function(e) {
    $('#sub-btn').on('click',function(){
		var cur_pass = $('#cur_pwd').val();
		var new_pass = $('#new_pass').val();
		var confirm_pwd = $('#confirm_pwd').val();
		var exist_pwd = $('#check_pwd')	.val();
		var dataString = 'cur_pwd='+cur_pass+'&password='+new_pass+'&confirm_pwd='+confirm_pwd;
		
		if((cur_pass == '') && (new_pass == '') && (confirm_pwd == '')) {
			$('.confirm_pwd_help').text(' ');
			$('.confirm_pwd_help').text('All fields are mandatory');
		} else if(cur_pass != exist_pwd){
		$('.confirm_pwd_help').text('Invalid current password');
		} else if(new_pass != confirm_pwd){
			$('.confirm_pwd_help').text('Password not match plz try again');
		} else {
			$.ajax({
			type:"POST",
			url:"change_passseek.php",
			data:dataString,
			success: function(){
			$('.confirm_pwd_help').text('Password Changed Successfully');
			window.setTimeout(function(){location.reload()},2000) 
			}	
			});
			}
	});
});

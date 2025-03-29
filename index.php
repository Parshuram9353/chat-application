<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="outer">
		<div id="header">
			<div id="headerfirst">
				<div id="logo">
					<h2>Chat Application</h2>					
				</div>
			</div>	
		</div>
	</div>
	<div id="outerbox">
		<div id="inner1">
			<h2>Sign In</h2>
		</div>
		<div id="inner2">
			<form id="sample_form" method="POST" enctype="multipart/form-data">
				<div id="profilesection">
					<table>
						<tr>
							<td>
								<label><b>Username</b></label><br>
								<input type="text" name="user_name" value="" autocomplete="off" required="required"/><br>
								<span id="user_name_error"></span><br>
							</td>
						</tr>
						<tr>
							<td>
								<label><b>Password</b></label><br>
								<input type="password" name="password" value="" id="pwd" autocomplete="off" required="required" />
								<i class="fa fa-eye fa-1x" aria-hidden="true" style="font-size: 18px" id="eye"></i><br>
								<span id="password_name_error"></span>
							</td>
						</tr>
					</table>
					<div id="submitbutton">
						<input type="button" name="reset" value="Sign Up" id="signup" />
						<input type="submit" name="submit" value="Sign In"  />
					</div>
					<div id="importantnote">
						<label id="importantnoteerror"></label>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="footer">
			
		</div>
	</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		var pwd=document.getElementById('pwd');
		var eye=document.getElementById('eye');
		eye.addEventListener('click',open);
		function open()
		{
			if(pwd.type== 'password')
			{
				pwd.type = 'text';
				eye.style.color='#2f3542';
			}
			else
			{
				pwd.type = 'password';
				eye.style.color='unset';
			}
		}
	</script>
<script>
	$(document).ready(function(){
		$('#signup').on('click', function(event){
			window.location='registration.php';
		});
		$('#sample_form').on('submit', function(event){
			$('#user_name_error').text('');
			$('#password_name_error').text('');
			$('#importantnoteerror').text('');
			event.preventDefault();
			$.ajax({
				url:"signin.php",
				method:"POST",
				data: new FormData(this),
				dataType:"json",
				contentType:false,
				cache:false,
				processData:false,
				success:function(data)
				{
					if(data.error==1)
					{
						alert('Welcome');
						window.location='dashboard.php';
					}
					else if(data.error==2)
					{
						$('#importantnoteerror').text(data.importantnote_message);
					}
					else
					{
						$('#user_name_error').text(data.user_name_message);
						$('#password_name_error').text(data.password_message);
					}
				}
			})
		});
	});
	</script>
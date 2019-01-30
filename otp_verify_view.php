<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<style>
body {
    background-color: #f1f1f1;
  }
  .login-container{
  	width: 600px; margin: 150px auto 0 auto; background: #fff;
  	-webkit-box-shadow: 0px 0px 12px 0px rgba(0,0,0,0.50);
	-moz-box-shadow: 0px 0px 12px 0px rgba(0,0,0,0.50);
	box-shadow: 0px 0px 12px 0px rgba(0,0,0,0.50);
  }
  .login-container .row{margin: 0;}
  .logoblock {
	    background: #ebe8ff;
	    text-align: center;
	    padding: 140px 0 0 0;
	}
	.logoblock img{
		margin-bottom: 50px;
	}
  .formblock{padding: 65px 40px 60px 30px;}
  input{outline: none;}
  .form-control:focus, .btn.focus, .btn:focus{box-shadow: none}
</style>
</head>
<body class="login">
  <main>
  	<div class="login-container">
  		<div class="row">
  		<div class="col-md-6 logoblock">
  			<img src="<?php echo base_url(); ?>img/dashboard-logo.png" />
  		</div>
  		<div class="col-md-6 formblock">
  			<h2>Login</h2>
  			<form method="post" autocomplete="off">
<?php if(ISSET($session_check ) && $session_check != ''){?>
<p id="otp_mssg" style="color:green">Verification code has been sent to your mail.Please verify to reset password!!</p>
				 <input type ="hidden" id="email_check" value="<?php echo $email; ?>">
				 <input type ="hidden" id="otp_show_status" value="<?php echo $session_check; ?>">
				<div class="form-group" id="show_otp">
					<label for='email'>OTP</label>
					<input class="form-control" type='text' name='fotp' id='fotp' placeholder="Enter OTP" />
					<p id="ferror" style="color:red;">
				</div>
				<button type="submit" class="btn btn-primary" id="btn_otp">Validate OTP</button>
				<?php } ?></form>
	</div>
  	</div>
  	</div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
	$(document).on('click','#btn_otp',function(event){
		$("#otp_mssg").empty();
	        event.preventDefault();
		   var email = $("#email_check").val();
		   var otp_check = $("#otp_show_status").val();
		   var otp = $("#fotp").val();
		   if(otp == ''){
		   	$("#ferror").html('otp field cannot be empty!');
		   }
		   else if(otp != otp_check){
		     $("#ferror").html('otp didnt matched!');
		   }else{
		   	$("#ferror").html("Verification code successfully verified").css('color','green');
				  setTimeout(function(){
				window.location.href='<?php echo base_url(); ?>Forgot_password/reset_password';
				  },3000);
           }
		});
	});
</script>	
  </body>
</html>		
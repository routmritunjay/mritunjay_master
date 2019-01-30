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
<p style="color:green">Verification code has been verified.Please Reset you password!!</p>
				 <input type ="hidden" id="email_check" value="<?php echo $email; ?>">
				<div class="form-group" id="show_pass">
					<label for='email'>Password</label>
					<input class="form-control" type='password' name='fpass' id='fpass' placeholder="Enter Password" />
					<p id="email_error" style="color:red;">
				</div>
				<div class="form-group" id="show_cnf_pass">
					<label for='email'>Confirm Password</label>
					<input class="form-control" type='password' name='fcnfpass' id='fcnfpass' placeholder="Enter Confirm Password" />
					<p id="ferror" style="color:red;">
				</div>
				<button type="submit" class="btn btn-primary" id="btn_otp">Reset Password</button>
				<p id="pid" style="color:red;"></p>
				<?php } ?></form>
	</div>
  	</div>
  	</div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
	$(document).on('click','#btn_otp',function(event){
	        event.preventDefault();
		   var email = $("#email_check").val();
		   var password = $("#fpass").val();
		   var conf_pwd = $("#fcnfpass").val();
		   if(password == ''){
		     $("#ferror").html('password cannot be empty!');
		   }
		   else if(password != conf_pwd){
		     $("#ferror").html('password and confirm password didnt matched!');
		   }else{
                    $.ajax({
				  	type:"POST",
					url:"<?php echo base_url(); ?>Adminprofile/updatepwd",
				 	data:{
				    "email":email,
				    "password":password
				},
				success:function(response){
				console.log(response);
				if(response == "true"){
				alert("Your password reset has been successfully completed.Please login now!!");
				window.location.href='<?php echo base_url(); ?>';
		      }
		     }
            });
           }
		});
	});
</script>	
  </body>
</html>		
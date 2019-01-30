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
				<div class="form-group">
					<label for='email'>Email ID</label>
					<input class="form-control" type='email' name='email' id='email' placeholder="Enter Email Id" />
					<p id="email_error" style="color:red;">
				</div>
				<div class="form-group">
					<label for='password'>Password</label>
					<input class="form-control" type='password' name='password' id='pwd' placeholder="Enter Pasword" />
					<p id="pwd_error" style="color:red;">
				</div>
				<button type="submit" class="btn btn-primary" id="btn_submit">Login</button>
				<p id="pid" style="color:red;"></p>
				<a href="<?php echo base_url(); ?>Forgot_password">Forgot Password</a>
          	</form>
  		</div>
  	</div>
  	</div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script>
	$(document).ready(function(){
$(document).on('click','#btn_submit',function(event){
            event.preventDefault();
			var email = $("#email").val();
			var password = $("#pwd").val();
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			var errors = "";
			if(email == ""){
			errors = "Email cannot be empty!";
			$("#email_error").html(errors);
			}
			else if(!validateemail(email)){
			 errors = "Invalid Email!";
			  $("#pwd_error").html(errors);
		   }	
			else if(password == ""){
			  $("#email_error").empty();
			errors = "Password cannot be empty!";
			$("#pwd_error").html(errors);
			}
			else if(email != "" && password != ""){
			  $("#pwd_error").empty();
				$.ajax({
				  	type:"POST",
					url:"<?php echo base_url(); ?>Login/checklogin",
				 	data:{
				    "email":email,
				    "password":password
				},
				 dataType:'json',
				success:function(response){
				  console.log(response);
				  $("#pid").empty();
				    if(response){
				    	if(response == "false"){
				           $("#pid").append("Invalid username or password");
				    	}else{
				    		if(response.length == 0){
                            window.location.href="<?php echo base_url(); ?>Employeedashboard";
				    		}else if(response == 1){
                            window.location.href="<?php echo base_url(); ?>AdminDashboard";
				    		}else if(response !=1){
				    	$.each(response,function(key,value){
                            var roles = value.roles;
                            if(roles == 1 || roles == 5 || roles == 4 || roles == 7){
                            	window.location.href="<?php echo base_url(); ?>AdminDashboard";
                            }else if(roles == 2 || roles == 0){
                            	window.location.href="<?php echo base_url(); ?>Employeedashboard";
                            }else if(roles == 3){
                            window.location.href="<?php echo base_url(); ?>Hrdashboard";
				    		}
				    	});}}
				}else if(response == "false"){
				  $("#pid").append("Invalid username or password");
				}
				}
			});
			}
	 	});
	});



	function validateemail(sEmail){
var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if (filter.test(sEmail)) {
        return true;
    }else{
        return false;
    }
	}
</script>
</body>
</html>
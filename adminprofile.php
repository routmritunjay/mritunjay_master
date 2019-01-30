 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Leaf Lite - Free Bootstrap Admin Template">
   <meta name="author" content="ﾅ「kasz Holeczek">
   <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
   <link rel="shortcut icon" href="images/favicon.png">
   <title>Intelexsystemsinc.com</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <!-- Icons -->

   <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">
     
   <!-- Main styles for this application -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link href="css/dashboard.css" rel="stylesheet">
   
   <!-- Styles required by this views -->
 
 </head>
 
 
  <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">Admin Profile</li>
       </ol>
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
           <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Update Profile</div>
                  <div class="panel-body" style="overflow: hidden;">
                    <form action="/action_page.php">
                      <div class="form-group col-md-6">
                          <label for="email">First Name</label>
                          <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="First Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Last Name</label>
                          <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="Last Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">DOB</label>
                          <input type="date" class="form-control" id="dob" placeholder="Enter DOB" name="DOB">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <!-- <div class="form-group col-md-6" style="clear: both">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div> -->
                        <div class="form-group col-md-6" style="clear: both;">
                          <label for="email">Employee Id</label>
                          <input type="number" class="form-control" id="emplyeeId" placeholder="Enter Employee Id" name="Employeeid">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Phone Number </label>
                          <input type="number" class="form-control" id="PhoneNumber" placeholder="Enter Phone Number" name="Phone Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Blood Group</label>
                          <input type="text" class="form-control" id="bloogroup" placeholder="Enter Blood Group" name="Blood group">
                        </div>
                        <div class="form-group col-md-12" style="clear: both;">
                          <button type="button" class="btn btn-default" id="btn_submit">Update</button>
                          <p id="errors" style="color:red; font-size:15px;"></p>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">Change Password</div>
                  <div class="panel-body" style="overflow: hidden;">
                      <form action="/action_page.php">
                        <div class="form-group col-md-5">
                            <label for="email">New Password</label>
                            <input type="password" class="form-control" id="new_pwd" placeholder="New Password" name="First Name">
                          </div>
                          <div class="form-group col-md-5">
                            <label for="email">Confirm New Password</label>
                            <input type="password" class="form-control" id="cnfm_pwd" placeholder="Confirm New Password" name="Last Name">
                          </div>
                          <div class="form-group col-md-12" style="clear: both;">
                            <button type="button" class="btn btn-default" id="btn_pwd">Change Password</button>
                            <p id="pwd_errors" style="color:red; font-size:15px;"></p>
                          </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      </div>
   <footer class="app-footer footerbg">
     <span><a href="https://genesisui.com/bootstrap-admin-template.html?id=leaf">Intelex Systems </a> ﾂｩ 2018 Intelex Systems Inc.</span>
     <span class="ml-auto">Powered by <a href="https://genesisui.com/bootstrap-admin-template.html?id=leaf">Intelex Systems Inc </a></span>
   </footer>
 
   <!-- Bootstrap and necessary plugins -->
   <script src="vendors/js/jquery.min.js"></script>
   <script src="vendors/js/popper.min.js"></script>
   <script src="vendors/js/bootstrap.min.js"></script>
   <script src="vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="vendors/js/Chart.min.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="js/views/.main.js"></script>

   <script>
$(document).ready(function(){
  $("#btn_submit").click(function(){
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var dob = $("#dob").val();
    var email = $("#email").val();
    var errors = "";
    if(first_name == ""){
    errors = "First name cannot be empty!";
    $("#errors").html(errors);
    }
    else if(last_name == ""){
    errors = "Last name cannot be empty!";
    $("#errors").html(errors);
    }
    else if(dob == ""){
    errors = "Date of birth cannot be empty!";
    $("#errors").html(errors);
    }else if(email == ""){
    errors = "Email cannot be empty!";
    $("#errors").html(errors);
    }
    else if(email != ""){
        var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var dob = $("#dob").val();
    var email = $("#email").val();
        // var password = $("#pwd").val();
    var employee_id = $("#emplyeeId").val();
    var phn_number = $("#PhoneNumber").val();
    var blood_group = $("#bloogroup").val();
    // if(password == ""){
    // errors = "Password cannot be empty!";
    // $("#errors").html(errors);
    // }
     if(employee_id == ""){
    errors = "Employee id cannot be empty!";
    $("#errors").html(errors);
    }
    else if(phn_number == ""){
    errors = "Phone number cannot be empty!";
    $("#errors").html(errors);
    }
    else if(blood_group == ""){
    errors = "Blood group cannot be empty!";
    $("#errors").html(errors);
    }
    else{
      $.ajax({
      type:"POST",
    url:"Adminprofile/updateuser",
     data:{
        "first_name":first_name,
        "last_name":last_name,
        "dob":dob,
        "email":email,
        // "password":password,
        "employee_id":employee_id,
        "phn_number":phn_number,
        "blood_group":blood_group
    },
    success:function(response){
      console.log(response);
      $("#errors").html("Your data has been successfully updated!!");
      setTimeout(function(){
       location.reload();
       },1000);
    }
    });
      }
    }
  });
 });

$(document).ready(function(){
  $("#btn_pwd").click(function(){
    var password = $("#new_pwd").val();
    var cnfm_password = $("#cnfm_pwd").val();
    var errors = "";
    if(password == ""){
    errors = "Password cannot be empty!";
    $("#pwd_errors").html(errors);
    }
    else if(cnfm_password == ""){
    errors = "Confirm password cannot be empty!";
    $("#pwd_errors").html(errors);
    }
    else if(password != cnfm_password){
    errors = "Password and confirm password didn't matched!";
    $("#pwd_errors").html(errors);
    }else{
      $.ajax({
      type:"POST",
    url:"Adminprofile/updatepassword",
     data:{
        "password":password,
    },
    success:function(response){
      console.log(response);
       $("#pwd_errors").html("Your password has been successfully updated!!").css("color", "green");
      setTimeout(function(){
       location.reload();
       },1000);
    }
    });
      }
  });
 });
   function deleteuser(id){
      $.ajax({
        type:"POST",
      url:"Adminprofile/getuser",
       data:{
          "id":id,
      },
      success:function(response){
        console.log(response);
        alert("Your data has been successfully deleted");
        location.reload();
      }
      });
  }
$(document).ready(function(){
    $.ajax({
      type:"POST",
    url:"Adminprofile/getuser",
            dataType: "json",
     data:{
    },
    success:function(response){
      console.log(response);
      $.each(response,function(key,value){
        $("#userId").val(value.user_id);
    $("#first_name").val(value.first_name);;
    $("#last_name").val(value.last_name);
    $("#email").val(value.email);
    $("#PhoneNumber").val(value.phone_number);
    $("#emplyeeId").val(value.uniqueID);
    $("#pwd").val(value.password);
    $("#dob").val(value.dob);
    $("#bloogroup").val(value.blood_group);
      });
    }
    });
});




$(document).ready(function(){
   $("#btn_edit").click(function(){
    var id  = $("#userId").val();
  var first_name = $("#first_name").val();
  var last_name = $("#last_name").val();
  var dob = $("#dob").val();
  var email = $("#email").val();
  var password = $("#upwd").val();
  var employee_id = $("#uemplyeeId").val();
  var phn_number = $("#uPhoneNumber").val();
  var blood_group = $("#ubloogroup").val();
  $.ajax({
    type:"POST",
  url:"Adminprofile/updateuser",
   data:{
    "id":id,
      "first_name":first_name,
      "last_name":last_name,
      "dob":dob,
      "email":email,
      "password":password,
      "employee_id":employee_id,
      "phn_number":phn_number,
      "blood_group":blood_group
  },
  success:function(response){
    console.log(response);
    alert("Your data has been successfully updated");
    location.reload();
  }
  });
   });
});


 function logout(){
    $.ajax({
  type:"POST",
url:"AdminDashboard/logout",
 data:{
  },
  success:function(response){
  console.log(response);
  location.reload();
}
});
}
   </script>
 
 </body>
 </html>

Success!
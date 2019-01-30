<!--
 * GenesisUI Lite - Free Bootstrap Admin Template
 * @version v1.8.12
 * @link https://genesisui.com/bootstrap-admin-template.html?id=leaf
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license Free for non-commercial use
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
   
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Leaf Lite - Free Bootstrap Admin Template">
   <meta name="author" content="Łukasz Holeczek">
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
   <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   
   <!-- Styles required by this views -->
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">Employee Management</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-sm-12">
             <a href="Employeadd"><input type="button" class="btn green" value="Add New Employee"></a>
            </div>
          </div>
        </div>
        <p id="ins_errors" style="color:red;"></p>
          <div class="panel panel-default">
            <div class="panel-heading">Employee List</div>
            <div class="panel-body">
                <table class="table table-bordered" id="myiTable">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Employee-Id</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                	<?php foreach($details as $details){ ?>
                  <tr>
                    <td><?php echo $details->first_name; ?></td>
                    <td><?php echo $details->email; ?></td>
                    <td><?php echo $details->uniqueID; ?></td>
                    <td><i class="fa fa-pencil-square-o green" aria-hidden="true" onclick="edituser_management('<?php echo $details->uniqueID; ?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick="deleteuser('<?php echo $details->uniqueID; ?>')"></i></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
             </div>
           </div>
         </div>
       </div>
     </main>
   </div>


   <div class="modal fade edituser" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
         <div class="form-group col-md-6">
          <input type="hidden" id="userId">
          <input type ="hidden" id="prvemplyeeId">
                          <label for="email">First Name</label>
                          <input type="text" class="form-control" id="ufirst_name" placeholder="Enter First Name" name="First Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Last Name</label>
                          <input type="text" class="form-control" id="ulast_name" placeholder="Enter Last Name" name="Last Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Department</label>
                          <input type="text" class="form-control" id="udept" placeholder="Enter Department" name="em_department">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Employee Id</label>
                          <input type="number" class="form-control" id="uemplyeeId" placeholder="Enter Employee Id" name="Employeeid">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="uemail" placeholder="Enter email" name="email">
                        </div>
                         <div class="form-group col-md-6">
                          <label for="email">Phone Number </label>
                          <input type="number" class="form-control" id="uPhoneNumber" placeholder="Enter Phone Number" name="Phone Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">DOB</label>
                          <input type="date" class="form-control" id="udob" placeholder="Enter DOB" name="DOB">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="upwd" placeholder="Enter password" name="pwd">
                        </div>
                        <div class="form-group col-md-6" style="clear: both;">
                          <label for="email">Blood Group</label>
                          <input type="text" class="form-control" id="bloogroup" placeholder="Enter Blood Group" name="Blood group">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Present Address</label>
                          <input type="text" class="form-control" id="em_present_address" placeholder="Enter present address" name="em_present_address">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Permanent Address</label>
                          <input type="text" class="form-control" id="em_permanent_address" placeholder="Enter Permanent address" name="em_permanent_address">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Emergency Contact Number</label>
                          <input type="text" class="form-control" id="em_econtact" placeholder="Enter contact  number" name="em_econtact">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Date Of Joining</label>
                          <input class="form-control datepicker" id="date_joining" name ="date_joining" placeholder="enter date_joining" onchange ="date_joining_cal();">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Probation Period</label>
                         <input type="text" class="form-control datepicker" id="probation_period" name ="probation_period" placeholder="Probation period">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Project Manager</label>
                          <select class = "form-control" id="project_manager" placeholder="Enter Project Manager" name="project_manager">
                            <option value ="">Select an Option</option>
                            <?php foreach($rep_manager as $rep_manager){ ?>
                            <option value ="<?php echo $rep_manager->employee_name ; ?>"><?php echo $rep_manager->first_name ; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                       <div class="form-group col-md-12" style="clear: both;">
                          <button type="button" class="btn btn-default" id="btn_edit_user_management">Update User</button>
                          <p id="errors" style="color:red; font-size:15px;"></p>
                        </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div>
<footer class="app-footer footerbg text-center">Intelex Systems © 2018 Intelex Systems Inc. </footer>
   <!-- Bootstrap and necessary plugins -->
   <script src="vendors/js/jquery.min.js"></script>
   <script src="vendors/js/popper.min.js"></script>
   <script src="vendors/js/bootstrap.min.js"></script>
   <script src="vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="vendors/js/Chart.min.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="js/views/.main.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="js/all_functions.js"></script>
   <script>
     $(document).ready( function () {
      $('.datepicker').datepicker({
           dateFormat: 'dd-mm-yy'
      });
});
   	$(document).ready( function () {
    $('#myiTable').DataTable();
      });

    function edituser_management(id){
$.ajax({
  type:"POST",
url:"Admin_usermanagement/getuser",
        dataType: "json",
 data:{
    "id":id,
},
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    $("#userId").val(value.user_id);
    $("#ufirst_name").val(value.first_name);;
    $("#ulast_name").val(value.last_name);
    $("#uemail").val(value.email);
    $("#uPhoneNumber").val(value.phone_number);
    $("#uemplyeeId").val(value.uniqueID);
    $("#prvemplyeeId").val(value.uniqueID);
    $("#upwd").val(value.password);
    $("#udob").val(value.dob);
    $("#bloogroup").val(value.blood_group);
    $("#em_present_address").val(value.present_address);
    $("#em_permanent_address").val(value.permanent_address);
    $("#em_econtact").val(value.emergency_contact_number);
    $("#udept").val(value.employee_dept);
    $("#date_joining").val(value.date_joining);
    $("#probation_period").val(value.probation_period);
    $("#project_manager").val(value.project_manager);
    $('#myModal').modal('show');
  });
}
});
}


$(document).ready(function(){
$("#btn_edit_user_management").click(function(){
var id  = $("#userId").val();
var first_name = $("#ufirst_name").val();
var last_name = $("#ulast_name").val();
var em_department = $("#udept").val();
var dob = $("#udob").val();
var email = $("#uemail").val();
var password = $("#upwd").val();
var employee_id = $("#uemplyeeId").val();
var prvmp_id = $("#prvemplyeeId").val();
var phn_number = $("#uPhoneNumber").val();
var blood_group = $("#bloogroup").val();
var present_address = $("#em_present_address").val();
var permanent_address = $("#em_permanent_address").val();
var alt_contact_number = $("#em_econtact").val();
var date_joining = $("#date_joining").val();
var probation_period = $("#probation_period").val();
var project_manager = $("#project_manager").val();
if(first_name == ""){
errors = "First name cannot be empty!";
$("#errors").html(errors);
}
else if(last_name == ""){
errors = "Last name cannot be empty!";
$("#errors").html(errors);
}
else if(em_department == ""){
errors = "Department field is empty!";
$("#errors").html(errors);
}
else if(dob == ""){
errors = "Date of birth cannot be empty!";
$("#errors").html(errors);
}
else if(email == ""){
errors = "Email cannot be empty!";
$("#errors").html(errors);
}
else if(!validateemail(email)){
    errors = "Invalid Email!";
    $("#errors").html(errors);
}else{  
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Admin_usermanagement/check_email_status",
 data:{
    "id":id,
    "email":email
  },
  success:function(response){
  console.log(response);
  if(response == 1){
  errors = "EmailId already exists.please enter a separate one!";
  $("#errors").html(errors);
  }else if(response == 0){
     if(phn_number.length != 10){
      errors = "Phone number can contain only numbers from 0-9 and + or - sign!";
      $("#errors").html(errors);
    }else{
      $.ajax({
      type:"POST",
      url:"<?php echo base_url(); ?>Admin_usermanagement/check_phnnumber_status",
      data:{
          "id":id,
          "phn_number":phn_number
        },
      success:function(response){
      console.log(response);
       if(response == 1){
          errors = "Phone number already exists.please enter a separate one!";
          $("#errors").html(errors);
      }else if(response == 0){
         if(password == ""){
errors = "Password cannot be empty!";
$("#errors").html(errors);
}
else if(employee_id == ""){
errors = "Employee id cannot be empty!";
$("#errors").html(errors);
}else if(employee_id != ""){
  var employee_id_res = "";
if($("#uemplyeeId").val().length == 1){
 employee_id_res =  "00" + employee_id;
}else if($("#emplyeeId").val().length == 2){
 employee_id_res =  "0" + employee_id;
}else{
  employee_id_res = employee_id;
}
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Admin_usermanagement/check_empid_status",
 data:{
    "id":id,
    "employee_id":employee_id_res
  },
  success:function(response){
  console.log(response);
if(response == 1){
  errors = "EmployeeID already exists.please enter a separate one!";
  $("#errors").html(errors);
}else if(response == 0){
    if(permanent_address == ""){
errors = "Permanent address cannot be empty!";
$("#errors").html(errors);
} 
else if(date_joining == ""){
errors = "Date of joining cannot be empty!";
$("#errors").html(errors);
}
else if(probation_period == ""){
errors = "Probation period cannot be empty!";
$("#errors").html(errors);
}
else if(project_manager == ""){
errors = "Project manager cannot be empty!";
$("#errors").html(errors);
}
else if(alt_contact_number != "" && alt_contact_number.length != 10){
errors = "Alternate phone number is invalid.Phone number can contain only numbers from 0-9!";
$("#errors").html(errors);
}else{
$.ajax({
  type:"POST",
url:"Admin_usermanagement/edituser",
 data:{
  "id":id,
    "first_name":first_name,
    "last_name":last_name,
    "dob":dob,
    "email":email,
    "password":password,
    "prvmp_id":prvmp_id,
    "employee_id":employee_id_res,
    "phn_number":phn_number,
    "blood_group":blood_group,
    "present_address":present_address,
    "permanent_address":permanent_address,
    "alt_contact_number":alt_contact_number,
    "em_department":em_department,
    "date_joining":date_joining,
    "probation_period":probation_period,
    "project_manager":project_manager
},
success:function(response){
          console.log(response);
      $("#errors").html("Your data has been successfully Updated!!").css("color","green");
      setTimeout(function(){
       location.reload();
       },1000);
        }
        });
        }}}});}}}});}
      }}});}});});

function date_joining_cal(){
  var date_joining = $("#date_joining").val();
  $.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Admin_usermanagement/check_date_joining",
 data:{
    "date_joining":date_joining
  },
  success:function(response){
  console.log(response.replace(/\"/g, ""));
  $("#probation_period").val(response.replace(/\"/g, ""));
  }
});
}

function phone_validate(phno){
  var regexPattern=new RegExp(/^[0-9-+]+$/);    // regular expression pattern
  return regexPattern.test(phno); 
}


function validateemail(sEmail){
var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
if (filter.test(sEmail)) {
        return true;
    }else{
        return false;
    }
  }

  function deleteuser(id){
if(confirm("Sure want to delete?")){
$.ajax({
  type:"POST",
url:"Admin_usermanagement/deleteuser",
 data:{
    "id":id,
},
success:function(response){
  console.log(response);
  $("#ins_errors").html("Employee successfully deleted!!");
      setTimeout(function(){
       location.reload();
       },1000);
}
});
}
}

</script>
 </body>
 </html>
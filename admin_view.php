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
 
   <!-- Icons -->
   <link href="<?php echo base_url();?>vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>vendors/css/simple-line-icons.min.css" rel="stylesheet">
 
   <!-- Main styles for this application -->
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
   <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
   <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

   <!-- Styles required by this views -->

   <style>
  .modal-content {
       color: black;
       width: 120%;
    }
</style>
 
 </head>

 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body"> 
     <!-- Main content -->
     <main class="main mainbg">
       <!-- Breadcrumb -->
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Admin</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <div class="row">
            </div>
            <p id="leave_errors_type_del" style="color:red;"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Admin Record</div>
              <div class="panel-body">
                
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Username</th>
                      <th scope="col">Id</th>
                      <th scope="col">Usertype</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phonenumber</th>
                      <th scope="col">Password</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($admin as $admin){ ?>
                      <tr>
                      <td><?php echo $admin->first_name ;?></td>
                      <td><?php echo $admin->uniqueID;?></td>
                      <td><?php echo $admin->user_types;?></td>
                      <td><?php echo $admin->email;?></td>
                      <td><?php echo $admin->phone_number;?></td>
                      <td><?php echo $admin->password;?></td>
                      <td><i class="fa green fa-edit" aria-hidden="true"  onclick = "getleavetype('<?php echo $admin->user_id;?>')"></i></td>
                        <?php } ?>
                    </tr>
                  </tbody>
                  </table>
              </div>
            </div>
           </div>
         </div>
        </main>
       </div>
<?php if($role == 1 || $role == 3|| $role == 4|| $role == 5){ ?>
<div id="modalleave" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin-Edit</h4>
      </div>
      <div class="modal-body">
          <form name="MyForm" autocomplete="off" id="btn_cat_pay" enctype="multipart/form-data">
          <input type="hidden" id="prev_img" name="prev_img">
           <div class="form-group">
              <label for="pname">Username:</label>
              <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="pname">UniqueId:</label>
              <input type="text" class="form-control" id="uniqueID" name="uniqueID" readonly>
            </div>
            <div class="form-group">
              <label for="pname">Email:</label>
              <input type="text" class="form-control" id="admin_email" name="admin_email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="pname">PhoneNumber:</label>
              <input type="text" class="form-control" id="admin_phone" name="admin_phone" placeholder="Enter PhoneNumber">
            </div>
            <div class="form-group">
              <label for="pname">Password:</label>
              <input type="password" class="form-control" id="admin_pwd" name="admin_pwd" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <p id="admin_err" style="color:red;"></p>
            <button type="button" class="btn btn-success" id="leave_ins_btn" value="Submit">Update</button>
             </div>
        </form>
      </div>
    </div>

  </div>
</div>
<?php } ?>




     
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/popper.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="<?php echo base_url();?>vendors/js/Chart.min.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="<?php echo base_url();?>js/views/main.js"></script>
   <script src="<?php echo base_url();?>js/career.js"></script>

   <script>

    $(document).ready(function() {
       $('.myTable').DataTable();
      });

$('#mymodal').on('hidden.bs.modal', function () {
 location.reload();
})

$('#modalleave').on('hidden.bs.modal', function () {
 location.reload();
});

$(document).ready(function(){
$('#leave_ins_btn').on('click', function(event){
    var username = $("#admin_username").val();
    var email = $("#admin_email").val();
    var phn_num = $("#admin_phone").val();
  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      if(username == ""){
            errors = "Username is invalid or empty!!";
            $("#admin_err").html(errors);
      }
      else if(email == ""){
        errors = "Please give a  valid email!";
        $("#admin_err").html(errors);
      }
     else if(email != ""){
        if(!validateemail(email)){
          errors = "Invalid Email!";
          $("#admin_err").html(errors);
        }else{ 
          var phn_num = $("#admin_phone").val();
            if(phn_num == ""){
                 errors = "phone number cannot be empty!";
                    $("#admin_err").html(errors);
                }
                else if(phn_num != ""){
                  var pwd = $("#admin_pwd").val();
                  if(phn_num.length != 10){
                      errors = "Phone number is invalid.Phone number is greater than 10 digits";
                      $("#admin_err").html(errors);
                    }else if(pwd == ""){
                      errors = "Password cannot be empty!!";
                      $("#admin_err").html(errors);
                    }else{
                      $.ajax({  
                      url:"<?php echo base_url();?>Admin/update_admin_info",
                      method:"POST",  
                      data:{
                        "username":username,
                        "email":email,
                        "phn_num":phn_num,
                        "pwd":pwd
                      }, 
                          success:function(response)  
                          {
                          console.log(response);
                            if(response == 1){
                         $("#admin_err").html("Admin details successfully updated").css("color", "green");
                           document.getElementById("btn_cat_pay").reset();
                              setTimeout(function(){
                                location.reload();
                          },3000);
                           }else if(response == 0){
                            $("#admin_err").html("Admin details update failed.Duplicate email entry.Please verify email to update").css("color", "red");
                           } else{
                            console.log(response);
                           }   
                        }
  });
  }
}}}});
});




  function delleavetype(id){
      if(confirm("Are you sure want to delete!")){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>HolidayList/holiday_del",
   data:{
      "id":id,
  },
  success:function(response){
    console.log(response);
   $("#leave_errors_type_del").html("Holiday pdf file successfully deleted");
  setTimeout(function(){
    location.reload();
  },3000);
  }
  });
  }
}

function getleavetype(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Admin/get_admin_info",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    $("#admin_username").val(value.first_name);
    $("#uniqueID").val(value.uniqueID);
    $("#admin_phone").val(value.phone_number);
    $("#admin_email").val(value.email);
    $("#admin_pwd").val(value.password);
    $("#leave_ins_btn").val('Update');
    $("#modalleave").modal('show');
  });
  }
  });
}


function validateemail(sEmail){
  console.log(sEmail);
  return true;
  }

</script>
 </body>
 </html>
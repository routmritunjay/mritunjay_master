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
   <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
   <link rel="<?php echo base_url();?>stylesheet" href="css/bootstrap.css">
   <!-- Main styles for this application -->
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">


   <!-- Styles required by this views -->

   <style>
  .modal-content {
       color: black;
       width: 120%;
    }

 select:invalid { color: gray; }
</style>
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body"> 
     <!-- Main content -->
     <main class="main mainbg">
       <!-- Breadcrumb -->
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">Roles</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <div class="row">
              <div class="col-sm-2">
                <button type="button" class="btn green" id="leave_btn" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus"></i> Add Roles</button>
              </div>
            </div>
            <p id="roles_errors_type_del" style="color:red;"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Roles</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Employee-Name</th>
                      <th scope="col">Roles</th>
                      <th scope="col">Updated-On</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($details as $details){ ?>
                      <tr>
                      <td><?php echo $details->first_name;?></td>
                      <td><?php echo $details->roles_type;?></td>
                      <td><?php echo $details->updated_at; ?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editres_roles('<?php echo $details->roles_id;?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick = "delres_roles('<?php echo $details->roles_id;?>')"></i></td>
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

  <div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title pull-left">Add Roles</h4>
        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form name="MyForm" id="roles_form">
          <input type="hidden" id="emp_id">
           <div class="form-group">
              <label for="pname">Employee Name:</label>
              <select class="form-control" id="emp_name" name= "emp_name">
                 <option value="">Please Choose Employee</option>
                      <?php foreach($empdetails as $empdetails){?>
                      <option value="<?php echo $empdetails->uniqueID; ?>"><?php echo $empdetails->first_name; ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
              <label for="email">Roles:</label>
                  <select class="form-control" id="emp_roles" name= "emp_roles">
                     <option value="">Please Choose Roles</option>
                      <?php foreach($roless as $roless){?>
                      <option value="<?php echo $roless->role_type; ?>"><?php echo $roless->role_type; ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="form-group">
              <p id="roles_errors_type_ins" style="color:red;"></p>
            <button type="button" class="btn btn-success" id="roles_ins_btn" value="submit">Add Role</button>
             </div>
        </form>
      </div>
    </div>

  </div>
</div>



     
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
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

    $(document).ready( function () {
      $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
      });
      });


    $(document).ready(function() {
       $('.myTable').DataTable();
      });



$(document).ready(function(){
$('#roles_ins_btn').on('click', function(e){
    var emp_name = $("#emp_name").val();
    var emp_roles = $("#emp_roles").val();
     var btn_value = $("#roles_ins_btn").val();
    console.log(btn_value);
    var errors = "";
      if(emp_name == ""){
          errors = "employee name should be empty";
          $("#roles_errors_type_ins").html(errors);
      }
      else if(emp_roles == ""){
        errors = "please fill up roles field";
        $("#roles_errors_type_ins").html(errors);
      }
      else if(emp_name!= "" && emp_roles != "" && btn_value == "submit"){
    $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Roles/insertres_roles",
   data:{
      "emp_name":emp_name,
      "emp_roles":emp_roles
  },
  success:function(response){
    console.log(response);
    if(response == 1){
   $("#roles_errors_type_ins").html("Role has been successfully updated").css("color","green");
    document.getElementById("roles_form").reset();
 setTimeout(function(){
  location.reload();
  },2000);}else if(response == 2){
  $("#roles_errors_type_ins").html("Hr-manager role has already been allocated.Unable to update role");
    document.getElementById("roles_form").reset();
 setTimeout(function(){
    location.reload();
      },2000);
    }else{
   $("#roles_errors_type_ins").html("Role has been already added to particular employee!!");
       document.getElementById("roles_form").reset();
       setTimeout(function(){
          location.reload();
  },2000);
  }}
  });
  }else if(btn_value == "Update"){
    var id = $("#emp_id").val();
    $.ajax({  
    type:"POST",
    url:"<?php echo base_url();?>Roles/updateroles",
    data:{
        "id":id,
        "emp_name":emp_name,
        "emp_roles":emp_roles
        },
    dataType:'json',
    success:function(response)  
    {
    console.log(response);
    $("#roles_errors_type_ins").html("Role has been successfully updated").css("color","green");
   setTimeout(function(){
    location.reload();
  },3000);
    }
  });
  }
});
});


  function delres_roles(id){
      if(confirm("Sure want to delete?")){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Roles/delres_roles",
   data:{
      "id":id,
  },
  success:function(response){
    console.log(response);
    $("#roles_errors_type_del").html("Role has been successfully deleted");
   setTimeout(function(){
    location.reload();
  },3000);
  }
  });
  }
}


function editres_roles(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Roles/get_roles",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    $("#emp_id").val(value.roles_id);
    $("#emp_name").val(value.employee_name);
    $("#emp_roles").val(value.roles_type);
    $("#leave_btn").html('Edit Roles');
    $(".modal-title").html('Update Roles');
    $("#roles_ins_btn").val('Update');
    $("#roles_ins_btn").html('Update Roles');
    $("#close").css('display','block');
    $("#mymodal").modal('show');
  });
  }
  });
}

$('#mymodal').on('hidden.bs.modal', function () {
 location.reload();
});

</script>
 </body>
 </html>
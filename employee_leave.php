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
         <li class="breadcrumb-item active">Remaining Employee Leaves</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <div class="row">
              <div class="col-sm-2">
                <button type="button" class="btn green" id="leave_btn" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus"></i> Add Leave</button>
              </div>
            </div>
            <p id="leave_errors_type_ins" style="color:red;"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Employee Leave</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Employee-name</th>
                      <th scope="col">Sick-Leave</th>
                      <th scope="col">Casual-Leave</th>
                      <th scope="col">Restricted-Holiday</th>
                      <th scope="col">Updated-On</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($leavedetails as $leavedetails){ ?>
                      <tr>
                      <td><?php echo $leavedetails->first_name;?></td>
                      <td><?php echo $leavedetails->sick_leave;?></td>
                      <td><?php echo $leavedetails->casual_leave?></td>
                      <td><?php echo $leavedetails->restricted_holiday;?></td>
                      <td><?php echo $leavedetails->updated_at; ?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "getempleave('<?php echo $leavedetails->leave_id;?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick = "delempleave('<?php echo $leavedetails->leave_id;?>')"></i></td>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Leave</h4>
      </div>
      <div class="modal-body">
        <form name="MyForm" id="btn_cat_pay">
          <input type="hidden" id="emp_id">
          <div class="form-group">
              <label for="pname">Employee Name:</label>
             <select class="form-control" id="emp_name" name= "leave_type">
                <option value="">Select an Option</option>
                  <?php foreach($name as $name){?>
                  <option value="<?php echo $name->uniqueID; ?>"><?php echo $name->first_name; ?></option>
                  <?php } ?>
              </select>
            </div>
           <div class="form-group">
              <label for="pname">Sick Leave:</label>
              <input type="number" class="form-control" id="sick_leave" name="sick_leave" placeholder="Enter Sick Leave">
            </div>
            <div class="form-group">
              <label for="email">Casual Leave:</label>
              <input class="form-control" type="number" name="casual_leave" id="casual_leave" placeholder="Enter Casual Leave"> 
            </div>
             <div class="form-group">
              <label for="email">Restricted Holiday:</label>
              <input class="form-control" type="number" name="res_holiday" id="res_holiday" placeholder="Enter restricted holiday"> 
            </div>
            <div class="form-group">
              <p id="leave_errors" style="color:red;"></p>
            <button type="button" class="btn btn-success" id="btn_cat" value="submit">Add Leave</button>
             </div>
        </form>
      </div>
    </div>

  </div>
</div>


<div id="modalleave" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Leave Type</h4>
      </div>
      <div class="modal-body">
        <form name="MyForm">
           <div class="form-group">
              <label for="pname">Leave Type:</label>
              <input type="text" class="form-control" id="leave_type_ins" name="leave_type_ins" placeholder="Enter Leave Type">
            </div>
            <div class="form-group">
              <p id="leave_errors_type_ins" style="color:red;"></p>
            <button type="button" class="btn btn-success" id="leave_ins_btn" value="submit">Add Leavetype</button>
             </div>
        </form>
      </div>
    </div>

  </div>
</div>

    <div class="modal fade" id="myModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
         <div class="modal-body">
          <p id="view_mssg"></p>
       </div>  
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>   
    </div>
  </div>
</div>





     
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/popper.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="<?php echo base_url();?>vendors/js/Chart.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="<?php echo base_url();?>js/views/main.js"></script>
   <script src="<?php echo base_url();?>js/career.js"></script>


<script>
      CKEDITOR.replace( 'editor1' );
    </script>
    <script>
      CKEDITOR.replace( 'editor2' );
    </script>

   <script>

    $(document).ready(function() {
       $('.myTable').DataTable();

      $(".button_edit").click(function(){
       $("#myModal").modal('show');
       });
      });



$(document).ready(function(){
$('#btn_cat').on('click', function(e){
   e.preventDefault();
    var emp_name = $("#emp_name").val();
    var sick_leave = $("#sick_leave").val();
    var casual_leave = $("#casual_leave").val();
    var restricted_holiday = $("#res_holiday").val();
    var btn_value = $("#btn_cat").val();
    console.log(btn_value);
           var errors = "";
           if(emp_name == ""){
            errors = "Employee name should be empty";
            $("#leave_errors").html(errors);
           }
           else if(sick_leave == ""){
            errors = "Sick leave field is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(casual_leave == ""){
            errors = "Casual leave field is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(emp_name != ""  && sick_leave != "" && casual_leave != "" && btn_value == "submit"){
            $("#leave_errors").empty();
               $.ajax({
                      type:"POST",
                      url:"<?php echo base_url();?>Leave/count_leave",
                      data:{
                        "emp_name":emp_name,
                     },
                      dataType:'json',
                    success:function(response){
                      console.log(response);
                      if(response == 0){
                        $.ajax({  
                     type:"POST",
                      url:"<?php echo base_url();?>Leave/uploadleave",
                      data:{
                        "emp_name":emp_name,
                        "sick_leave":sick_leave,
                        "casual_leave":casual_leave,
                        "restricted_holiday":restricted_holiday
                     },
                      dataType:'json',
                     success:function(data)  
                     {
                      console.log(data);
                         if(data == 1){
                          $("#leave_errors").html("Employee leaves successfully updated").css("color", "green");
                        document.getElementById("btn_cat_pay").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                         }else{
                           $("#leave_errors").html("Unable to apply leave!");
                         setTimeout(function(){
                          location.reload();
                        },3000);
                         }
                     } 
                     });
                      }else{
                     errors = "Already leave is updated for above employee";
                     $("#leave_errors").html(errors);
                      }
                    }
                    });    
                     }else if(btn_value == "Update"){
                      var id = $("#emp_id").val();
                      $.ajax({  
                       type:"POST",
                        url:"<?php echo base_url();?>Leave/updateleave",
                        data:{
                        "id":id,
                        "emp_name":emp_name,
                        "sick_leave":sick_leave,
                        "casual_leave":casual_leave,
                        "restricted_holiday":restricted_holiday
                     },
                     dataType:'json',
                     success:function(data)  
                     {
                      console.log(data);
                         if(data == 1){
                           $("#leave_errors").html("Employee leaves successfully updated").css("color","green");
                         setTimeout(function(){
                          location.reload();
                        },3000);
                         }else{
                           $("#leave_errors").html("Unable to Update leave!");
                         setTimeout(function(){
                          location.reload();
                        },3000);
                         }
                       }
                     });
                    }
                 });
             });

$('#mymodal').on('hidden.bs.modal', function () {
 location.reload();
})

$('#modalleave').on('hidden.bs.modal', function () {
 location.reload();
})


  function delempleave(id){
      if(confirm("Are you sure want to delete!")){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/delempleave",
   data:{
      "id":id,
  },
  success:function(response){
    console.log(response);
   $("#leave_errors_type_ins").html("Employee leaves successfully deleted");
  setTimeout(function(){
    location.reload();
  },3000);
  }
  });
  }
}


function getempleave(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/getempleave",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    $("#emp_id").val(value.leave_id);
    $("#emp_name").val(value.employee_name);
    $("#sick_leave").val(value.sick_leave);
    $("#casual_leave").val(value.casual_leave);
    $("#res_holiday").val(value.restricted_holiday);
    $("#leave_btn").html('Edit Leave');
    $("#btn_cat").html('Update');
    $("#btn_cat").val('Update');
  });
  }
  });
}


</script>
 </body>
 </html>
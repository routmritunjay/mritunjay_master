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
   <link href="<?php echo base_url(); ?>vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>vendors/css/simple-line-icons.min.css" rel="stylesheet">
 
   <!-- Main styles for this application -->
   <link href="<?php echo base_url(); ?>css/dashboard.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

   <!-- Styles required by this views -->

   <style>
  .modal-content {
       color: black;
       width: 120%;
    }
   .table {
    width: 100%;
    display:block;
    overflow: auto;
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
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">Employee Leaves</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <?php if($leave_id == "") {?>
          <div class="row">
            <div class="col-md-12">
           	<p id="filteration_err" style="color:red;"></p>
              <div class="panel panel-default">
              <div class="panel-heading">Leave Filter</div>
              <p></p>
               <div class="col-sm-12 col-md-12" style="display: inline-flex;">
                <div class="col-sm-3">
                  <input type="hidden" id="roles" value="<?php echo $role;?>">
                  <select name="job_role" class="form-control" id="name_filter">
                    <option value="">Select An Employee</option>
                    <?php foreach($all_employee as $all_emp){ ?>
                     <option value="<?php echo $all_emp->uniqueID; ?>"><?php echo $all_emp->first_name; ?><?php echo $all_emp->last_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-sm-3">
                  <select class="form-control" id="leave_type" name= "leave_type">
                            <option value="">Select an Option</option>
                            <?php foreach($leave_type as $leave_type){?>
                            <option value="<?php echo $leave_type->leave_type; ?>"><?php echo $leave_type->leave_type; ?></option>
                            <?php } ?>
                  </select>
                  </div>
                <div class="col-sm-2" autocomplete="off">
                    <input type="text" class="form-control datepicker to_date" name ="to_date" id ="to_date" placeholder="Start date"></div>
             <div class="col-sm-2" autocomplete="off">
               <input type="text" class="form-control datepicker to_date" name ="end_date" id="end_date" placeholder="End date"></div>
                 <div class="col-sm-3">
                     <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                    <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
                 </div>
          </div>
            </div>
            </div></div>
            <?php } ?>
          <div class="row">
            </div>
            <p id="ins_errors" style="color:red; font-size:15px;"></p>
            <div class="panel panel-default">
            <input type="hidden" id="role_default" class="role_default" value="<?php echo $role; ?>">
              <div class="panel-heading">Applied Leave</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                   	 <th scope="col">LeaveId</th>
                      <th scope="col">Name</th>
                      <th scope="col">Leave-Type</th>
                      <th scope="col">Leave-Pattern</th>
                      <th scope="col">Start-Date</th>
                      <th scope="col">End-Date</th>
                      <th scope="col">No-of-Days</th>
                      <th scope="col">Message</th>
                      <th scope="col">Applied-Date</th>
                      <th scope="col">Manager-Approval</th>
                      <th scope="col">Hr-Approval</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($leavedetails as $leavedetails){ ?>
                      <tr>
                      <td><?php echo $leavedetails->leave_id;?></td>
                      <td><?php echo $leavedetails->applicant_name;?></td>
                      <td><?php echo $leavedetails->leave_type;?></td>
                     <?php if($leavedetails->leave_pattern != "") { ?>
                      <td><?php echo $leavedetails->leave_pattern;?></td>
                      <?php }else{ ?>
                       <td>NA</td>
                       <?php } ?>
                  <?php if($leavedetails->leave_from_date != "" && $leavedetails->leave_to_date != "" && $leavedetails->total_days != ""){ ?>
                      <td><?php echo $leavedetails->leave_from_date;?></td>
                      <td><?php echo $leavedetails->leave_to_date;?></td>
                      <td><?php echo $leavedetails->total_days;?></td>
                      <?php }else{ ?>
                       <td>NA</td>
                       <td>NA</td>
                       <td>NA</td>
                      <?php } ?>
                      <td><button type="button" class="btn btn-default" onclick = getmssgdetails('<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>');>View</button></td>
                      <td><?php echo $leavedetails->appiled_date;?></td>
                      <?php if($leavedetails->manager_approval == 'pending') { ?>
                      <td><a  href="#" class="link2 green" onclick = manstatusupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','approve');><i class="fa">&#xf00c;</i></a><a href="#" class="link2 red" onclick = manstatusupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','reject');><i class="fa">&#xf00d;</i></a></td>
                      <?php }else if($leavedetails->manager_approval == 'approved'){ ?>
                        <td><a href="#" class="green"><i class="fa">&#xf00c;</i></a></td>
                        <?php }else if($leavedetails->manager_approval == 'rejected'){ ?>
                        <td><a href="#" class="red"><i class="fa">&#xf00d;</i></a></td>
                        <?php }else if($leavedetails->manager_approval == 'canceled'){ ?>
                        <td>Cancelled</td>
                        <?php }else if($leavedetails->manager_approval == 'cancel_request'){ ?>
                        <td><a  href="#" class="link2 red" onclick = mancancelupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','approve');><i class="fa">&#xf00c;</i></a><a href="#" class="link2 red" onclick = mancancelupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','reject');><i class="fa">&#xf00d;</i></a></td>
                        <?php } ?>
                        <?php if($leavedetails->status == 'pending') { ?>
                      <td><a  href="#" class="link1 green" onclick = statusupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','approve');><i class="fa">&#xf00c;</i></a><a href="#" class="link1 red" onclick = statusupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','reject');><i class="fa">&#xf00d;</i></a></td>
                      <?php }else if($leavedetails->status == 'approved'){ ?>
                        <td><a href="#"  class="green"><i class="fa">&#xf00c;</i></a></td>
                        <?php }else if($leavedetails->status == 'rejected' || $leavedetails->manager_approval == 'rejected'){ ?>
                        <td><a href="#"  class="red"><i class="fa">&#xf00d;</i></a></td>
                        <?php }else if($leavedetails->status == 'canceled'){ ?>
                        <td>Cancelled</td>
                      <?php } ?>
                    </tr>
                   <?php } ?>
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
        <form name="MyForm">
          <input type="hidden" id="emp_id">
          <div class="form-group">
              <label for="pname">Employee Name:</label>
             <select class="form-control" id="emp_name" name= "leave_type">
                <option value="">Select an Option</option>
                  <?php foreach($name as $name){?>
                  <option value="<?php echo $name->first_name; ?>"><?php echo $name->first_name; ?></option>
                  <?php } ?>
              </select>
            </div>
           <div class="form-group">
              <label for="pname">Sick Leave:</label>
              <input type="text" class="form-control" id="sick_leave" name="sick_leave" placeholder="Enter Sick Leave">
            </div>
            <div class="form-group">
              <label for="email">Casual Leave:</label>
              <input class="form-control" type="text" name="casual_leave" id="casual_leave" placeholder="Enter Casual Leave"> 
            </div>
             <div class="form-group">
              <label for="email">Restricted Holiday:</label>
              <input class="form-control" type="text" name="res_holiday" id="res_holiday" placeholder="Enter restricted holiday"> 
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
       
        <h4 class="modal-title">Message</h4>
      </div>
         <div class="modal-body">
          <h4 id="view_mssg_res"></h4>
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
   <script src="<?php echo base_url();?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="<?php echo base_url();?>vendors/js/Chart.min.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
      <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="<?php echo base_url();?>js/views/.main.js"></script>
    <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

   <script>

    $(document).ready(function() {
    $(".leaveId").hide();
         var dataTable = $('.myTable').DataTable({
         	 "order": [[ 0, "desc" ]],
         	columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
          }],
            "bAutoWidth": false
        });

      $(".button_edit").click(function(){
       $("#myModal").modal('show');
       });
       var role = $("#role_default").val();
       if(role == 2){
         $(".link1").prop('onclick', null);
        }else if(role == 1 || role == 3 || role == 5){
          $(".link2").prop('onclick', null);
        }
       });


    $(document).ready(function(){
       $('.datepicker').datepicker({
          dateFormat: 'yy-mm-dd',
          beforeShowDay: $.datepicker.noWeekends
      });
     });



  function getmssgdetails(id,name){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Leave/getmssgdetails",
  data:{
    "id":id,
    "name":name
 },
  dataType:'json',
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    $("#view_mssg_res").html(value.restricted_holiday);
    var mssg = value.message;
    var value = mssg.replace(/(<p[^>]+?>|<p>|<\/p>)/img, "");
    $("#view_mssg").html(value);
  });
  $("#myModal").modal('show');
}
});
}


 function statusupdate(leave_type,id,name,status){
  if(confirm("Are you sure want to update!")){
    $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Leave/checkmanagerapproval",
  data:{
    "id":id
 },
  dataType:'json',
success:function(response){
  console.log(response.manager_approval);
  var res_val = response.manager_approval;
  if(res_val == "approved"){
 $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Leave/statusupdate",
  data:{
    "leave_type":leave_type,
    "id":id,
    "name":name,
    "status":status
 },
  dataType:'json',
  success:function(response){
  console.log(response);
  $("#ins_errors").html("Your request has been succesfully updated!").css("color","green");
  setTimeout(function(){
    location.reload();
  },3000);
  }
  });
  }else{
  $("#ins_errors").html("Updation Failed.Waiting for Manager Approval!");
  setTimeout(function(){
    location.reload();
  },3000);
}
}
});
}
}

function manstatusupdate(leave_type,id,name,status){
  if(confirm("Are you sure want to update!")){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Employeedashboard/statusupdate",
  data:{
    "leave_type":leave_type,
    "id":id,
    "name":name,
    "status":status
 },
  dataType:'json',
success:function(response){
  console.log(response);
  $("#ins_errors").html("Your request has been succesfully updated!").css("color","green");
  setTimeout(function(){
    location.reload();
  },3000);
}
});
}
}

function cancelupdate(leave_type,id,name,status){
  if(confirm("Are you sure want to update!")){
     $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Leave/checkmanagerapproval",
  data:{
    "id":id
 },
  dataType:'json',
success:function(response){
  console.log(response.manager_approval);
  var res_val = response.manager_approval;
  if(res_val == "canceled"){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Leave/cancelstatusupdate",
  data:{
    "leave_type":leave_type,
    "id":id,
    "name":name,
    "status":status
 },
  dataType:'json',
success:function(response){
  console.log(response);
  $("#ins_errors").html("Your request has been succesfully updated!").css("color","green");
  setTimeout(function(){
    location.reload();
  },3000);
}
});
}else{
  $("#ins_errors").html("Updation Failed.Waiting for Manager Approval!");
  setTimeout(function(){
    location.reload();
  },3000);
}
}
});
}
}

function mancancelupdate(leave_type,id,name,status){
  if(confirm("Are you sure want to update!")){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Employeedashboard/cancelstatusupdate",
  data:{
    "leave_type":leave_type,
    "id":id,
    "name":name,
    "status":status
 },
  dataType:'json',
success:function(response){
  console.log(response);
  alert("Your request has been succesfully updated!")
  location.reload();
}
});
}
}

$('#mymodal').on('hidden.bs.modal', function () {
 location.reload();
})

$('#modalleave').on('hidden.bs.modal', function () {
 location.reload();
})

function elogout(){
    $.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Employeedashboard/logout",
 data:{
  },
  success:function(response){
  console.log(response);
  location.reload();
}
});
}

$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  $(".wrkng_prtl").show();
  var name = $("#name_filter").val();
  var start_dt = $("#to_date").val();
  var end_dt = $("#end_date").val();
  var roles = $("#roles").val();
  if(roles == 2){
    url = "<?php echo base_url();?>Employeedashboard/leave_filtration_details";
  }else{
    url = "<?php echo base_url();?>Leave/filtration_details";
  }
  var leave_type = $("#leave_type").val();
  if(name == "" && start_dt == "" && end_dt == "" && leave_type == ""){
     $("#filteration_err").html("Select a Employee name/Leave type Or Date Range");
     $("#ins_errors").hide();
  }
   else if(start_dt == "" && end_dt != ""){
     $("#filteration_err").html("Start date is required!!");
      $(".ins_errors").hide();
  }
   else if(start_dt > end_dt && end_dt != ""){
     $("#filteration_err").html("Start end cannot be greater than end date!!");
      $(".ins_errors").hide();
  }
  else {
    $("#filteration_err").empty();
    $(".ins_errors").hide();
  $.ajax({
    type:"POST",
    url:url,
    data:{
    "name":name,
    "start_dt":start_dt,
    "end_dt":end_dt,
    "leave_type":leave_type
     },
     dataType:'json',
success:function(response){
  console.log(response);
  if(response != ""){
  dataTable.clear();
$.each(response,function(key,value){
  var manager_query = '';
  var hr_query = '';
  var leave_pattern = '';
  var to_date = '';
  var start_date = '';
  var total_days = '';
  var leave_type = value.leave_type;
  var leave_type_spc = leave_type.replace(' ','');
  if(value.leave_pattern === null){
     leave_pattern = 'NA';
  }else{
       leave_pattern = ''+value.leave_pattern+'';
  }

  if(value.leave_from_date === null  && value.leave_to_date === null && value.total_days === null){
    start_date = 'NA';
     to_date = 'NA';
     total_days = 'NA';
  }else{
      start_date = ''+value.leave_from_date+'';
       to_date = ''+value.leave_to_date+'';
       total_days = ''+value.total_days+'';
  }
var role = $(".role_default").val();
  if(value.manager_approval == 'pending'){
    if(role == 1 || role == 3 || role == 5){
       manager_query = '<a  href="#" class="green"><i class="fa">&#xf00c;</i></a><a href="#" class="link2 red"><i class="fa">&#xf00d;</i></a>';
     }else if(role == 2){
    manager_query = '<a  href="" class="link2 green" onclick = manstatusupdate("'+leave_type_spc+'",'+value.leave_id+',"'+value.applicant_email+'","approve");><i class="fa">&#xf00c;</i></a><a href="#" class="link2 red" onclick = manstatusupdate("'+leave_type_spc+'",'+value.leave_id+',"'+value.applicant_email+'","reject");><i class="fa">&#xf00d;</i></a>';
    }}else if(value.manager_approval == 'approved'){
       manager_query = '<a href="#" class="green"><i class="fa">&#xf00c;</i></a>';
    }else if(value.manager_approval == 'rejected'){
       manager_query = '<a href="#" class="red"><i class="fa">&#xf00d;</i></a>';
    }else if(value.manager_approval == 'canceled'){
       manager_query = 'canceled';
    }else if(value.manager_approval == 'cancel_request'){
      if(role == 1 || role == 3 || role == 5){
      manager_query = '<a  href="" class="link2 green"><i class="fa">&#xf00c;</i></a><a href="#" class="link2 red"><i class="fa">&#xf00d;</i></a>';
      }else if(role == 2){
    manager_query = '<a  href="#" class="link2 red" onclick = mancancelupdate('+value.leave_type+','+value.leave_id+','+value.applicant_email+',approve);><i class="fa">&#xf00c;</i></a><a href="#" class="link2 red" onclick = mancancelupdate('+value.leave_type+','+value.leave_id+','+value.applicant_email+',reject);><i class="fa">&#xf00d;</i></a>';
    }}
    if(value.status == 'pending'){
        if(role == 1 || role == 3 || role == 5){
          hr_query = '<a  href="#" class="link1 green" onclick = statusupdate("'+leave_type_spc+'",'+value.leave_id+',"'+value.applicant_email+'","approve");><i class="fa">&#xf00c;</i></a><a href="#" class="link1 red" onclick = statusupdate("'+leave_type_spc+'",'+value.leave_id+',"'+value.applicant_email+'","reject");><i class="fa">&#xf00d;</i></a>';
           }else if(role == 2){
            hr_query = '<a  href="#" class="link1 green"><i class="fa">&#xf00c;</i></a><a href="#" class="link1 red"><i class="fa">&#xf00d;</i></a>';
           }}else if(value.status == 'approved'){
       hr_query = '<a href="#"  class="green"><i class="fa">&#xf00c;</i></a>';
    }else if(value.status == 'rejected'){
       hr_query = '<a href="#"><i style="font-size:24px" class="fa red">&#xf00d;</i></a>';
    }else if(value.status == 'canceled'){
       hr_query = 'canceled';
    }else if(value.status == 'cancel_request'){
       if(role == 1 || role == 3 || role == 4 || role == 5){
      hr_query = '<a  href="#" class="link1 green " onclick = cancelupdate('+value.leave_type+','+value.leave_id+','+value.applicant_email+',approve);><i class="fa">&#xf00c;</i></a><a href="#" class="link1 red" onclick = cancelupdate('+value.leave_type+','+value.leave_id+','+value.applicant_email+',reject);><i class="fa">&#xf00d;</i></a>';
       }else if(role == 2){
         hr_query = '<a  href="" class="link1 red "><i class="fa">&#xf00c;</i></a><a href="" class="link1 red"><i class="fa">&#xf00d;</i></a>';
    }}
  dataTable.row.add([
  	    ''+value.leave_id+'',
        ''+value.applicant_name+'',
        ''+value.leave_type+'',
        ''+leave_pattern+'',
        ''+start_date+'',
        ''+to_date+'',
        ''+total_days+'',
        '<button type="button" class="btn btn-default" onclick = getmssgdetails('+value.leave_id+',"'+value.applicant_email+'");>View</button>',
        ''+value.appiled_date+'',
        ''+manager_query+'',
        ''+hr_query+''
    ]).draw();
});}else{
   dataTable.clear();
   dataTable.row.add([
   	    'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records',
        'No-Records'
    ]).draw();
}}
});
}});
});

 $("#reset_opt").click(function(){
location.reload();
});

 $(document).ready(function(){
       var reset_url = "";
          $('.nav-link').each(function(){
          var url  = $('#url').val();
          if(url == $(this).attr('href')){
            $(this).addClass("active");
          }
          });
      });

</script>
 </body>
 </html>
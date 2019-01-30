 <!DOCTYPE html>
 <html lang="en">
 <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
   
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Leaf Lite - Free Bootstrap Admin Template">
   <meta name="author" content="Łukasz Holeczek">
   <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
   <link rel="shortcut icon" href="<?php echo base_url();?>login/images/favicon.png">
   <title>Intelexsystemsinc.com</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <!-- Icons -->

   <link href="<?php echo base_url();?>vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>vendors/css/simple-line-icons.min.css" rel="stylesheet">
     
   <!-- Main styles for this application -->
   <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <link rel="<?php echo base_url();?>stylesheet" href="css/bootstrap.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
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
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Employee Timesheet</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">Timesheet - Filter</div>
              <p id="filteration_err" style="color:red;"></p>
              <div class="col-sm-12 col-md-12" style="display: inline-flex;">
                <div class="col-sm-3">
                  <select name="job_role" class="form-control" id="name_filter">
                    <option value="">Select an Employee</option>
                    <?php foreach($all_employee as $all_employee){ ?>
                     <option value="<?php echo $all_employee->uniqueID; ?>"><?php echo $all_employee->first_name; ?><?php echo $all_employee->last_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                   <div class="col-md-3">
                      <input class="form-control datepicker task_date" autocomplete="off" name ="task_date" placeholder="Start task Date">
                  </div>
                  <div class="col-md-3">
                      <input class="form-control datepicker end_task_date" autocomplete="off" name ="task_date" placeholder="End task Date">
                  </div>
                 <div class="col-md-3">
                   <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                    <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
                 </div>
          </div>
        </div>
        </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Project Records</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                       <th scope="col">Employee-Name</th>
                       <th scope="col">Task-Date</th>
                      <th scope="col">Project-Name</th>
                       <th scope="col">Task-Description</th>
                      <th scope="col">Task-Description</th>
                      <th scope="col">Time-Spent(hrs)</th>
                      <th scope="col">Status</th>
                      <th scope="col">Updated-on</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($task_summary as $task_summary){ ?>
                                        <tr>
                      <td><?php echo $task_summary['first_name']; ?><?php echo $task_summary['last_name']; ?></td>
                      <td><?php echo date('d-m-Y',$task_summary['task_date']); ?></td>
                      <td><?php echo $task_summary['project_name']; ?></td>
                      <td><?php echo $task_summary['task_description']; ?></td>
                      <td><button type="button" class="btn btn-default" onclick = getmssgdetails('<?php echo $task_summary['task_id'];?>');>View Description</button></td>
                      <td><?php echo $task_summary['total_time_spent']; ?></td>
                      <td><?php echo $task_summary['status']; ?></td>
                      <td><?php echo $task_summary['updated_on']; ?></td></tr>
                      <?php } ?>
                  </tbody>
                  <tfoot id="tfoot"><tr><td></td><td></td><td></td><td>Total Time spent</td><td></td><td id="tspent"><?php echo $total_time_spent['time_spent']; ?></td></tr></tfoot>
                  </table>
              </div>
            </div>
           </div>
           </div>
            </div>
            </div>
          </div>
        </div>
             </div>
           </div>
         </div>
       </div>
     </main>
   </div>

   

 <div class="modal fade" id="myModalx" role="dialog" style="width:100%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Task Description</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
         <div class="modal-body">
          <p id="view_mssg"></p>
       </div>  
       <div class="modal-footer">
      </div>   
    </div>
  </div>
</div>
<footer class="app-footer footerbg text-center">Intelex Systems © 2018 Intelex Systems Inc. </footer>
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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script> 
<script>
$(document).ready( function () {
    $("#tfoot").hide();
   var dataTable = $('.myTable').DataTable({
      dom: 'Bfrtip',
        buttons: [
            {
          extend: 'pdf',
          footer: true,
          exportOptions: {
             columns: [ 0,1,2,3,5,6,7]
          }},
           {
          extend: 'excel',
          footer: true,
          exportOptions: {
             columns: [ 0,1,2,3,5,6,7]
          }}],
       columnDefs: [
            {
                "targets": [ 3 ],
                "visible": false
            }
        ]
     });
   $('.datepicker').datepicker({
    format: 'dd-mm-yy',
});
  $('#pro_info').multiselect({
    buttonWidth:'400px'
 });
});



$(document).ready( function () {
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
});
});


$(document).ready(function(){
$('#btn_cat').on('click', function(e){
    var pro_info = $("#pro_info").val();
    var pro_name = $("#pro_name").val();
    var pro_start_date = $(".start_date").val();
    var pro_end_date = $(".end_date").val();
     var message = $("#editor").val();
           if(pro_info == ""){
            errors = "Please Select an Employee!!";
            $("#leave_errors").html(errors);
           }
           else if(pro_name == ""){
            errors = "Project name field is mandatory!!!";
            $("#leave_errors").html(errors);
           }
           else if(pro_start_date == ""){
            errors = "Project start date is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(pro_end_date == ""){
            errors = "Project end date is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(pro_start_date > pro_end_date){
            errors = "Start date cannot be greater than end date!!";
            $("#leave_errors").html(errors);
           }
           else if(message == ""){
           $("#leave_errors").html("Message field is mandatory!!!");
          }
           else if(pro_info != "" && pro_name != "" && pro_start_date != "" && pro_end_date != "" && message != "" ){
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employee_project/upload_project",
                     method:"POST",  
                     data:{
                      "pro_info":pro_info,
                      "pro_name":pro_name,
                      "pro_start_date":pro_start_date,
                      "pro_end_date":pro_end_date,
                      "message":message
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data == "true"){
                   $("#leave_errors").html("Project succesfully uploaded").css("color","green");
                        document.getElementById("frm_cat").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                 }else{
                  $("#leave_errors").html("Unable to upload!!!");
                  document.getElementById("frm_cat").reset();
                  CKupdate();
                     }
                     } 
                     });
                     } 
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
function elogout(){
    $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Employeedashboard/logout",
  data:{
  },
  success:function(response){
  console.log(response);
  window.location.href="<?php echo base_url(); ?>";
}
});
}

function CKupdate(){
  CKEDITOR.instances.editors.setData('');
}

function task_view(project_id){
  window.location.href="<?php echo base_url(); ?>Employee_project/taskview?pro_id="+project_id;
}


function elogout(){
    $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Employeedashboard/logout",
  data:{
  },
  success:function(response){
  console.log(response);
  window.location.href="<?php echo base_url(); ?>";
}
});
}

function getmssgdetails(id,name){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Timesheet/getmssgdetails",
  data:{
    "id":id
 },
  dataType:'json',
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    var mssg = value.task_description;
    $("#view_mssg").html(mssg);
  });
  $("#myModalx").modal('show');
}
});
}


$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  var name = $("#name_filter").val();
  var date = $(".task_date").val();
  var end_date = $(".end_task_date").val();
  if(name == "" && date == "" && end_date == ""){
     $("#filteration_err").html("Select a Employee name");
  }
  else if(name == "" && date == "" && end_date != ""){
     $("#filteration_err").html("Start date is required!!");
  }
   else if(name != "" && date > end_date && end_date != ""){
     $("#filteration_err").html("Start date cannot be greater than end date!!");
  }
  else if(name == "" && date > end_date && end_date != ""){
     $("#filteration_err").html("Start date cannot be greater than end date!!");
  }
  else {
    $("#filteration_err").empty();
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Employee_timesheet/filtration_details",
    data:{
    "name":name,
    "date":date,
    "end_date":end_date
     },
     dataType:'json',
success:function(response){
  console.log(response);
  $("#tbdydtls").empty();
  if(response != ""){
  dataTable.clear();
    var time_spent = 0;
   $.each(response,function(key,value){
    var sum = parseInt(value.total_time_spent);
    time_spent += sum;
    var new_date = new Date(value.task_date * 1000);
    var year = new_date.getFullYear();
    var month = new_date.getMonth() + 1;
    var day = new_date.getDate();
    var date = day +'-'+month+'-'+year;
    dataTable.row.add([
        ''+value.first_name+value.last_name+'',
        ''+date+'',
        ''+value.project_name+'',
        ''+value.task_description+'',
        '<button type="button" class="btn btn-default" onclick = getmssgdetails('+value.task_id+');>View Description</button>',
        ''+value.total_time_spent+'',
        ''+value.status+'',
        ''+value.updated_on+'',
    ]).draw();
   });
$("#tspent").html(time_spent);
 }else{
 dataTable.clear();
   dataTable.row.add([
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found'
    ]).draw();
}
}
});
}
});
});

$("#reset_opt").click(function(){
location.reload();
});

</script>
 </body>
 </html>
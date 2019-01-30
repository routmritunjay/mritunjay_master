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
   <link rel="<?php echo base_url();?>stylesheet" href="css/bootstrap.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
   <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   <!-- Styles required by this views -->
    <style>
    select:invalid { color: gray; }
 </style>
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Timesheet</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
        <div class="col-sm-12">
           <button type="button" class="btn green" onclick="task_entry();"><i class="fa fa-plus"></i> Add Tasks</button>
          <div class="panel panel-default">
            <div class="panel-heading">Timesheet - Filter</div>
            <p id="filteration_err" style="color:red;"></p>
              <div class="col-sm-12 col-md-12" style="display: inline-flex;">
                  <div class="col-md-3">
                    <input type="hidden" id="name_filter" value="<?php echo $id; ?>">
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
          <div class="row">
              <div class="col-sm-3 wrkng_prtl">
            <h5>Hours to be Spent:-<p id="ttl_hrs"></p></h5><br>
            </div>  
            <div class="col-sm-3 wrkng_prtl">            
            <h5>Total Hours Spent:-<p id="Hours_spent"></p></h5><br>
             </div>
            <div class="col-sm-3 wrkng_prtl">
            <h5>Deficit Hours:-<p id="deficit_hrs"></p></h5>
             </div>
              <div class="col-sm-3 wrkng_prtl">
            <h5>Extra Hours:-<p id="extra_hrs"></p></h5>
             </div>
              </div>
        </div>
        </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p id="ins_errors" style="color:red;"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Tasks Records</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Task-Date</th>
                      <th scope="col">Project-Name</th>
                       <th scope="col">Task-Description</th>
                      <th scope="col">Task-Description</th>
                      <th scope="col">Status</th>
                     <th scope="col">Total-time-spent</th>
                      <th scope="col">Updated-on</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($task_summary as $task_summary){ ?>
                    <tr>
                      <td><?php echo date("d-m-Y",$task_summary->task_date); ?></td>
                      <td><?php echo $task_summary->project_name; ?></td>
                      <td><?php echo $task_summary->task_description; ?></td>
                      <td><button type="button" class="btn btn-default" onclick = getmssgdetails('<?php echo $task_summary->task_id;?>');>View Description</button></td>
                       <td><?php echo $task_summary->status; ?></td>
                      <td><?php echo $task_summary->total_time_spent; ?></td>
                      <td><?php echo $task_summary->updated_on; ?></td>
                    <td><a href="<?php echo base_url(); ?>Timesheet/task_entry?editid=<?php echo $task_summary->task_id; ?>"><i class="fa fa-edit green" aria-hidden="true" onclick="edittask('<?php echo $task_summary->task_id; ?>')"></i></a>
                      
                      <i class="fa fa-trash red" aria-hidden="true" onclick="deletetask('<?php echo $task_summary->task_id; ?>')"></i></td>
                    </tr>
                      <?php } ?>
                  </tbody>
                   <tfoot id="tfoot"><tr><td></td><td></td><td></td><td></td><td>Total Time spent</td><td id="tspent"><?php echo $total_time_spent; ?></td></tr></tfoot>
                  </table>
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

   <div class="modal fade" id="myModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
         <div class="modal-body">
          <div class="row">
          <div class="form-group col-md-8">
            <label for="email">Select Date</label>
            <input class="form-control datepicker start_date" autocomplete="off" name ="start_date" placeholder="Start date">
          </div>
           <div class="form-group col-md-4">
          <button type="button" class="btn green getbtnleavedate" onclick="getleavedate();"><i class="fa fa-plus"></i> Add Tasks</button>
        </div>
         <div class="row leave_apply_row">
              <div class="form-group col-md-4 project_name">
              </div>
               <div class="form-group col-md-4 project_description">
              </div>
              <div class="form-group col-md-4 fromdate">
              </div>
              <div class="form-group col-md-4 todate">
              </div>
              <div class="form-group col-md-4 status">
              </div>
        </div>
      </div>
       </div>  
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>   
    </div>
  </div>
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
             columns: [ 0,1,2,4,5,6]
          }},
           {
          extend: 'excel',
          footer: true,
          exportOptions: {
             columns: [ 0,1,2,4,5,6]
          }}],
       columnDefs: [
            {
                "targets": [ 2 ],
                "visible": false
            }
        ]
     });
   $('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    beforeShowDay: $.datepicker.noWeekends
 });
 });

function task_entry(){
  window.location.href="<?php echo base_url(); ?>Timesheet/task_entry";
}


function deletetask(id){
    if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Timesheet/deletetask",
 data:{
    "id":id,
},
     dataType:'json',
success:function(response){
  console.log(response);
 $("#ins_errors").html("your data has been successfully deleted");
  setTimeout(function(){
    location.reload();
  },3000);
}
});
}
}

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
  var name = $("#name_filter").val();
  var date = $(".task_date").val();
  var end_date = $(".end_task_date").val();
  if(name == "" && date == "" && end_date == ""){
     $("#filteration_err").html("Select a Employee name");
  }
  else if(name != "" && date == "" && end_date == ""){
     $("#filteration_err").html("Please select a date range or single date!!");
  }
   else if(name != "" && date == "" && end_date != ""){
     $("#filteration_err").html("Start date is required!!");
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
        ''+date+'',
        ''+value.project_name+'',
        ''+value.task_description+'',
        '<button type="button" class="btn btn-default" onclick = getmssgdetails('+value.task_id+');>View Description</button>',
        ''+value.status+'',
        ''+value.total_time_spent+'',
        ''+value.updated_on+'',
         '<a href="<?php echo base_url(); ?>Timesheet/task_entry?editid='+value.task_id+'"><i class="fa fa-edit green" aria-hidden="true" onclick = "editpayslip('+value.task_id+')"></i></a>'+'<i class="fa fa-trash red" onclick="deletetask('+value.task_id+')">'+'</i>'
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

$("#reset_opt").click(function(){
location.reload();
});
</script>
 </body>
 </html>
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
   <!-- Icons -->

   <link href="<?php echo base_url();?>vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>vendors/css/simple-line-icons.min.css" rel="stylesheet">
     
   <!-- Main styles for this application -->
   <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
   <link href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
   <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

   <!-- Styles required by this views -->
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Task_Entry</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Entry Task</div>
              <div class="panel-body" style="overflow: hidden;">
                    <form name="MyForm" id="bt_cpys" autocomplete="off">
                      <div class="row">
                    <?php if(!empty($edittask)){ ?>
                        <?php foreach($edittask as $edit) { ?>
                        <div class="form-group col-md-4">
                      <input type="hidden" id="btn_cntr_val_task" value ="<?php echo $edit->task_id; ?>">
                      <label for="ProjectName">ProjectName</label>
                      <input type="text" name="comments" id="project_name_val" class="form-control project_name_val" value ="<?php echo $edit->project_name; ?>">
                       </div>
                      <div class="form-group col-md-4">
                        <label for="email">Date</label>
                      <input class="form-control datepicker task_date" autocomplete="off" name ="task_date" id="up_task_date" value ="<?php echo date("d-m-Y",$edit->task_date); ?>" placeholder="Task Date">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="email">Task Description</label>
                      <textarea rows="2" cols="7" id="up_editor" class="form-control editor"><?php echo $edit->task_description; ?></textarea>
                        </div>
                        <div class="form-group col-md-4 status">
                          <label for="email">Status</label>
                        <select class="form-control status_val" id="up_status_val" name= "status_val">
                          <option value="<?php echo $edit->status; ?>"><?php echo $edit->status; ?></option>
                          <option value="completed">completed</option>
                          <option value="inprogress">In-progress</option>
                          <option value="Inhold">In-hold</option></select>
                        </div>
                        <div class="form-group col-md-4">
                      <input type="hidden" id="btn_cntr_val">
                      <label for="ProjectName">Total Time Spent</label>
                      <input type="number" name="time_spent" class="form-control time_spent" placeholder="Enter Time Spent" value="<?php echo $edit->total_time_spent; ?>">
                       </div>
                      </div>
                       <?php } ?>
                      <?php }else{ ?>
                      <div class="form-group col-md-4">
                      <input type="hidden" id="btn_cntr_val">
                      <label for="ProjectName">ProjectName</label>
                      <input type="text"  name="project_name_val" class="form-control project_name_val" placeholder="Enter Project Name">
                       </div>
                      <div class="form-group col-md-4">
                      <input type="hidden" id="btn_cntr_val">
                        <label for="email">Date</label>
                      <input class="form-control datepicker task_date" autocomplete="off" name ="task_date" placeholder="Task Date">
                      </div>
                      <div class="form-group col-md-4">
                          <label for="email">Task Description</label>
                      <textarea rows="2" cols="7" id="editor" class="form-control editor"></textarea>
                        </div>
                        <div class="form-group col-md-4 status">
                          <label for="email">Status</label>
                        <select class="form-control status_val" id="status_val" name= "status_val">
                          <option value="">Select an Option</option>
                          <option value="completed">completed</option>
                          <option value="inprogress">In-progress</option>
                          <option value="Inhold">In-hold</option></select>
                        </div>
                         <div class="form-group col-md-4">
                      <label for="ProjectName">Total Time Spent</label>
                      <input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="time_spent" class="form-control time_spent" placeholder="Enter Time Spent">
                      </div>
                      <?php } ?>
                      <?php if(ISSET($edittask) && !empty($edittask)) { ?>
                       <div class="form-group col-md-12" style="clear: both;">
                           <input type="button" class="btn btn-success" id="up_btn_req" value="Update Request">
                          <p id="up_leave_errors" style="color:red; font-size:15px;"></p>
                        </div>
                        <?php }else{ ?>
                         <div class="form-group col-md-12" style="clear: both;">
                           <input type="button" class="btn btn-success" id="btn_cat" value="Submit Request"> <input type="button" class="btn btn-success" id="reset_opt" value="Reset"> <p id="leave_errors" style="color:red; font-size:15px;"></p>
                        </div>
                        <?php } ?>
                    </form>
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
          <h4 id="view_mssg_res"></h4>
          <p id="view_mssg"></p>
       </div>  
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>

<script>
$(document).ready( function () {
$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    beforeShowDay: $.datepicker.noWeekends
 });
});

$(document).ready(function(){
$('#btn_cat').on('click', function(){
    var pro_name = $(".project_name_val").val();
    var date_applied = $(".task_date").val();
    var time_spent = $(".time_spent").val();
    var status = $(".status_val").val();
    var editor_err_show = $(".editor").val();
            if(pro_name == ""){
             errors = "Please select a Project";
            $("#leave_errors").html(errors);
            $("#leave_type_errors").empty();
            }else if(date_applied == ""){
            errors = "Please select a task date";
            $("#leave_errors").html(errors);
            $("#leave_type_errors").empty();
           }
           else if(editor_err_show == ""){
            errors = "Task description is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(status == ""){
            errors = "Status field is mandatory";
            $("#leave_errors").html(errors);
           }
            else if(time_spent == ""){
            errors = "Please enter time spent";
            $("#leave_errors").html(errors);
           }
           else if(time_spent == 0){
            errors = "You don't have sufficient time spent to add task!!";
            $("#leave_errors").html(errors);
           }
            else{
            $.ajax({  
                     url:"<?php echo base_url(); ?>Timesheet/upload_task",
                     method:"POST",  
                     data:{
                      "project_name_val":pro_name,
                      "task_date":date_applied,
                      "editor_name_val":editor_err_show,
                      "status":status,
                      "time_spent":time_spent
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data){
                      $("#leave_errors").html("Tasks succesfully uploaded").css("color", "green");
                      $(".time_spent").empty();
                        document.getElementById("bt_cpys").reset();
                         setTimeout(function(){
                           window.location.href="<?php echo base_url(); ?>Timesheet";

                        },2000);
                      }else{
                      $("#leave_errors").html("Unable to upload tasks!!");
                        document.getElementById("bt_cpys").reset();
                        $(".time_spent").empty();
                         setTimeout(function(){
                        window.location.href="<?php echo base_url(); ?>Timesheet";
                        },2000);}
                     } 
                     });
                   }
                 });

$('#up_btn_req').on('click', function(){
  var btn_cntr_val_task = $("#btn_cntr_val_task").val();
    var pro_name = $(".project_name_val").val();
    var date_applied = $(".task_date").val();
    var time_spent = $(".time_spent").val();
    var status = $(".status_val").val();
    var editor_err_show = $(".editor").val();
            if(pro_name == ""){
             errors = "Please select a Project";
            $("#leave_errors").html(errors);
            $("#leave_type_errors").empty();
            }else if(date_applied == ""){
            errors = "Please select a task date";
            $("#leave_errors").html(errors);
            $("#leave_type_errors").empty();
           }
           else if(editor_err_show == ""){
            errors = "Task description is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(status == ""){
            errors = "Status field is mandatory";
            $("#leave_errors").html(errors);
           }
            else if(time_spent == ""){
            errors = "Please enter time spent";
            $("#leave_errors").html(errors);
           }
           else if(time_spent == 0){
            errors = "You don't have sufficient time spent to add task!!";
            $("#leave_errors").html(errors);
           }
            else{
            $.ajax({  
                     url:"<?php echo base_url(); ?>Timesheet/update_task",
                     method:"POST",  
                     data:{
                      "id":btn_cntr_val_task,
                      "project_name_val":pro_name,
                      "task_date":date_applied,
                      "editor_name_val":editor_err_show,
                      "status":status,
                      "time_spent":time_spent
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data){
                      $("#up_leave_errors").html("Tasks succesfully updated").css("color", "green");
                        document.getElementById("bt_cpys").reset();
                         setTimeout(function(){
                          window.location.href="<?php echo base_url(); ?>Timesheet";
                        },2000);
                      }else{
                      $("#up_leave_errors").html("Unable to update tasks!!");
                        document.getElementById("bt_cpys").reset();
                         setTimeout(function(){
                        window.location.href="<?php echo base_url(); ?>Timesheet";
                        },2000);}
                     } 
                     });
                   }
                 });


             });

 
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

function valid_pro_name(){
$("#leave_errors").empty();
}

$("#reset_opt").click(function(){
window.location.href="<?php echo base_url(); ?>Timesheet"
});
</script>
 </body>
 </html>
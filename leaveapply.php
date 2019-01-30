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
  <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
   <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   <!-- Styles required by this views -->
  <style type="text/css">
    .removebttn{margin-top: 28px;}
  </style>
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Leave</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <button type="button" class="btn green" onclick="view_leave();">View Remaining Leaves</button>
          <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Apply Leave</div>
              <div class="panel-body" style="overflow: hidden;">
                    <form name="MyForm" autocomplete="off" id="MyForm">
                      <div class="row">
                      <div class="form-group col-md-4">
                        <input type="hidden" id="res_date">
                        <input type="hidden" id="btn_cntr_val">
                        <input type="hidden" id="btn_index">
                        <input type="hidden" id="em_id" value="<?php echo $id; ?>">
                       <p id="leave_type_errors" style="color:red; font-size:15px;"></p>
                          <label for="email">Leave type</label>
                          <select class="form-control" id="leave_type" name= "leave_type" onchange="getleaverow();">
                            <option value="">Select an Option</option>
                            <?php foreach($leave_type as $leave_type){?>
                            <option value="<?php echo $leave_type->leave_type; ?>"><?php echo $leave_type->leave_type; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <div style = "padding: 45px 0 0 0;" >
                           <button type="button" class="btn green getbtnleavedate" onclick="getleavedate();"><i class="fa fa-plus"></i></button>
                         </div>
                      </div>
                      </div>
                      <div class="button_rows">
                        
                      </div>
                        <div class="row">
                        <div class="form-group col-md-12">
                          <label for="email">Message</label>
                          <textarea class="form-control" id="editors" placeholder="Enter message" name="editor1" id="editor1" required></textarea>
                        </div>
                        </div>
                       <div class="form-group col-md-12" style="clear: both;">
                          <input type="button" class="btn btn-success" id="btn_cat" value="Submit Request">
                          <p id="leave_errors" style="color:red; font-size:15px;"></p>
                        </div>
                    </form>
              </div></div></div></div></div>
              <div class="row">
            <div class="col-md-12">
              <p id="filteration_err" style="color:red;"></p>
              <div class="panel panel-default">
              <div class="panel-heading">Leave Filter</div>
              <p></p>
               <div class="col-sm-12 col-md-12" style="display: inline-flex;">
                <div class="col-sm-3">
                  <select class="form-control" id="leaves_type" name= "leaves_type" onchange="getleaverow();">
                            <option value="">Select an Option</option>
                            <?php foreach($leaves_type as $leaves_type){?>
                            <option value="<?php echo $leaves_type->leave_type; ?>"><?php echo $leaves_type->leave_type; ?></option>
                            <?php } ?>
                  </select>
                  </div>
                <div class="col-sm-3" autocomplete="off">
                    <input type="text" class="form-control datepicker to_date" name ="to_date" id ="to_date" placeholder="Start date"></div>
             <div class="col-sm-3" autocomplete="off">
               <input type="text" class="form-control datepicker to_date" name ="end_date" id="end_date" placeholder="End date"></div>
                 <div class="col-sm-3">
                     <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                    <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
                 </div>
             </div>
            </div>
            </div></div>
              <div class="panel panel-default">
              <div class="panel-heading">Applied Leave</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">LeaveId</th>
                      <th scope="col">Leave-type</th>
                      <th scope="col">Leave-Pattern</th>
                      <th scope="col">Start-Date</th>
                      <th scope="col">End-Date</th>
                      <th scope="col">No-of-Days</th>
                      <th scope="col">Message</th>
                      <th scope="col">Applied-Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($leavedetails as $leavedetails){ ?>
                      <tr>
                      <td><?php echo $leavedetails->leave_id;?></td>
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
                      <?php if($leavedetails->status == 'pending' && $leavedetails->manager_approval == 'pending'){ ?>
                      <td><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                      <td><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                      <td><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                      <?php }else if($leavedetails->status == 'pending' && $leavedetails->manager_approval == 'approved'){?>
                         <td><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                        <td><a href="#" class="green"><i class="fa">&#xf00c;</i></a></td>
                        <td><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                        <?php }else if($leavedetails->status == 'approved' && $leavedetails->manager_approval == 'approved'){ ?>
                        <td><a href="#" class="green"><i class="fa">&#xf00c;</i></a></td>
                        <td><a href="#" class="green"><i class="fa">&#xf00c;</i></a></td>
                      <td><a href="#" onclick = statusupdate('<?php echo $leave_value = str_replace(' ','',$leavedetails->leave_type); ?>','<?php echo $leavedetails->leave_id;?>','<?php echo $leavedetails->applicant_email;?>','cancel');><i style="font-size:24px" class="fa red">&#xf00d;</i></a></td>
                      <?php }else if($leavedetails->status == 'canceled' && $leavedetails->manager_approval == 'canceled'){ ?>
                        <td><a href="#" class="red"><i class="fa">&#xf00d;</i></a></td>
                        <td><a href="#" class="red"><i class="fa">&#xf00d;</i></a></td>
                        <td><a href="#" class="red"><i class="fa">&#xf00d;</i></a></td>
                      <?php }else if($leavedetails->status == 'rejected'){ ?>
                        <td><a href="#"><i style="font-size:24px" class="fa red">&#xf00d;</i></a></td>
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
        <h4 class="modal-title">Message</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
         <div class="modal-body">
          <h4 id="view_mssg_res"></h4>
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
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
<script>
var editor = CKEDITOR.replace( 'editor1' );
var button_index = $("#btn_index").val();
$(document).ready( function () {
    $('.myTable').DataTable({
      dom: 'Bfrtip',
           "order": [[ 0, "desc" ]],
          columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false
            }],
      });});
function removerow(index){
  console.log(index);
  $('#row'+index).remove();
  }
function getleavedate(){
  button_index ++;
  $(".leave_apply_row").show();
  $("#btn_cntr_val").val(1);
  var leave_type = $("#leave_type").val();
  var leave_errors = $("#leave_errors").html();

    if(leave_type == "" && leave_errors == ""){
        $("#leave_type_errors").html("please choose an leave type");
    }
   else if(leave_type == "Casual Leave"){
    $('.button_rows').append('<div id="row'+button_index+'" class="row leave_apply_row"><div class="form-group col-md-3 leave_pattern_types"><label for="email">Leave Pattern</label><select class="form-control leave_pattern" id="leave_pattern" name= "leave_pattern"><option value="">Select an Option</option><option value="Fullday">Fullday</option><option value="Halfday">Halfday</option></select></div><div class="form-group col-md-3 fromdate"><label for="email">From</label><input class="form-control casdatepicker start_date" name ="start_date" placeholder="Start date"></div><div class="form-group col-md-3 todate"><label for="email">To</label><input class="form-control casdatepicker to_date" name ="to_date" placeholder="End date"></div><div class="form-group col-md-3 remove_btn"><button type="button"  class="btn removebttn" onclick="removerow('+button_index+')">Remove</button></div></div>');
    $("#leave_type_holiday").hide();
    $("#res_holiday_date").hide();
    $("#leave_type_errors").empty();
    $(".leave_pattern_types").show();
    $(function () {
    $('.casdatepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      minDate: +3,
      beforeShowDay: $.datepicker.noWeekends
    });
    });
    $(function () {
    $('.casdatepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      minDate: +3,
      beforeShowDay: $.datepicker.noWeekends
    });
    });
    }else if(leave_type == "Sick Leave"){
    $("#leave_type_holiday").hide();
    $("#res_holiday_date").hide();
    $("#leave_type_errors").empty();
    $(".leave_pattern_types").show();
     $('.button_rows').append('<div id="row'+button_index+'" class="row leave_apply_row"><div class="form-group col-md-3 leave_pattern_types"><label for="email">Leave Pattern</label><select class="form-control leave_pattern" id="leave_pattern" name= "leave_pattern"><option value="">Select an Option</option><option value="Fullday">Fullday</option><option value="Halfday">Halfday</option></select></div><div class="form-group col-md-3 fromdate"><label for="email">From</label><input class="form-control datepicker start_date" name ="start_date" placeholder="Start date"></div><div class="form-group col-md-3 todate"><label for="email">To</label><input class="form-control datepicker to_date" name ="to_date" placeholder="End date"></div><div class="form-group col-md-3 remove_btn"><button type="button" class="btn removebttn" onclick="removerow('+button_index+')">Remove</button></div></div>');
    $(function () {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      beforeShowDay: $.datepicker.noWeekends
    });
    });
    $(function () {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      beforeShowDay: $.datepicker.noWeekends
    });
    });
  }else if(leave_type == "LOP"){
    $("#leave_type_holiday").hide();
    $("#res_holiday_date").hide();
    $("#leave_type_errors").empty();
    $(".leave_pattern_types").show();
     $('.button_rows').append('<div id="row'+button_index+'" class="row leave_apply_row"><div class="form-group col-md-3 leave_pattern_types"><label for="email">Leave Pattern</label><select class="form-control leave_pattern" id="leave_pattern" name= "leave_pattern"><option value="">Select an Option</option><option value="Fullday">Fullday</option><option value="Halfday">Halfday</option></select></div><div class="form-group col-md-3 fromdate"><label for="email">From</label><input class="form-control datepicker start_date" name ="start_date" placeholder="Start date"></div><div class="form-group col-md-3 todate"><label for="email">To</label><input class="form-control datepicker to_date" name ="to_date" placeholder="End date"></div><div class="form-group col-md-3 remove_btn"><button type="button" class="btn removebttn" onclick="removerow('+button_index+')">Remove</button></div></div>');
    $(function () {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      beforeShowDay: $.datepicker.noWeekends
    });
    });
    $(function () {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      beforeShowDay: $.datepicker.noWeekends
    });
    });
  }else if(leave_type == "Restricted Holiday"){
      $("#leave_type_errors").empty();
      $(".leave_pattern_types").hide();
       $.ajax({
          type:"POST",
          url:"<?php echo base_url(); ?>Employeedashboard/get_restricted_holiday",
          data:{},
          dataType:'json',
            success:function(response){
              console.log(response);
              $(".leave_type_holiday").empty();
              $('.button_rows').append('<div id="row'+button_index+'" class="row leave_apply_row"><div class="form-group col-md-3 fromdate"><label for="email">Choose Holiday</label><select class="form-control leave_type_holiday" id="leave_type_holiday" name= "leave_type"><option value="">Select an Holiday</option></select></div><div class="form-group col-md-4 remove_btn"><button type="button" class="removebttn btn" onclick="removerow('+button_index+')">Remove</button></div></div>');
            $.each(response,function(key,value){
              var todays_date = new Date();
              var show_day = todays_date.getDate()+3;
              var show_month = todays_date.getMonth()+1;
              var show_yyyy = todays_date.getFullYear();
              var show_today = show_month +"/"+  show_day +"/"+ show_yyyy;
              var holiday_dates = value.holiday_date;
              var date_to_shown = holiday_dates.split('-');
              var res_hol_date = date_to_shown[1] +"/"+ date_to_shown[0] +"/"+ date_to_shown[2];
              console.log(new Date(res_hol_date).getTime());
              console.log(new Date(show_today).getTime());
              if(new Date(res_hol_date).getTime() > new Date(show_today).getTime()){
            $(".leave_type_holiday").append('<option value="'+value.holiday_name+'-'+value.holiday_date+'">'+value.holiday_name+' - '+value.holiday_date+'</option>');
            }});
            }
            });
            }
}

$(document).ready(function(){
       $('.datepicker').datepicker({
          dateFormat: 'yy-mm-dd',
          beforeShowDay: $.datepicker.noWeekends
      });
     });

$(document).ready(function(){
$('#btn_cat').on('click', function(){
    var leave_type = $("#leave_type").val();
    var leave_pattern = [];
    var start_date = [];
    var end_date = [];
    var leave_type_holiday = $("#leave_type_holiday").val();
     var message = editor.getData();
      var btn_cntr_val = $("#btn_cntr_val").val();
      var pattern_err_show;
      var start_err_show;
      var to_err_show;
      var leave_pattern_errs;
      var start_date_err;
      var to_date_err;
           var errors;
           $(".leave_pattern").each(function(){
             leave_pattern_errs = $(this).val();
            if(leave_pattern_errs == ""){
              pattern_err_show = "false";
            }else{
             pattern_err_show = "true";
            leave_pattern.push($(this).val());
            }
           });
           $(".start_date").each(function(){
             start_date_err = $(this).val();
            if(start_date_err == ""){
                start_err_show = "false";
            }else{
               start_err_show = "true";
              start_date.push($(this).val());
            }
           });
           $(".to_date").each(function(){
             to_date_err = $(this).val();
            if(to_date_err == ""){
              to_err_show = "false";
            }else{
              to_err_show = "true";
            end_date.push($(this).val());
            }
           });
           if(leave_type == ""){
            $("#leave_errors").html("Please fill up leave type").css("color", "red");
            $("#leave_type_errors").empty();
           }
           else if(btn_cntr_val == 0){
            $("#leave_errors").html("Leave field is empty.Please apply leave!!!").css("color", "red");
           }
           else if(leave_type != "Restricted Holiday" && pattern_err_show == "false"){
            $("#leave_errors").html("Leave pattern should not be empty");
           }
           else if(start_err_show == "false" && leave_type != "Restricted Holiday"){
            $("#leave_errors").html("Start date should not be empty");
           }
           else if(leave_type == "Restricted Holiday" && message == ''){
            $("#leave_errors").html("Message should not be empty");
           }
           else if(message == "" && leave_type != "Restricted Holiday"){
            $("#leave_errors").html("Message should not be empty");
           }
           else if(message != "" && leave_type != "Restricted Holiday"){
            $.ajax({  
                     url:"<?php echo base_url(); ?>Employeedashboard/validate_date",
                     method:"POST",  
                     data:{
                      "leave_pattern":leave_pattern,
                      "start_date":start_date,
                      "end_date":end_date
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data.length != 0 && data != 4){
                        if(data == 0){
                         $("#leave_errors").html("Incorrect date choosen.Start date cannot be greater than End date");
                      }else if(data == 1){
                         $("#leave_errors").html("Start date to end date should be same for half day");
                      }else if(data == 3){
                         $("#leave_errors").html("Invalid Leave apply.You cannnot apply multiple leave on same date!!");
                      }
                      }else if(data == 4 && data.length != 0 || data.length == 0){
                        $.ajax({  
                     url:"<?php echo base_url(); ?>Employeedashboard/check_remaining_leaves",
                     method:"POST",  
                     data:{
                      "leave_type":leave_type,
                      "leave_pattern":leave_pattern,
                      "start_date":start_date,
                      "end_date":end_date
                     }, 
                     success:function(data)  
                     { 
                      console.log(data);
                      if(data == 0){
                      $("#leave_errors").html("Insufficient Leave.Cannot apply for leave").css("color", "red");
                       document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }else if(data == 2){
                        $("#leave_errors").html("Previous leave update is pending.Cannot update leave now!!").css("color", "red");
                         document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }else if(data != 2 && data != 0){
                    var sto_tot_leave = $("#sto_tot_leave").val();
                    var leave_type_holiday = $("#leave_type_holiday").val();
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employeedashboard/apply_leave",
                     method:"POST",  
                     data:{
                      "leave_type":leave_type,
                      "leave_pattern":leave_pattern,
                      "start_date":start_date,
                      "end_date":end_date,
                      "leave_type_holiday":leave_type_holiday,
                      "message":message
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data == 0){
                    $("#leave_errors").html("Insufficient Leave.Cannot apply for leave");
                    $(".leave_apply_row").empty();
                        document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }
               else if(data != 0){
                      $(".leave_apply_row").empty();
                      $("#leave_errors").html("Leave successfully uploaded").css("color", "green");
                        document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
               }else if(data == 1){
                  $(".leave_apply_row").empty();
                  $("#leave_errors").html("Leave successfully uploaded").css("color", "green");
                        document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
               }else{
                 errors = "Insufficient Leave.Cannot apply for leave!";
                 $("#leave_errors").html(errors);
                 $("#leave_type").val('');
                 $(".fromdate").empty();
                 $(".todate").empty();
                 $(".leave_pattern_types").empty();
                  CKupdate();
                     }
                     } });}}
                     });
                     }} 
                      });
                      }else if(message != "" && leave_type == "Restricted Holiday"){
              $.ajax({  
                     url:"<?php echo base_url(); ?>Employeedashboard/check_remaining_leaves",
                     method:"POST",  
                     data:{
                      "leave_type":leave_type,
                      "leave_pattern":leave_pattern,
                      "start_date":start_date,
                      "end_date":end_date
                     }, 
                     success:function(data)  
                     { 
                      console.log(data);
                      if(data == 0){
                      $("#leave_errors").html("Insufficient Leave.Cannot apply for leave").css("color", "red");
                       document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }else if(data == 2){
                        $("#leave_errors").html("Previous leave update is pending.Cannot update leave now!!").css("color", "red");
                         document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }else if(data != 2 && data != 0){
                    var sto_tot_leave = $("#sto_tot_leave").val();
                    var leave_type_holiday = $("#leave_type_holiday").val();
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employeedashboard/apply_leave",
                     method:"POST",  
                     data:{
                      "leave_type":leave_type,
                      "leave_pattern":leave_pattern,
                      "start_date":start_date,
                      "end_date":end_date,
                      "leave_type_holiday":leave_type_holiday,
                      "message":message
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data == 0){
                    $("#leave_errors").html("Insufficient Leave.Cannot apply for leave");
                    $(".leave_apply_row").empty();
                        document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }
               else if(data != 0){
                      $(".leave_apply_row").empty();
                      $("#leave_errors").html("Leave successfully uploaded").css("color", "green");
                        document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
               }else if(data == 1){
                  $(".leave_apply_row").empty();
                  $("#leave_errors").html("Leave successfully uploaded").css("color", "green");
                        document.getElementById("MyForm").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
               }else{
                 errors = "Insufficient Leave.Cannot apply for leave!";
                 $("#leave_errors").html(errors);
                 $("#leave_type").val('');
                 $(".fromdate").empty();
                 $(".todate").empty();
                 $(".leave_pattern_types").empty();
                  CKupdate();
                     }
                     }});}}
            });}});});
                      

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


function statusupdate(leave_type,id,name,status){
  if(confirm("Are you sure want to cancel the leave request!")){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Employeedashboard/cancel_leave_request",
  data:{
    "leave_type":leave_type,
    "id":id,
    "name":name,
    "status":status
 },
  dataType:'json',
success:function(response){
  console.log(response);
  alert("Request succesfully updated!")
  location.reload();
}
});
}
}


$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  $(".wrkng_prtl").show();
  var start_dt = $("#to_date").val();
  var end_dt = $("#end_date").val();
  var leave_type = $("#leaves_type").val();
  var id = $("#em_id").val();
  if(start_dt == "" && end_dt == "" && leave_type == ""){
     $("#filteration_err").html("Select a Employee name/Leave type Or Date Range");
     $("#ins_errors").hide();
  }
   else if(start_dt == "" && end_dt != ""){
     $("#filteration_err").html("Start date is required!!");
      $(".ins_errors").hide();
  }
   else if(start_dt > end_dt && end_dt != ""){
     $("#filteration_err").html("Start date cannot be greater than end date!!");
      $(".ins_errors").hide();
  }
  else {
    $("#filteration_err").empty();
    $(".ins_errors").hide();
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Leave/filtration_details",
    data:{
    "name":id,
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
  var total_days = '';
  var leave_type = value.leave_type;
  var leave_type_spc = leave_type.replace(' ','');
  if(value.leave_pattern === null){
     leave_pattern = 'NA';
  }else{
       leave_pattern = ''+value.leave_pattern+'';
  }

  if(value.leave_to_date === null && value.total_days === null){
     to_date = 'NA';
     total_days = 'NA';
  }else{
       to_date = ''+value.leave_to_date+'';
       total_days = ''+value.total_days+'';
  }
  if(value.status == 'pending' || value.status == 'cancel_request'){
    manager_query = '<i class="fa fa-clock-o" aria-hidden="true"></i>'
    }else if(value.status == 'approved'){
      manager_query = '<a href="#"><i style="font-size:24px" class="fa green">&#xf00c;</i></a><a href="#" onclick = statusupdate("'+leave_type_spc+'",'+value.leave_id+',"'+value.applicant_email+'","cancel");><i style="font-size:24px" class="fa red">&#xf00d;</i></a>';
    }else if(value.status == 'rejected' || value.status == 'canceled'){
       manager_query = '<a href="#"><i style="font-size:24px" class="fa red">&#xf00d;</i></a>';
    }
  dataTable.row.add([
        ''+value.leave_id+'',
        ''+value.leave_type+'',
        ''+leave_pattern+'',
        ''+value.leave_from_date+'',
        ''+to_date+'',
        ''+total_days+'',
        '<button type="button" class="btn btn-default" onclick = getmssgdetails('+value.leave_id+',"'+value.applicant_email+'");>View</button>',
        ''+value.appiled_date+'',
        ''+manager_query+'',
    ]).draw();
});}else{
   dataTable.clear();
   dataTable.row.add([
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found'
    ]).draw();
}}
});
}});
});

$("#reset_opt").click(function(){
location.reload();
});

function view_leave(){
  window.location.href="<?php echo base_url(); ?>Employeedashboard/Available_leave";
}

function res_holiday(date){
  $("#res_date").val(date);
}
function getleaverow(){
  $(".leave_apply_row").empty();
  $("#btn_index").val(0)
  $("#btn_cntr_val").val(0);
      $(".leave_pattern_types").empty();
       $("#leave_type_errors").empty();
      $("#leave_errors").html('');
      $(".fromdate").empty();
      $(".todate").empty();
      $(".remove_btn").empty();
}
function CKupdate(){
  CKEDITOR.instances.editors.setData('');
}


</script>
 </body>
 </html>
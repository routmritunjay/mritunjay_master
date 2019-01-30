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
   <!-- Icons -->

   <link href="<?php echo base_url();?>vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url();?>vendors/css/simple-line-icons.min.css" rel="stylesheet">
     
   <!-- Main styles for this application -->
   <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
   <link rel="<?php echo base_url();?>stylesheet" href="css/bootstrap.css">
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

   
   <!-- Styles required by this views -->
 <style>
   p{
    color:green;
   }
 </style>
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">Attendance</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">Attendance</div>
               <div class="panel-body" style="overflow: hidden;">
                <p id="filteration_err" style="color:red;"></p>
                <div class="col-sm-12 col-md-12" style="display: inline-flex;">
               <div class="col-sm-3" autocomplete="off">
          <input type="text" class="form-control datepicker to_date" name ="to_date" id ="to_date" placeholder="Start date"></div>
             <div class="col-sm-3" autocomplete="off">
           <input type="text" class="form-control datepicker to_date" name ="end_date" id="end_date" placeholder="End date"></div>
              <div class="col-sm-6">
                <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
              </div></div></div>
            </div>
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
              <div class="col-sm-12">
                 <p id="filteration_err" style="color:red;"></p>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Time-Sheet</div>
              <div class="panel-body">
                <table class="table table-bordered myTable" id="myTable">
                  <thead>
                    <tr>
                    <th scope="col">LeaveId</th>
                      <th scope="col">Attendance-Date</th>
                      <th scope="col">Login-Time</th>
                      <th scope="col">Logout-Time</th>
                      <th scope="col">Total-Working-Hours</th>
                      <th scope="col">Deficient-Hours</th>
                      <th scope="col">Extra-Hours</th>
                       <th scope="col">Updated-on</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                  <?php foreach($payroll_res as $payroll_res){ ?>
                  <?php if($payroll_res->attendence_date != '' && $payroll_res->attendence_date != 0) { ?>
                  <?php 
                  date_default_timezone_set('Asia/Kolkata');
                  $attendence_date = date('d-m-Y',$payroll_res->attendence_date);
                  $diff_hrs = strtotime('9:00') - strtotime($payroll_res->total_working_hrs);
                  $res_hrs = floor($diff_hrs / 3600);
                  $res_min_string1 = floor(($diff_hrs / 60) % 60);
                  $res_min = ($res_min_string1 < 10 ? '0'.$res_min_string1 : $res_min_string1);
                  $deficient_hrs = "$res_hrs:$res_min";
                  ?>
                  <tr>
                  <td><?php echo $payroll_res->id ; ?></td>
                  <td><?php echo $attendence_date ; ?></td>
                  <td><?php echo $payroll_res->login_time;?></td>
                  <td><?php echo $payroll_res->logout_time;?></td>
                  <td><?php echo $payroll_res->total_working_hrs;?></td>
                  <?php if($payroll_res->deficient_hrs == "-".$payroll_res->deficient_hrs.""){ ?>
                    <td>0:00</td>
                  <?php }else{ ?>
                  <?php if($payroll_res->login_time == "" && $payroll_res->logout_time == ""){ ?>
                  <td>0:00</td>
                  <?php }else{?>
                  <?php if(strtotime($payroll_res->total_working_hrs) >= strtotime('9:00')){?>
                    <td>0:00</td>
                    <?php }else{?>
                  <td><?php echo $deficient_hrs; ?></td>
                  <?php }}} ?>
                  <?php if($payroll_res->login_time == "" && $payroll_res->logout_time == ""){ ?>
                  <td>0:00</td>
                  <?php }else{?>
                  <?php if(strtotime('9:00') >= strtotime($payroll_res->total_working_hrs)){?>
                  <td>0:00</td>
                  <?php }else{ 
                  $ext_hrs = strtotime($payroll_res->total_working_hrs) - strtotime('9:00');
                  $extra_hrs = floor($ext_hrs / 3600);
                  $extra_min_string1 = floor(($ext_hrs / 60) % 60);
                  $extra_min = ($extra_min_string1 < 10 ? '0'.$extra_min_string1 : $extra_min_string1);
                  $res_extra_time = "$extra_hrs:$extra_min";
                  ?>
                  <td><?php echo $res_extra_time; ?></td>
                  <?php }} ?>
                  <td><?php echo $payroll_res->updated_on;?></td>
                  </tr>
                  <?php } ?>
                  <?php } ?>
                  </tbody>
                  <tfoot id="tfoot"><tr><td>Hour to be spent</td><td id="tspent"></td><td>Total Hours Spent</td><td id="hspent"><td>Deficit Hours</td><td id="defhrs"><td>Extra Hours</td><td id="exthrs"></tr></tfoot>
                  </table>
              </div>
            </div>
           </div>
         </div>
     </main>
   </div>
<footer class="app-footer footerbg text-center">Intelex Systems © 2018 Intelex Systems Inc. </footer>
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/popper.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="<?php echo base_url();?>vendors/js/Chart.min.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="<?php echo base_url();?>js/views/.main.js"></script>
    <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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
    $(".wrkng_prtl").hide();
    var dataTable = $('.myTable').DataTable({
      dom: 'lBfrtip',
      order: [[ 0, "asc" ]],
        buttons: [
            {
          extend: 'pdf',
          footer: true,
          },
            {
          extend: 'excel',
          footer: true,}
        ],
     });
       dataTable.columns( [0] ).visible( false);
      });

$(document).ready( function () {
    $('.myTable').DataTable();
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      beforeShowDay: $.datepicker.noWeekends
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
  window.location.href="<?php echo base_url(); ?>";
}
});
}


$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  var start_dt = $("#to_date").val();
  var end_dt = $("#end_date").val();
  if(start_dt == "" && end_dt == ""){
     $("#filteration_err").html("Please select date range!");
      $(".wrkng_prtl").hide();
  }
  else if(start_dt == "" && end_dt != ""){
     $("#filteration_err").html("Please select a start date!");
      $(".wrkng_prtl").hide();
  }
   else if(start_dt > end_dt && end_dt != ""){
     $("#filteration_err").html("Invalid date selection.Start date should be less than end date!!");
         $(".wrkng_prtl").hide();
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
  else {
    $("#filteration_err").empty();
    $(".wrkng_prtl").show();
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Employee_attendence/filtration_details",
    data:{
    "start_dt":start_dt,
    "end_dt":end_dt
     },
     dataType:'json',
success:function(response){
  console.log(response);
  $("#tdetails").empty();
    if(response != ""){
    dataTable.clear();
   $.each(response,function(key,value){
    var new_date = new Date(value.attendence_date * 1000);
    var year = new_date.getFullYear();
    var month = new_date.getMonth() + 1;
    var expday = new_date.getDate();
    var day = (expday < 10 ? '0': '') + expday;
    var date = day +'-'+month+'-'+year;
    var deficit_hr = '';
    var extra_hr = '';
    var extra_min = '';
    var deficit_min = '';
    var ttl_hr = new Date("January 13, 2018 " + "9:00");
    ttl_hr = ttl_hr.getTime();
     var worked_hr = value.total_working_hrs;
     var endt = new Date("January 13, 2018 " + worked_hr);
     endt = endt.getTime();
    if(value.login_time == '' && value.logout_time == '' ){
          deficit_hr = 00;
          deficit_min = 00;
          extra_hr = 00;
          extra_min = 00;
     }else if(endt > ttl_hr){
      var defic_min = value.deficient_hrs+'min';
      defic_min_str1 =  defic_min.replace('-','');
      defic_min_str2 =  defic_min_str1.replace('min','');
        deficit_hr = 00;
        deficit_min = 00;
        extra_string1 = parseInt(endt) - parseInt(ttl_hr);
        extra_hr = Math.floor((extra_string1 / 1000) / 3600);
        ext_min_val1 = parseInt(extra_hr * 60) - parseInt(defic_min_str2)+'min';
        ext_min_val2 = ext_min_val1.replace('-','');
        extra_min = ext_min_val2.replace('min','');
    }else if(endt < ttl_hr){
        deficit_hr = Math.floor(value.deficient_hrs/60);
        deficient_string1 = parseInt(Math.floor(deficit_hr) * 60) - parseInt(value.deficient_hrs)+'min';
        deficit_min_string2 = deficient_string1.replace('-','');
        deficit_min = deficit_min_string2.replace('min','');
        extra_hr = 00;
        extra_min = 00;
    }
     dataTable.row.add([
     	''+value.id+'',
        ''+date+'',
        ''+value.login_time+'',
        ''+value.logout_time+'',
        ''+value.total_working_hrs+'',
        ''+deficit_hr+':'+deficit_min+'',
        ''+extra_hr+':'+extra_min+'',
        ''+value.updated_on+''
    ]).draw();
   });
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
$.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Employee_attendence/workinghrs_details",
    data:{
    "start_dt":start_dt,
    "end_dt":end_dt
     },
     dataType:'json',
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    console.log(value);
   var ttl_hrs = parseInt(value.id) * parseInt(9);
   var worked_hrs = "";
   var deficient_min = "";
   var diff_wrkd_hrs = parseInt(ttl_hrs) - parseInt(value.total_working_hrs);
   console.log(diff_wrkd_hrs);
   var deficient_left_hrs = "";
   var extra_min = "";
    var sub_hr = "";
    var extra_sub_min = "";
    if(value.total_working_hrs === null){
      worked_hrs = "00:00";
      deficit__hrs = 0;
      deficient_left_hrs = 0;
      sub_hr = 0;
      extra_sub_min = 0;
    }
   else if(diff_wrkd_hrs > 0){
    worked_hrs = value.total_working_hrs;
    deficient_min  = value.deficient_hrs;
    var deficient_hrs =  Math.floor(value.deficient_hrs/60);
    deficient_hrs_string1 = deficient_hrs + 'hrs';
    deficit__hrs_string2 = deficient_hrs_string1.replace('-','');
    deficit__hrs = deficit__hrs_string2.replace('hrs','')
         if(deficient_hrs > 0){
          deficient_string1 = parseInt(Math.floor(deficient_hrs) * 60) - parseInt(value.deficient_hrs)+'min';
          deficient_string2 = deficient_string1.replace('-','');
          deficient_left_hrs = deficient_string2.replace('min','');
         }else{
          deficient_string1 = parseInt(Math.floor(deficient_hrs) * 60) - parseInt(value.deficient_hrs)+'min';
          deficient_string2 = deficient_string1.replace('-','');
          deficient_left_hrs = deficient_string2.replace('min','');
         }
         sub_hr = 0;
         extra_sub_min = 0;
   }else if(diff_wrkd_hrs <= 0){
    worked_hrs = value.total_working_hrs;
    deficient_min  = 0;
    deficit__hrs = 0;
    deficient_left_hrs = 0;
    var extra_sub_hr = Math.floor(diff_wrkd_hrs) +'hrs';
    extra_sub_hr_string1 = extra_sub_hr.replace('-','');
    sub_hr = extra_sub_hr_string1.replace('hrs','');
    extra_sub_min = parseInt(Math.floor(diff_wrkd_hrs) * 60) - parseInt(value.deficient_hrs);
   }
  $("#ttl_hrs,#tspent").html(ttl_hrs +':'+'00:00');
   $("#Hours_spent,#hspent").html(worked_hrs);
   $("#deficit_hrs,#defhrs").html(deficit__hrs+':'+deficient_left_hrs+':'+'0');
   $("#extra_hrs,#exthrs").html(sub_hr+':'+extra_sub_min +':'+'0');
});
}
});
}
});

$("#reset_opt").click(function(){
$(".wrkng_prtl").hide();
location.reload();
});
});

</script>
 </body>
 </html>
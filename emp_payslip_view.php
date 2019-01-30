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
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Payslip</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
           <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">Payslip - Filter</div>
            <div class="panel-body">
              <p id="filteration_err" style="color:red;"></p>
              <div class="col-sm-12 col-md-12" style="display: inline-flex;">
              <div class="col-md-5">
                <input class="form-control" type="month" name="month" id="fil_month" min="2018-01" max="2022-01">     
                </div>
                <div class="col-md-6">
   <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                    <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
                 </div>
                  
              
                </div>
                  </div>
          </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
              <div class="panel-heading">Payslip</div>
              <div class="panel-body">
                <table class="table table-bordered myTable" id="tdetails">
                  <thead>
                    <tr>
                      <th scope="col">Month</th>
                      <th scope="col">Payslips</th>
                      <th scope="col">Updatedon</th>
                    </tr>
                  </thead>
                  <tbody id="tbdydtls">
                    <?php foreach($payslipdetails as $payslip_details){ ?>
                      <tr>
                       <td><?php echo $payslip_details->payslip_month;?>-<?php echo $payslip_details->payslip_year;?></td>
                       <td><a href='<?php echo base_url(); ?><?php echo $payslip_details->uploaded_payslip;?>' target='_blank' height='70'><?php echo $payslip_details->uploaded_payslip; ?></a></td>
                      <td><?php echo $payslip_details->update_date; ?></td>
                      </tr>
                    <?php }?>
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
     </main>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
   <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
<script>
$(document).ready( function () {
    var dataTable = $('.myTable').DataTable();
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
  var fil_month = $("#fil_month").val();
  var month = fil_month.split("-");
  var final_month = moment.monthsShort(month[1] - 1);
  var year = month[0];
  if(fil_month == ""){
     $("#filteration_err").html("Please select a month");
  }
  else {
    $("#filteration_err").empty();
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Employeedashboard/filtration_details",
    data:{
    "final_month":final_month,
    "year":year
     },
     dataType:'json',
success:function(response){
  console.log(response);
  $("#tbdydtls").empty();
  if(response != ""){
  dataTable.clear();
   $.each(response,function(key,value){
    var str = value.payslip_month;
    var url = "<?php echo base_url();?>"+value.uploaded_payslip;
    dataTable.row.add([
        ''+value.payslip_month+'-'+value.payslip_year+'',
        '<a target=_blank href='+url+'>'+value.uploaded_payslip+'</a>',
        ''+value.update_date+''
    ]).draw();
   });
 }else{
 dataTable.clear();
   dataTable.row.add([
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
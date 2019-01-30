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
         <li class="breadcrumb-item active">Payslip</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default payslip_det">
              <div class="panel-heading">Payslip</div>
              <div class="panel-body" style="overflow: hidden;">
                    <form name="MyForm" autocomplete="off" id="btn_cat_pay" enctype="multipart/form-data">
                      <div class="form-group col-md-7">
                        <input type="hidden" id="emp_id" name="emp_id">
                        <input type="hidden" id="prev_img" name="prev_img">
                        </div>
                        <div class="form-group col-md-7">
                          <label for="email">Upload-Payslip</label>
                          <input class="form-control" type="file" name="payslip" id="payslip" placeholder="upload zip here">
                          <span id="up_image"></span>
                        </div>
                       <div class="form-group">
                          <input type="submit" class="btn btn-success" id="btn_cat_vals" value="Submit">
                        </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
        <p id="ins_errors" style="color:red; font-size:15px;"></p>
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">Payslip - Filter</div>
              <p id="filteration_err" style="color:red;"></p>
              <div class="col-sm-12 col-md-12" style="display: inline-flex;">
                <div class="col-sm-5">
                  <select name="job_role" class="form-control" id="name_filter">
                    <option value="" disabled selected hidden>Select An Employees</option>
                    <?php foreach($all_emp as $all_emp){ ?>
                     <option value="<?php echo $all_emp->uniqueID; ?>"><?php echo $all_emp->first_name; ?> <?php echo $all_emp->last_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                   <div class="col-md-3">
                     <input class="form-control" type="month" name="month" id="fil_month" min="2018-01" max="2022-01">     
                </div>
                 <div class="col-md-3">
                   <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                    <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
                 </div>
          </div>
        </div>
        </div>
          </div>
              <div class="panel panel-default">
              <div class="panel-heading">Payslip List</div>
              <div class="panel-body">
                <table class="table table-bordered myTable" id="tdetails">
                  <thead>
                    <tr>
                      <th scope="col">Employee-Name</th>
                      <th scope="col">Month</th>
                      <th scope="col">Payslips</th>
                      <th scope="col">Updated-on</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tbdydtls">
                    <?php foreach($payslip_details as $payslip_details){ ?>
                      <tr>
                      <td><?php echo $payslip_details->first_name; ?><?php echo $payslip_details->last_name; ?></td>
                      <td><?php echo $payslip_details->payslip_month;?>-<?php echo $payslip_details->payslip_year;?></td>
                      <td><a href='<?php echo $payslip_details->uploaded_payslip;?>' target='_blank' height='70'><?php echo $payslip_details->uploaded_payslip; ?></a></td>
                      <td><?php echo $payslip_details->update_date; ?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editpayslip('<?php echo $payslip_details->payslip_id;?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick="deletepayslip('<?php echo $payslip_details->payslip_id; ?>')"></i></td>
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
<script>
$(document).ready( function () {
    var dataTable = $('.myTable').DataTable({
    	"order": [[3, "desc" ]]
    });
    $(".payslip_det").hide();
    $.ajax({  
                     url:"Payslips/upload_payslip",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,    
                     success:function(data)  
                     {
                      console.log(data);
                      if(isNaN(data)){
                      }else{
                      $("#ins_errors").html(""+data+" payslip has been succesfully uploaded").css("color", "green");
                      setTimeout(function(){
                        location.reload();
                       },5000);
                      }
                     } 
                     });
});

$(document).ready(function(){
      $('#btn_cat_pay').on('submit', function(event){
        event.preventDefault();
      var uploaded_file = $("#payslip").val();
      var btn_value = $("#btn_cat_vals").val();
      if(btn_value == "update"){
                  $.ajax({  
                     url:"Payslips/update_payslip",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data == "true" || data == 1){
                         $("#ins_errors").html("Payslip successfully updated").css("color", "green");
                        document.getElementById("btn_cat_pay").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                      }else{
                        $("#ins_errors").html("File updation failed!");
                        document.getElementById("btn_cat_pay").reset();
                         setTimeout(function(){
                          location.reload();
                        },3000);
                       }
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


function deletepayslip(id){
    $("#ins_errors").empty();
    if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Payslips/payslip_del",
 data:{
    "id":id,
},
success:function(response){
  console.log(response);
 $("#ins_errors").html("Payslip successfully deleted");
  setTimeout(function(){
    location.reload();
  },3000);
}
});
}
}


function editpayslip(id){
  $("#ins_errors").empty();
  $(".payslip_det").show();
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Payslips/get_payslip",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    var img = 'http://web.intelexstagingurl.com/login/'+value.uploaded_resume+'';
    $("#emp_id").val(value.payslip_id);
    $("#emp_details").val(value.employee_name);
    $("#month").val(value.payslip_month);
    $("#up_image").html(value.uploaded_payslip);
    $("#prev_img").val(value.uploaded_payslip);
    $(".btn_val").html('Update');
    $("#btn_cat_vals").val('update');
    $("#btn_cat_vals").html('Update Resume');
  });
  }
  });
}


$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  var name = $("#name_filter").val();
  var fil_month = $("#fil_month").val();
  var month = fil_month.split("-");
  var final_month = moment.monthsShort(month[1] - 1);
  var year = month[0];
  if(name == "" && fil_month == ""){
     $("#filteration_err").html("please select atleast one options");
  }
  else if(name == "" && fil_month != ""){
     $("#filteration_err").html("Select a Employee name!!");
  }
  else {
    $("#filteration_err").empty();
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Payslips/filtration_details",
    data:{
    "name":name,
    "fil_month":final_month,
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
    var url = "<?php echo base_url(); ?>"+value.uploaded_payslip;
    dataTable.row.add([
        ''+value.first_name+value.last_name+'',
        ''+value.payslip_month+'-'+value.payslip_year+'',
        '<a target=_blank href='+url+'>'+value.uploaded_payslip+'</a>',
        ''+value.update_date+'',
        '<i class="fa fa-edit green" aria-hidden="true" onclick = "editpayslip('+value.payslip_id+')"></i>'+'<i class="fa fa-trash red" onclick="deletepayslip('+value.payslip_id+')">'+'</i>'
    ]).draw();
   });
 }else{
 dataTable.clear();
   dataTable.row.add([
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
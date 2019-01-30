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
         <li class="breadcrumb-item active">Restricted Holiday</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <div class="row">
              <div class="col-sm-2">
                <button type="button" class="btn green" id="leave_btn" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus"></i> Add Restricted Holiday</button>
              </div>
            </div>
            <p id="leave_errors_type_del" style="color:red"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Employee Leave</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Holiday-Name</th>
                      <th scope="col">Holiday-Date</th>
                      <th scope="col">Updated-On</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($leavedetails as $leavedetails){ ?>
                      <tr>
                      <td><?php echo $leavedetails->holiday_name;?></td>
                      <td><?php echo $leavedetails->holiday_date;?></td>
                      <td><?php echo $leavedetails->updated_at; ?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editres_holiday('<?php echo $leavedetails->id;?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick = "delres_holiday('<?php echo $leavedetails->id;?>')"></i></td>
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
        <h4 class="modal-title pull-left">Restricted Holiday</h4>
        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form name="MyForm" id="btn_cat_pay">
          <input type="hidden" id="emp_id">
           <div class="form-group">
              <label for="pname">Holiday Name:</label>
              <input type="text" class="form-control" id="holiday_name" name="holiday_name" placeholder="Enter Holiday Name">
            </div>
            <div class="form-group">
              <label for="email">Holiday Date:</label>
                   <input class="form-control datepicker" data-date-format="dd/mm/yyyy" id="holiday_date" name ="holiday_date" placeholder="Enter Holiday Date">
            </div>
            <div class="form-group">
              <p id="leave_errors_type_ins" style="color:red;"></p>
              <button type="button" class="btn btn-success" id="leave_ins_btn" value="submit">Add Restricted Holiday</button>
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
    format: 'dd-mm-yyyy',
      });
      });


    $(document).ready(function() {
       $('.myTable').DataTable();
      });



$(document).ready(function(){
$('#leave_ins_btn').on('click', function(e){
    var holiday_name = $("#holiday_name").val();
    var holiday_date = $("#holiday_date").val();
     var btn_value = $("#leave_ins_btn").val();
    console.log(btn_value);
    var errors = "";
      if(holiday_name == ""){
            errors = "holiday name should be empty";
            $("#leave_errors_type_ins").html(errors);
      }
      else if(holiday_name!= "" && btn_value == "submit"){
    $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/insertres_holiday",
   data:{
      "holiday_name":holiday_name,
      "holiday_date":holiday_date
  },
  success:function(response){
    console.log(response);
    $("#leave_errors_type_ins").html("Your data has been successfully updated").css("color", "green");
       document.getElementById("btn_cat_pay").reset();
          setTimeout(function(){
            location.reload();
      },3000);
  }
  });
  }else if(btn_value == "Update"){
    var id = $("#emp_id").val();
    $.ajax({  
    type:"POST",
    url:"<?php echo base_url();?>Leave/updateresholiday",
    data:{
        "id":id,
        "holiday_name":holiday_name,
        "holiday_date":holiday_date
        },
    dataType:'json',
    success:function(response)  
    {
    console.log(response);
    $("#leave_errors_type_ins").html("Your data has been successfully updated").css("color", "green");
       document.getElementById("btn_cat_pay").reset();
          setTimeout(function(){
            location.reload();
      },3000);
    }
  });
  }
});
});

$('#mymodal').on('hidden.bs.modal', function () {
 location.reload();
})


  function delres_holiday(id){
      if(confirm("Are you sure want to delete!")){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/delres_holiday",
   data:{
      "id":id,
  },
  success:function(response){
    console.log(response);
    $("#leave_errors_type_del").html("Restricted holiday deleted successfully");
  setTimeout(function(){
    location.reload();
  },3000);
  }
  });
  }
}


function editres_holiday(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/getresholidays",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    $("#emp_id").val(value.id);
    $("#holiday_name").val(value.holiday_name);
    $("#holiday_date").val(value.holiday_date);
    $("#leave_btn").html('Edit Restricted Holiday');
    $(".modal-title").html('Update Holiday');
    $("#leave_ins_btn").val('Update');
    $("#leave_ins_btn").html('Update Holiday');
  });
  }
  });
}


</script>
 </body>
 </html>
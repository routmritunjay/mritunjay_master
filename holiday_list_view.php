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
         <li class="breadcrumb-item active">Holidays</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <div class="row">
               <div class="col-sm-2">
                <?php if($role == 1 || $role == 3|| $role == 4|| $role == 5){ ?>
               <button type="button" class="btn green" id="leave_btn" data-toggle="modal" data-target="#modalleave"><i class="fa fa-plus"></i> Add Holiday</button><?php } ?>
              </div>
            </div>
            <p id="leave_errors_type_del" style="color:red;"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Employee Holiday</div>
              <div class="panel-body">
                
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Holiday-List</th>
                      <th scope="col">Updated-At</th>
                      <?php if($role == 1 || $role == 3|| $role == 4|| $role == 5){ ?>
                      <th scope="col">Action</th><?php } ?>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($holiday_list as $holiday_list){ ?>
                      <tr>
                      <td><a href="<?php echo $holiday_list->holiday_list_file;?>" target = '_blank' height='70'>View Holiday List</a></td>
                      <td><?php echo $holiday_list->updated_at;?></td>
                      <?php if($role == 1 || $role == 3|| $role == 4|| $role == 5){ ?>
                      <td><i class="fa green fa-edit" aria-hidden="true"  onclick = "getleavetype('<?php echo $holiday_list->hol_list_id;?>')"></i><i class="fa  red fa-trash red" aria-hidden="true" onclick = "delleavetype('<?php echo $holiday_list->hol_list_id;?>')"></i></td>
                        <?php }} ?>
                    </tr>
                  </tbody>
                  </table>
              </div>
            </div>
           </div>
         </div>
        </main>
       </div>
<?php if($role == 1 || $role == 3|| $role == 4|| $role == 5){ ?>
<div id="modalleave" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Holiday-List-Update</h4>
      </div>
      <div class="modal-body">
          <form name="MyForm" autocomplete="off" id="btn_cat_pay" enctype="multipart/form-data">
          <input type="hidden" id="emp_id" name="emp_id">
          <input type="hidden" id="prev_img" name="prev_img">
           <div class="form-group">
              <label for="pname">Holiday File:</label>
              <input type="file" class="form-control" id="hol_file" name="hol_file" placeholder="Enter Holiday File">
              <span id="up_image"></span>
            </div>
            <div class="form-group">
              <p id="holiday_errors_type_ins" style="color:red;"></p>
            <input type="submit" class="btn btn-success" id="leave_ins_btn" value="Submit">
             </div>
        </form>
      </div>
    </div>

  </div>
</div>
<?php } ?>




     
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
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

    $(document).ready(function() {
       $('.myTable').DataTable();
      });

$('#mymodal').on('hidden.bs.modal', function () {
 location.reload();
})

$('#modalleave').on('hidden.bs.modal', function () {
 location.reload();
});

$(document).ready(function(){
$('#btn_cat_pay').on('submit', function(event){
        event.preventDefault();
    var file = $("#hol_file").val();
    var file_validate = file.split(".");
    console.log(file_validate);
     var btn_value = $("#leave_ins_btn").val();
    console.log(btn_value);
    var errors = "";
      if(file == ""){
            errors = "File name is missing or invalid file type";
            $("#holiday_errors_type_ins").html(errors);
      }
      else if(file_validate[1] != "pdf"){
        errors = "File type is not allowed.Only Pdf file can be uploaded!";
        $("#holiday_errors_type_ins").html(errors);
      }
      else if(file != "" && btn_value == "Submit"){
    $.ajax({
     url:"<?php echo base_url();?>HolidayList/holiday_upload",
    method:"POST",  
   data:new FormData(this),  
   contentType: false,  
   cache: false,  
   processData:false,     
  success:function(response){
    console.log(response);
    if(response == "true"){
   $("#holiday_errors_type_ins").html("Holiday pdf successfully updated").css("color", "green");
       document.getElementById("btn_cat_pay").reset();
       location.reload();
          setTimeout(function(){
      },3000);
    }else{
      console.log(response);
    }      
  }
  });
  }else if(btn_value == "Update"){
    var id = $("#emp_id").val();
    $.ajax({  
    url:"<?php echo base_url();?>HolidayList/update_holiday",
    method:"POST",  
    data:new FormData(this),  
    contentType: false,  
    cache: false,  
    processData:false,  
    success:function(response)  
    {
    console.log(response);
        if(response == "true"){
     $("#holiday_errors_type_ins").html("Holiday pdf successfully updated").css("color", "green");
       document.getElementById("btn_cat_pay").reset();
          setTimeout(function(){
            location.reload();
      },3000);
       }else{
        console.log(response);
       }   
    }
  });
  }
});
});




  function delleavetype(id){
      if(confirm("Are you sure want to delete!")){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>HolidayList/holiday_del",
   data:{
      "id":id,
  },
  success:function(response){
    console.log(response);
   $("#leave_errors_type_del").html("Holiday pdf file successfully deleted");
  setTimeout(function(){
    location.reload();
  },3000);
  }
  });
  }
}

function getleavetype(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>HolidayList/get_holiday",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    $("#emp_id").val(value.hol_list_id);
    $("#prev_img").val(value.holiday_list_file);
    $("#up_image").html(value.holiday_list_file);
    $("#leave_btn").html('Edit Leavetype');
    $("#leave_ins_btn").html('Update');
    $("#leave_ins_btn").val('Update');
    $("#modalleave").modal('show');
  });
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


</script>
 </body>
 </html>
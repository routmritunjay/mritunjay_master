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
         <li class="breadcrumb-item active">Leave type</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
          <div class="row">
               <div class="col-sm-2">
               <button type="button" class="btn green" id="leave_btn" data-toggle="modal" data-target="#modalleave"><i class="fa fa-plus"></i> Add Leave Type</button>
              </div>
            </div>
            <p id="leave_errors_type_del" style="color:red;"></p>
            <div class="panel panel-default">
              <div class="panel-heading">Employee Leave</div>
              <div class="panel-body">
                
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Leave-Type</th>
                      <th scope="col">Updated-at</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($leavedetails as $leavedetails){ ?>
                      <tr>
                      <td><?php echo $leavedetails->leave_type;?></td>
                      <td><?php echo $leavedetails->updated_at;?></td>
                      <td><i class="fa green fa-edit" aria-hidden="true"  onclick = "getleavetype('<?php echo $leavedetails->leave_type_id;?>')"></i><i class="fa  red fa-trash red" aria-hidden="true" onclick = "delleavetype('<?php echo $leavedetails->leave_type_id;?>')"></i></td>
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

<div id="modalleave" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Leave Type Update</h4>
      </div>
      <div class="modal-body">
        <form name="MyForm" id="btn_cat_pay">
          <input type="hidden" id="emp_id">
           <div class="form-group">
              <input type="text" class="form-control" id="leave_type_ins" name="leave_type_ins" placeholder="Enter Leave Type">
            </div>
            <div class="form-group">
              <p id="leave_errors_type_ins" style="color:red;"></p>
            <button type="button" class="btn btn-success" id="leave_ins_btn" value="submit">Add Leave Type</button>
             </div>
        </form>
      </div>
    </div>

  </div>
</div>




     
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/popper.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="<?php echo base_url();?>vendors/js/Chart.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="<?php echo base_url();?>js/views/main.js"></script>
   <script src="<?php echo base_url();?>js/career.js"></script>


<script>
      CKEDITOR.replace( 'editor1' );
    </script>
    <script>
      CKEDITOR.replace( 'editor2' );
    </script>

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
$('#leave_ins_btn').on('click', function(e){
    var leave_type_ins = $("#leave_type_ins").val();
     var btn_value = $("#leave_ins_btn").val();
    console.log(btn_value);
    var errors = "";
      if(leave_type_ins == ""){
            errors = "leave type should be empty";
            $("#leave_errors_type_ins").html(errors);
      }
      else if(leave_type_ins != "" && btn_value == "submit"){
    $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/insertleave_type",
   data:{
      "leave_type_ins":leave_type_ins,
  },
  success:function(response){
    console.log(response);
   $("#leave_errors_type_ins").html("Leave type successfully uploaded").css("color", "green");
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
    url:"<?php echo base_url();?>Leave/updateleavetype",
    data:{
        "id":id,
        "leave_type_ins":leave_type_ins
        },
    dataType:'json',
    success:function(response)  
    {
    console.log(response);
     $("#leave_errors_type_ins").html("Leave type successfully updated").css("color", "green");
       document.getElementById("btn_cat_pay").reset();
          setTimeout(function(){
            location.reload();
      },3000);
    }
  });
  }
});
});




  function delleavetype(id){
      if(confirm("Are you sure want to delete!")){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Leave/delleavetype",
   data:{
      "id":id,
  },
  success:function(response){
    console.log(response);
   $("#leave_errors_type_del").html("Leave type successfully deleted");
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
      url:"<?php echo base_url();?>Leave/getleavetype",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    $("#emp_id").val(value.leave_type_id);
    $("#leave_type_ins").val(value.leave_type);
    $("#leave_btn").html('Edit Leavetype');
    $("#leave_ins_btn").html('Update');
    $("#leave_ins_btn").val('Update');
    $("#modalleave").modal('show');
  });
  }
  });
}


</script>
 </body>
 </html>
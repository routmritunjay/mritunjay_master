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
         <li class="breadcrumb-item active">RemainingLeaves</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
            <div class="panel panel-default">
              <div class="panel-heading">Leave Status</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Employee_name</th>
                      <th scope="col">Sick_leave</th>
                      <th scope="col">Casual_leave</th>
                      <th scope="col">Restricted Holiday</th>
                      <th scope="col">Updated_at</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($leavedetails as $leavedetails){ ?>
                      <tr>
                      <td><?php echo $leavedetails->first_name;?></td>
                      <td><?php echo $leavedetails->sick_leave;?></td>
                      <td><?php echo $leavedetails->casual_leave;?></td>
                      <td><?php echo $leavedetails->restricted_holiday;?></td>
                      <td><?php echo $leavedetails->updated_at;?></td>
                    </tr>
                   <?php } ?>
                  </tbody>
                  </table>
              </div>
            </div>
           </div>
         </div>
        </main>
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

      $(".button_edit").click(function(){
       $("#myModal").modal('show');
       });
      });


  function getmssgdetails(id,name){
   $.ajax({
  type:"POST",
  url:"Leave/getmssgdetails",
  data:{
    "id":id,
    "name":name
 },
  dataType:'json',
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    var mssg = value.message;
    var value = mssg.replace(/(<p[^>]+?>|<p>|<\/p>)/img, "");
    $("#view_mssg").html(value);
  });
  $("#myModal").modal('show');
}
});
}


 function statusupdate(id,name,status){
   $.ajax({
  type:"POST",
  url:"Leave/statusupdate",
  data:{
    "id":id,
    "name":name,
    "status":status
 },
  dataType:'json',
success:function(response){
  console.log(response);
  location.reload();
}
});
}

$(document).ready(function(){
$('#btn_cat').on('click', function(e){
   e.preventDefault();
    var emp_name = $("#emp_name").val();
    var sick_leave = $("#sick_leave").val();
    var casual_leave = $("#casual_leave").val();
           var errors = "";
           if(emp_name == ""){
            errors = "employee name should be empty";
            $("#leave_errors").html(errors);
           }
           else if(sick_leave == ""){
            errors = "sick leave field is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(casual_leave == ""){
            errors = "casual leave field is mandatory";
            $("#leave_errors").html(errors);
           }
           else if(emp_name != ""  && sick_leave != "" && casual_leave != ""){
            $("#leave_errors").empty();
               $.ajax({
                      type:"POST",
                      url:"Leave/count_leave",
                      data:{
                        "emp_name":emp_name,
                     },
                      dataType:'json',
                    success:function(response){
                      console.log(response);
                      if(response == 0){
                        $.ajax({  
                     type:"POST",
                      url:"Leave/updateleave",
                      data:{
                        "emp_name":emp_name,
                        "sick_leave":sick_leave,
                        "casual_leave":casual_leave
                     },
                      dataType:'json',
                     success:function(data)  
                     {
                      console.log(data);
                         if(data == 1){
                          alert("Remaining leaves succesfully uploaded!");
                          location.reload();
                         }else{
                          alert("unable to apply leave!");
                          location.reload();
                         }
                     } 
                     });
                      }else{
                     errors = "already leave is updated for above employee";
                     $("#leave_errors").html(errors);
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
  window.location.href="<?php echo base_url(); ?>";
}
});
}
</script>
 </body>
 </html>
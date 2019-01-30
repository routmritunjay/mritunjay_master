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
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   
   <!-- Styles required by this views -->
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">Technology</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Add new Technology</div>
              <div class="panel-body" style="overflow: hidden;">
                 <form action="/action_page.php" id="role_loc">
                      <div class="form-group col-md-6">
                          <label for="email">Job Role</label>
                          <input type="text" class="form-control" id="job_role" placeholder="Enter job role" name="First Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="email">Job Location</label>
                          <input type="text" class="form-control" id="job_loc" placeholder="Enter job location" name="First Name">
                        </div>
                       <div class="form-group col-md-12" style="clear: both;">
                          <button type="button" class="btn btn-default" id="btn_submit">Add New Technology</button>
                          <p id="errors" style="color:red; font-size:15px;"></p>
                        </div>
                    </form>
              </div>
              <div class="panel panel-default">
              <div class="panel-heading">List of Location</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Job-Location</th>
                      <th scope="col">Updated-on</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                   <?php foreach($job_loc as $job_loc){ ?>
                    <tr>
                      <td><?php echo $job_loc->job_location;?></td>
                      <td><?php echo $job_loc->updated_on;?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editrole('<?php echo $job_loc->loc_id;?>','loc')"></i>
                      <i class="fa fa-trash red" aria-hidden="true" onclick="deleteloc('<?php echo $job_loc->loc_id; ?>')"></i></td>
                    </tr>
                     <?php } ?>
                  </tbody>
                  </table>
              </div>
            </div>
           </div>
           <div class="panel panel-default">
              <div class="panel-heading">List of Roles</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Job-Role</th>
                      <th scope="col">Updated-on</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                     <?php foreach($job_role as $job_role){ ?>
                    <tr>
                      <td><?php echo $job_role->job_role;?></td>
                      <td><?php echo $job_role->updated_on;?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editrole('<?php echo $job_role->job_role_id;?>','role')"></i>
                      <i class="fa fa-trash red" aria-hidden="true" onclick="deleterole('<?php echo $job_role->job_role_id;?>')"></i></td>
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
     </main>
   </div>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Update Technology</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
         <div class="modal-body">
           <form name="MyForm" autocomplete="off" id="frm_cat">
          <div class="form-group">
            <input type="hidden" id="u_type">
            <input type="hidden" id="u_role_id">
            <input type="text" class="form-control" id="u_job_role" placeholder="Enter job role" name="role">
          </div>
          <p id="up_errors" style="color:red;"></p>
        </form>
       </div>  
       <div class="modal-footer">
        <button type="button" class="btn btn-info" id="up_btn_val">Update</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>   
    </div>
  </div>
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
   <script src="<?php echo base_url();?>js/views/.main.js"></script>
    <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('.myTable').DataTable();
      });

$(document).ready(function(){
   $("#btn_submit").click(function(){
var job_role = $("#job_role").val();
var job_loc = $("#job_loc").val();
var errors = "";
if(job_role == '' && job_loc == ''){
$("#errors").html("Please select atleast one field")
}else{
          $.ajax({
          type:"POST",
          url:"<?php echo base_url(); ?>Career/add_newjobrole",
            data:{
            "job_role":job_role,
            "job_loc":job_loc,
        },
        success:function(response){
          console.log(response);
            $("#errors").html("Technology successfully uploaded").css("color","green");
                document.getElementById("role_loc").reset();
                setTimeout(function(){
                location.reload();
           },2000);
        }
        });
        }
      });
    });


function deleterole(id){
    if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Career/deleterole",
 data:{
    "id":id,
},
success:function(response){
  console.log(response);
  $("#errors").html("Technology successfully deleted");
                setTimeout(function(){
                location.reload();
     },2000);
}
});
}
}


function deleteloc(id){
    if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>Career/deleteloc",
 data:{
    "id":id,
},
success:function(response){
  console.log(response);
   $("#errors").html("Technology successfully deleted");
                setTimeout(function(){
                location.reload();
},2000);
}
});
}
}

function editrole(id,type){
  $("#ins_errors").empty();
   var url = "";
  if(type == "role"){
    url = "<?php echo base_url();?>Career/get_role";
  }else if(type == "loc"){
    url = "<?php echo base_url();?>Career/get_loc";
  }
  $.ajax({
    type:"POST",
      url:url,
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    if(type == "role"){
    $("#u_type").val('role');
    $("#u_job_role").val(value.job_role);
    $("#u_role_id").val(value.job_role_id);
  }else if(type == "loc"){
    $("#u_type").val('loc');
    $("#u_role_id").val(value.loc_id);
    $("#u_job_role").val(value.job_location);
  }
    $("#myModal").modal('show');
  });
  }
  });
}


$(document).ready(function(){
   $("#up_btn_val").click(function(){
var id = $("#u_role_id").val();
var job_role = $("#u_job_role").val();
var type = $("#u_type").val();
var errors = "";
if(job_role == ''){
$("#up_errors").html("please select atleast one field")
}else{
          $.ajax({
          type:"POST",
          url:"<?php echo base_url(); ?>Career/update_role_loc",
            data:{
            "id":id,
            "job_role":job_role,
            "type":type
        },
        success:function(response){
          console.log(response);
            $("#up_errors").html("Technology successfully updated").css("color","green");
                document.getElementById("frm_cat").reset();
                setTimeout(function(){
                  location.reload();
           },2000);
        }
        });
        }
      });
    });
</script>
 </body>
 </html>
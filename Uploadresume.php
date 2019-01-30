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
   <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">
 
   <!-- Main styles for this application -->
   <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link href="css/dashboard.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

   <!-- Styles required by this views -->

   <style>
  .modal-content {
       color: black;
       width: 120%;
    }
     select:invalid { color: gray; }
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
         <li class="breadcrumb-item active">Resume</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12">
                <button type="button" class="btn green btn_val" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New Resume</button>
              <div class="panel panel-default">
              <div class="panel-heading">Resume-Filter</div>
                 <p id="filteration_err" style="color:red;"></p>
                 <div class="col-sm-12 col-md-12" style="display: inline-flex;">
               <div class="col-sm-3">
                <select name="job_role" class="form-control" id="jobrole">
       	        <option value="">Select a Jobrole</option>
                 <?php foreach($job_role as $job_role){ ?>
             <option value="<?php echo $job_role->job_role; ?>"><?php echo $job_role->job_role; ?></option>
              <?php } ?>
                 </select>
              </div>
               <div class="col-sm-3">
               	<select name="loc" class="form-control" id="job_loc">
    	         <option value="">Select a Location</option>
                <?php foreach($job_loc as $job_loc){ ?>
            <option value="<?php echo $job_loc->job_location; ?>"><?php echo $job_loc->job_location; ?></option>
          <?php } ?>
                </select>
              </div>
               <div class="col-sm-3">
               <input type="hidden" id="all_del_val" name ="all_del_val">
                <select name="loc" class="form-control" id="job_exp">
               <option value="">Select a Experience</option>
                <?php foreach($year_exp as $year_exp){ ?>
              <option value="<?php echo $year_exp->year_of_exp; ?>"><?php echo $year_exp->year_of_exp; ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-sm-3">
                 <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                  <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
              </div>
            </div></div></div></div>
             <div class="row">
            <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">List of Resumes

                <button type="button" class="btn btn-danger" style="float:right; padding: 0 15px;" id="del_resume_mul">Delete</button></div>
              <div class="panel-body">
                <table class="table table-bordered myTable" id="myTable">
                  <thead>
                    <tr>
                       <th scope="col" class="delmul"></th>
                      <th scope="col">Uploaded Date</th>
                  	 <th scope="col">Job-Role</th>
                      <th scope="col">Job-Location</th>
                      <th scope="col">Year-Of-Experience</th>
                      <th scope="col">Uploaded-Resume</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                  	 <?php foreach($details as $details){ ?>
                    <tr>
                       <td><input type="checkbox" name="del_res[]" value="<?php echo $details->resume_id; ?>"></td>
                    	<td><?php echo $details->date;?></td>
                    	<td><?php echo $details->job_role;?></td>
                    	<td><?php echo $details->job_location;?></td>
                      <td><?php echo $details->year_of_exp;?></td>
                    	<td><a href='<?php echo $details->uploaded_resume;?>' target='_blank' height='70'>View File</a></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editjob('<?php echo $details->resume_id;?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick="deletejob('<?php echo $details->resume_id; ?>')"></i></td>
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

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title pull-left">Resume Upload</h4>
          <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <div class="col-xs-12 col-md-12 col-sm-12">
        <form id="btn_cat_resume">
     <div class="form-group">
      <input type="hidden" id="emp_id" name ="emp_id">
      <input type="hidden" id="emp_image" name ="emp_img">
       <label for ="name">Job-Role</label>
       <select name="job_role" class="form-control" id="job_role" onchange="jobrolechange()">
       	<option value="">Select a Jobrole</option>
                 <?php foreach($job_roles as $job_role){ ?>
             <option value="<?php echo $job_role->job_role; ?>"><?php echo $job_role->job_role; ?></option>
              <?php } ?>
    </select>
  </div>
    <div class="form-group">
    	  <label for="pwd">Location</label>
    	 <select name="loc" class="form-control" id="job_location">
    	<option value="">Select a Location</option>
                <?php foreach($job_locs as $job_loc){ ?>
       <option value="<?php echo $job_loc->job_location; ?>"><?php echo $job_loc->job_location; ?></option>
          <?php } ?>
    </select>
    </div>
     <div class="form-group">
        <label for="pwd">Year Of Experience</label>
             <input type="text" class="form-control" name="year_exp" id="year_exp" placeholder="Enter year of exprience">
    </div>
    <div class="form-group">
     <label for="pwd">Upload-Multiple-Resume</label>
     <input type="file" class="form-control" name="mulfile[]" id="mulfile" multiple>
     <!-- <span id="up_image"></span> -->
     <p id="up_image"></p>
    </div>
    <div class="form-group">
       <p id="ins_errors" style="color:red;"></p>
         <input type="submit" class="btn btn-success" id="btn_cat_vals" value="Submit">
        </div>
   </div>
     
       </form>
      </div>
      
    </div>
  </div>

  <div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Jobrole</h4>
      </div>
      <div class="modal-body">
         <input type="text" name="new_job_role" id="new_job_role" class="form-control new_job_role" placeholder="add job role">
      </div>
      <div class="modal-footer">
              <button type="button" class="btn btn-default add_loc_roles" id="sub_job_role" value="sub_job_role" onclick="add_roles_loc();">Add JobRole</button>
      </div>
    </div>

  </div>
</div>
   
   <!-- Bootstrap and necessary plugins -->
   <script src="vendors/js/jquery.min.js"></script>
   <script src="vendors/js/popper.min.js"></script>
   <script src="vendors/js/bootstrap.min.js"></script>
   <script src="vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="vendors/js/Chart.min.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   <!-- Leaf Lite main scripts -->
 
   <script src="js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="js/views/main.js"></script>
   <script src="js/all_functions.js"></script>


   <script>
   	$(document).ready( function () {
    var dataTable = $('.myTable').DataTable();
    $("#del_resume_mul").hide();
    $("#reset_opt").click(function(){
        location.reload();
    });});

function deletejob(id){
    if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"Resume/deleteuser",
 data:{
    "id":id,
},
success:function(response){
  console.log(response);
  alert("your data has been successfully deleted");
  location.reload();
}
});
}
}

    $(document).ready(function(){
$(document).on('click', '#button_loc', function() {
    $(".modal-title").html('Add new Job Location');
    $("#new_job_role").attr('id','new_job_locations');
    $(".add_loc_roles").attr('value','sub_job_locations');
    $(".add_loc_roles").html('Add Job Location');
    $("#mymodal").modal('show');
  })
$(document).on('click', '#button_edit', function() {
    $(".modal-title").html('Add new Job Role');
    $("#new_job_role").attr('id','sub_job_role');
    $(".add_loc_roles").attr('value','sub_job_role');
    $(".add_loc_roles").html('Add Job Role');
  })
})


function add_roles_loc(){
  var btn_value = $(".add_loc_roles").val();
  var url = '';
  var job_role = $(".new_job_role").val();
  if(btn_value == 'sub_job_role'){
    url = "Career/add_newjobrole"
  }else if(btn_value == 'sub_job_locations'){
    url = "Career/add_newjobloc";
  }
    if(job_role == ""){
     $("#role_error").html("please add a new job role");
     }else{
     $.ajax({
    type:"POST",
    url:url,
    data:{
      "job_role":job_role
     },
     dataType:'json',
       success:function(response){
       console.log(response);
       alert("successfully updated!");
     location.reload();
      }
    });
  }
}


$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  var job_role = $("#jobrole").val();
  var location = $("#job_loc").val();
    var exp = $("#job_exp").val();
  if(job_role == "" && location == "" && exp == ""){
     $("#filteration_err").html("please select atleast one options");
  }
  else {
    $("#filteration_err").empty();
  $.ajax({
    type:"POST",
    url:"<?php echo base_url();?>Resume/filtration_details",
    data:{
    "job_role":job_role,
    "location":location,
    "exp":exp
     },
     dataType:'json',
success:function(response){
  console.log(response.length);
  if(response.length === 0){
    dataTable.clear();
   dataTable.row.add([
        '',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        ''
    ]).draw();
 }else{
  dataTable.clear();
   $.each(response,function(key,value){
    dataTable.row.add([
      '<input type="checkbox" name="del_res[]" value="'+value.resume_id+'">',
        ''+value.date+'',
        ''+value.job_role+'',
        ''+value.job_location+'',
        ''+value.year_of_exp+'',
        '<a href='+value.uploaded_resume+'>View File</a>',
        '<i class="fa fa-edit green" onclick="editjob('+value.resume_id+')"><i class="fa fa-trash red" onclick="deletejob('+value.resume_id+')">'+'</i>',
        ''
    ]).draw();
  });
   $('input[type="checkbox"]').click(function(){
  $("#del_resume_mul").show();
    var del_arr = [];
    $.each($("input[name='del_res[]']:checked"), function(){
    del_arr.push($(this).val());
  });
    $("#all_del_val").val(del_arr);
    var del_val = $("#all_del_val").val();
      if(del_val == ""){
          $("#del_resume_mul").hide();
        }
    });
 }
}
});
}
});
});


$('input[type="checkbox"]').click(function(){
  $("#del_resume_mul").show();
    var del_arr = [];
    $.each($("input[name='del_res[]']:checked"), function(){
    del_arr.push($(this).val());
  });
    $("#all_del_val").val(del_arr);
    var del_val = $("#all_del_val").val();
      if(del_val == ""){
          $("#del_resume_mul").hide();
        }
    });

  $("#del_resume_mul").click(function(){
    if(confirm("Are you sure want to delete!")){
      var del_val = $("#all_del_val").val();
      if(del_val == ""){
      alert("Please select an resume to delete!!");
      }else{
      $.ajax({
        type:"POST",
      url:"Resume/deleteselecteduser",
       data:{
          "id":del_val,
      },
    success:function(response){
      console.log(response);
      if(response){
      alert("your data has been successfully deleted");
      location.reload();
     }
    }
    });
    }
    }
  });

function editjob(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Resume/getresume",
   data:{
      "id":id,
  },
        dataType:'json',
  success:function(response){
    console.log(response);
  $.each(response,function(key,value){
    var img = 'http://web.intelexstagingurl.com/login/'+value.uploaded_resume+'';
    $("#emp_id").val(value.resume_id);
    $("#job_role").val(value.job_role);
    $("#job_location").val(value.job_location);
    $("#year_exp").val(value.year_of_exp);
    $("#up_image").html(value.uploaded_resume);
    $("#emp_image").val(value.uploaded_resume);
    $(".btn_val").html('Update');
    $("#btn_cat_vals").val('update');
    $("#btn_cat_vals").html('Update Resume');
  });
  }
  });
}

$(document).ready(function(){
      $('#btn_cat_resume').on('submit', function(e){
        e.preventDefault();
      var job_role = $("#job_role").val();
      var location = $("#job_location").val();
      var uploaded_file = $("#mulfile").val();
      var btn_value = $("#btn_cat_vals").val();
      var exp = $("#year_exp").val();
      if(job_role == ""){
        $("#ins_errors").html("please select a jobrole");
      }
      else if(location == ""){
        $("#ins_errors").html("please select a location");
      }
     else if(exp == ""){
        $("#ins_errors").html("please enter exeperience");
      }
      else if(job_role != "" && location != "" && exp != "" && btn_value == "submit"){
        if(uploaded_file == ""){
        $("#ins_errors").html("please upload a resume");
        }else{
        $("#ins_errors").empty();
        $.ajax({  
                     url:"Resume/upload_resume",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {
                      if(data){
                        console.log(data);
                      if(data == 0){
                     $("#ins_errors").html("unable to upload the current file");
                      document.getElementById("btn_cat_resume").reset();
                        }
                      else if(data > 1){
                      $("#ins_errors").html(""+data+" resumes succesfully uploaded").css('color','green');
                      document.getElementById("btn_cat_resume").reset();
                      }else{
                      $("#ins_errors").html(""+data+" resume succesfully uploaded").css('color','green');
                      document.getElementById("btn_cat_resume").reset();
                      }
                      }else{
                        $("#ins_errors").html("Unable to upload the current file");
                      document.getElementById("btn_cat_resume").reset();
                      }
                     } 
                     });
                      }
                }else if(job_role != "" && location != "" && exp != "" && btn_value == "update"){
                  $.ajax({  
                     url:"Resume/update_resume",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {
                        $("#ins_errors").html("Resume succesfully updated");
                     } 
                     });
                }
            }); 
        });

$('#myModal').on('hidden.bs.modal', function () {
 location.reload();
})

function jobrolechange(){
$("#ins_errors").empty();
}

</script>
 </body>
 </html>
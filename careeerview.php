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
   <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
   <link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />
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
         <li class="breadcrumb-item active">Career</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12">
              <?php if(ISSET($editcareer) && empty($editcareer)) { ?>
                <button type="button" class="btn green button_edit" id="button_edit"><i class="fa fa-plus"></i> Add New Career</button>
                <?php }else{ ?>
                <button type="button" class="btn green button_edit" id="button_edit"><i class="fa fa-plus"></i> Edit Career</button>
                <?php } ?>
                <div class="panel panel-default">
              <div class="panel-heading">Career-Filter</div>
                 <p id="filteration_err" style="color:red;"></p>
              <div class="col-sm-12 col-md-12" style="display: inline-flex;">
               <div class="col-sm-4">
           <select name="job_role" class="form-control" id="job_role">
            <option value="">Select An Jobrole</option>
            <?php foreach($filter_role as $filter_role){ ?>
             <option value="<?php echo $filter_role->job_role; ?>"><?php echo $filter_role->job_role; ?></option>
              <?php } ?>
            </select>
              </div>
               <div class="col-sm-4">
           <select name="job_role" class="form-control" id="job_loc_filter">
            <option value="">Select An Joblocation</option>
            <?php foreach($filter_loc as $filter_loc){ ?>
             <option value="<?php echo $filter_loc->job_location; ?>"><?php echo $filter_loc->job_location; ?></option>
              <?php } ?>
            </select>              </div>
              <div class="col-sm-4">
                 <button type="button" class="btn green" id="filter_options"><i style="font-size:17px" class="fa">&#xf0b0;</i></button>
                    <button type="button" class="btn green" id="reset_opt"><i style="font-size:17px" class="fa">&#xf021;</i></button>
              </div>
            </div></div></div></div>
            <div class="row">
            <div class="col-sm-12">
            <p id="del_err" style="color:red"></p>
            <div class="panel panel-default">
              <div class="panel-heading">List of Careers</div>
              <div class="panel-body">
                <table class="table table-bordered myTable" id="myTable">
                  <thead>
                    <tr>
                      <th scope="col">Uploaded Date</th>
                      <th scope="col">Job-Role</th>
                      <th scope="col">Job-Location</th>
                      <th scope="col">Total-Position</th>
                      <th scope="col">Job-Description</th>
                      <th scope="col">Job-Experience</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                     <?php foreach($details as $details){ ?>
                      <?php $str = substr($details->job_description, 0, 50); ?>
                    <tr>
                      <td><?php echo $details->posting_date;?></td>
                      <td><?php echo $details->job_title;?></td>
                      <td><?php echo $details->work_location;?></td>
                      <td><?php echo $details->position_total;?></td>
                       <td><button type="button" class="btn btn-default" onclick = getmssgdetails('<?php echo $details->upload_id;?>');>View Description</button></td>
                      <td><?php echo $details->job_exeprience;?></td>
                      <td><a href="<?php echo base_url(); ?>Career?editid=<?php echo $details->upload_id; ?>"><i class="fa fa-edit green" aria-hidden="true" onclick="editcareer('<?php echo $details->upload_id; ?>')"></i></a>
                      <i class="fa fa-trash red" aria-hidden="true" onclick="deletecareer('<?php echo $details->upload_id; ?>')"></i></td>
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

    <div class="modal fade" id="myModal" role="dialog" style="width:100%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <?php if(ISSET($editcareer) && !empty($editcareer)) { ?>
          <h4 class="modal-title">Edit Career</h4>
          <?php }else{ ?>
            <h4 class="modal-title">Add Career</h4>
            <?php } ?>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form action="Career/upload_career" method="POST">
              <?php if(!empty($editcareer)){ ?>
             <?php foreach($editcareer as $edit) { ?>
                 <div class="form-group">
            <input type="hidden" id="upid"  name ="upid" value="<?php echo $edit->upload_id; ?>">
              <label for="pwd">Jobrole</label>
                <select name="job_role" class="form-control" id="job_title" required>
                  <option value="<?php echo $edit->job_title; ?>"><?php echo $edit->job_title; ?></option>
                  <?php foreach($job_role as $job_role){ ?>
                   <option value="<?php echo $job_role->job_role; ?>"><?php echo $job_role->job_role; ?></option>
                    <?php } ?>
                </select>
            </div>
    <div class="form-group">
      <label for="pwd">Joblocation</label>
       <select name="loc" class="form-control" id="job_location" required>
      <option value="<?php echo $edit->work_location; ?>"><?php echo $edit->work_location; ?></option>
       <?php foreach($job_loc as $job_loc){ ?>
       <option value="<?php echo $job_loc->job_location; ?>"><?php echo $job_loc->job_location; ?></option>
          <?php } ?>
    </select>
    </div>
    <div class="form-group" id="cont">
     <label for="pwd">Job-Description</label>
    <textarea name="editor1" class="jobdesc" id="editor1"><?php echo $edit->job_description; ?></textarea>
     </div>
     <div class="form-group" id="cont">
     <label for="pwd">Total-Position</label>
     <input type="number" class="form-control" name="total_position" id="total_position" value="<?php echo $edit->position_total; ?>" required>
    </div>
     <div class="form-group" id="cont">
     <label for="pwd">Total-Experience</label>
     <input type="number" class="form-control" name="job_exeprience" id="job_exeprience" value="<?php echo $edit->job_exeprience; ?>" required>
    </div>
     <?php } ?>
     <?php }else{ ?>
      <div class="form-group">
              <label for="pwd">Jobrole</label>
                <select name="job_role" class="form-control" id="job_title" required>
                  <option value="">Select An Jobrole</option>
                  <?php foreach($job_role as $job_role){ ?>
                   <option value="<?php echo $job_role->job_role; ?>"><?php echo $job_role->job_role; ?></option>
                    <?php } ?>
                </select>
            </div>
     <div class="form-group">
      <label for="pwd">Joblocation</label>
       <select name="loc" class="form-control" id="job_location" required>
      <option value="">Select An Location</option>
       <?php foreach($job_loc as $job_loc){ ?>
       <option value="<?php echo $job_loc->job_location; ?>"><?php echo $job_loc->job_location; ?></option>
          <?php } ?>
    </select>
    </div>
     <div class="form-group" id="cont">
     <label for="pwd">Job-Description</label>
    <textarea name="editor1" class="jobdesc" id="editor1" required></textarea>
     </div>
     <div class="form-group" id="cont">
     <label for="pwd">Total-Position</label>
     <input type="number" class="form-control" name="total_position" id="total_position" required>
    </div>
     <div class="form-group" id="cont">
     <label for="pwd">Total-Experience</label>
     <input type="number" class="form-control" name="job_exeprience" id="job_exeprience" required>
    </div>
    <?php } ?>
     <div class="form-group">
       <p id="ins_errors" style="color:red;"></p>
              <?php if(ISSET($editcareer) && !empty($editcareer)) { ?>
        <input type="submit" class="btn btn-primary btn_save" id="btn_cat" name="upload_btn" value="Update career">
        <?php }else{ ?>
         <input type="submit" class="btn btn-success btn_save" id="btn_cat" name="upload_btn" value="Upload career">
        <?php } ?>
        </div>
   </div>
       
       </form>
      </div>
      
    </div>
  </div>



  <div class="modal fade" id="myModalx" role="dialog" style="width:100%;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Job Description</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
         <div class="modal-body">
          <p id="view_mssg"></p>
       </div>  
       <div class="modal-footer">
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
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
   <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
   <script src="js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="js/views/main.js"></script>


<script>
      CKEDITOR.replace( 'editor1' );
    </script>
    <script>
      CKEDITOR.replace( 'editor2' );
    </script>

   <script>

    $(document).ready(function() {
       var dataTable = $('.myTable').DataTable();
      $(".button_edit").click(function(){
       $("#myModal").modal('show');
       });
      $("#reset_opt").click(function(){
        location.reload();
    });});

    function deletecareer(id){
    if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"Career/deleteuser",
 data:{
    "id":id,
},
     dataType:'json',
success:function(response){
  $("#del_err").html("Career successfully deleted");
 setTimeout(function(){
  location.reload();
},2000);
}
});
}
}


function editcareer(id){
$("#job_title").removeAttr("required");
$("#job_location").removeAttr("required");
 $("#cke_editor1").show();
  $("#upjob_role").show();
  $("#uplocation").show();
$.ajax({
    type:"POST",
    url:"Career/get_careerdetails",
    data:{
    "id":id
     },
     dataType:'json',
success:function(response){
console.log(response);
$.each(response,function(key,value){
$("#upid").val(value.upload_id);
$("#upjob_role").val(value.job_title);
$("#uplocation").val(value.work_location);
$(".cke_editable > p").val("hii");
// $("#expiry_date").val(value.expiry_date);
$("#total_position").val(value.position_total);
$("#job_exeprience").val(value.job_exeprience);
});
$("#button_edit").html('Edit New Career');
$(".btn_save").val('Update career');
$("#mymodal").modal('show');
}
});
}



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
       $("#role_error").html("successfully updated!").css("color","green");
      }
    });
  }
}

function getmssgdetails(id,name){
   $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Career/getmssgdetails",
  data:{
    "id":id,
    "name":name
 },
  dataType:'json',
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    var mssg = value.job_description;
    $("#view_mssg").html(mssg);
  });
  $("#myModalx").modal('show');
}
});
}

$(document).ready(function(){
$("#filter_options").click(function(){
  var dataTable = $('.myTable').DataTable();
  var job_role = $("#job_role").val();
  var exp = $("#job_loc_filter").val();
  if(job_role == "" && exp == ""){
     $("#filteration_err").html("please select atleast one options");
  }else{
      $("#filteration_err").empty();
  $.ajax({
    type:"POST",
    url:"Career/filtration_details",
    data:{
    "job_role":job_role,
    "exp":exp 
     },
     dataType:'json',
success:function(response){
  console.log(response);
 if(response.length === 0){
  dataTable.clear();
   dataTable.row.add([
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found',
        'No Records Found'
    ]).draw();
 }else{
      dataTable.clear();
   $.each(response,function(key,value){
     dataTable.row.add([
        ''+value.posting_date+'',
        ''+value.job_title+'',
        ''+value.work_location+'',
        ''+value.position_total+'',
        '<button type="button" class="btn btn-default" onclick = "getmssgdetails('+value.upload_id+')">View Description</button>',
        ''+value.job_exeprience+'',
        '<a href="Career?editid='+value.upload_id+'"><i class="fa fa-edit green" aria-hidden="true" onclick="editcareer('+value.upload_id+')"></i></a> <i class="fa fa-trash red" onclick="deletecareer('+value.upload_id+')">'+'</i>'
    ]).draw();
   });
}
}
});
}
});
});

$(document).ready(function(){
      $('#btn_cat').on('submit', function(e){
        e.preventDefault();
        var btn_value = $(".btn_save").val();
        var url = "";
        if(btn_value == "Upload career"){
          url = "Career/upload_career";
        }else if(btn_value == "Update career"){
          url = "Career/update_career";
        }
        var job_role = $("#job_title").val();
        var location = $("#job_location").val();
        var location = $("#job_location").val();
         var jobdesc= $("#jobdesc").val();
         var expiry_date = $("#expiry_date").val();
         var total_position = $("#total_position").val();
      if(job_role == ""){
        $("#ins_errors").html("please select a jobrole");
      }
      else if(location == ""){
        $("#ins_errors").html("please select a location");
      }
      else if(jobdesc == ""){
        $("#ins_errors").html("job description cannot be empty");
      }
                else if(expiry_date == ""){
        $("#ins_errors").html("expiry date cannot be empty");
      }
                else if(total_position == ""){
        $("#ins_errors").html("please mention total position");
      }
      else if(job_role != "" && location != "" && jobdesc!= "" && expiry_date!= "" && total_position!= ""){
        $("#ins_errors").empty();
                      $.ajax({  
                     url:url,   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {
                        alert("Career succesfully updated!");
                        window.location.href="Career";
                     } 
                     });
                }  
                     }); 
        });


$(document).ready(function(){
      $("#add_more").click(function(){
          $("#cont").append('<input type="text" class="form-control" name="Job-Description[]"><button type="button" class="btn btn-danger remove_btn" id="remove_btn"><i class="fa fa-minus" aria-hidden="true"></i></button>');
      });
    });

    $(document).ready(function(){
     $("body").on("click", ".remove_btn", function () {
    $(this).prev().remove();
    $(this).remove();
});
});


function editcareer(id){
$.ajax({
    type:"POST",
    url:"Career/get_careerdetails",
    data:{
    "id":id
     },
     dataType:'json',
success:function(response){
console.log(response);
}
});
}

</script>
 </body>
 </html>
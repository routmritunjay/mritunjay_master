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
   <link href="css/dashboard.css" rel="stylesheet">
   <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <!-- Styles required by this views -->
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body"> 
     <!-- Main content -->
     <main class="main mainbg">
       <!-- Breadcrumb -->
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Admin</li>
         <li class="breadcrumb-item active">HR Policies</li>
         <!-- Breadcrumb Menu-->
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12">
                <button type="button" class="btn green" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add New Policy</button>
                <p id="del_errors" style="color:red;"></p>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">List of Policies</div>
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col"><S class="no"></S>S.No</th>
                      <th scope="col">Policy Name</th>
                      <th scope="col">File Name</th>
                      <th scope="col">Uploaded Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php $counter = 1; ?>
                      <?php foreach($details as $details){ ?>
                      <th scope="row">
                        <?php echo $counter++; ?>
                      </th>
                      <td><?php echo $details->policy_name; ?></td>
                      <td><?php echo $details->image; ?></td>
                       <td><?php echo $details->date; ?></td>
                      <td><i class="fa fa-edit green" aria-hidden="true"  onclick = "editpolicy('<?php echo $details->image_id;?>')"></i><i class="fa fa-trash red" aria-hidden="true" onclick="deletepolicy('<?php echo $details->policy_name; ?>','<?php echo $details->image_id; ?>')"></i></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  </table>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">Policies Status</div>
              <div class="panel-body">
                <table class="table table-bordered" id="myiTable">
                    <thead>
                      <tr>
                        <!-- <th scope="col"><S class="no"></S>S.No</th> -->
                        <th scope="col">Employee Name</th>
                        <th scope="col">Employee Id</th>
                        <th scope="col">Employee Email</th>
                        <th scope="col">Policy Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php foreach($status as $status){
                        if($status->policy_name != ''){?>
                        <td><?php echo $status->first_name; ?></td>
                        <td><?php echo $status->uniqueID; ?></td>
                        <td><?php echo $status->email; ?></td>
                        <td><?php echo $status->policy_name; ?></td>
                        <?php if($status->policy_status == "accepted"){ ?>
                        <td><i style="font-size:24px" class="fa green">&#xf00c;</i></td>
                        <?php }else if($status->policy_status == "rejected"){ ?>
                        <td><i style="font-size:24px" class="fa red">&#xf00d;</i></td>
                        <?php }else { ?>
                          <td><i class="fa fa-clock-o" aria-hidden="true"></i></td>
                        <?php } ?>   
                      </tr>
                      <?php }} ?>
                    </tbody>
                  </table>
              </div>
            </div>
           </div>
         </div>
       </div>
     </main>
   </div>
 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Policies</h4>
      </div>
      <div class="modal-body">
        <form name="MyForm" id="btn_cat">
           <div class="form-group">
              <label for="pname">Policy Name:</label>
              <input type="text" class="form-control" id="policy_name" name="policy_name" placeholder="Enter Policy Name">
            </div>
            <div class="form-group">
              <label for="email">Upload Policy Documents:</label>
              <input class="form-control" type="file" name="userfile" id="userfile" accept="" multiple>  
            </div>
            <div class="form-group">
              <p id="errrors" style="color:red;"></p>
            <input type="submit" class="btn btn-success" value="Add Policy">
            <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:fixed;top:70%;left:50%;padding:2px;"><img src='<?php echo base_url(); ?>img/ajax-loader.gif' width="64" height="64" /><br>Loading..</div>
             </div>
        </form>
      </div>
    </div>

  </div>
</div>

<div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Policies</h4>
      </div>
      <div class="modal-body">
        <form name="MyForm" id="btn_cat_edit">
           <div class="form-group">
             <input type="hidden" id="policy_id" name="policy_id">
            <input type="hidden" id="prev_img" name="prev_img">
              <label for="pname">Policy Name:</label>
              <input type="text" class="form-control" id="up_policy_name" name="up_policy_name" placeholder="Enter Policy Name">
            </div>
            <div class="form-group">
              <label for="email">Upload Policy Documents:</label>
              <input class="form-control" type="file" name="up_userfile" id="up_userfile" accept="">
              <span id="up_image"></span>  
            </div>
            <div class="form-group">
              <p id="errrors_edit" style="color:red;"></p>
            <input type="submit" class="btn btn-success" value="Update Policy">
             </div>
        </form>
      </div>
    </div>

  </div>
</div>
  <footer class="app-footer footerbg text-center">Intelex Systems © 2018 Intelex Systems Inc. </footer>
 
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

   <script>
    $(document).ready( function () {
    $('#myiTable').DataTable();
      });


$(document).ready(function(){
$('#btn_cat').on('submit', function(e){
             e.preventDefault();
  var policy_name = $("#policy_name").val();
    var userfile = $("#userfile").val();
           var errors = "";
           if(policy_name == ""){
            errors = "policy name should not be empty";
            $("#errrors").html(errors).css('color','red');
           }
           else if(userfile == ""){
            errors = "Please choose an document";
            $("#errrors").html(errors).css('color','red');
           }
           else if(policy_name != ""  && userfile != ""){
                   $("#errrors").empty();
                $.ajax({  
                     url:"<?php echo base_url(); ?>Hrpolicies/insertfile",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {
                      console.log(data);
           if(data == 1){
            $("#errrors").html("Policy succesfully updated!").css('color','green');
                  document.getElementById("btn_cat").reset();
                  setTimeout(function(){
                    location.reload();
                       },3000);
           }else if(data == 2){
            $("#errrors").html("Above policy has been already uploaded.uploading failed!!");
                  document.getElementById("btn_cat").reset();
           }else{
            $("#errrors").html("Invalid file type. only file type of pdf,csv and doc are allowed!!");
           }
                     } 
                     });
                     } 
                 });
$(document).ajaxStart(function(){
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
    });
        });

function deletepolicy(policy_name,id){
if(confirm("Are you sure want to delete!")){
$.ajax({
  type:"POST",
url:"Hrpolicies/deleteuser",
 data:{
  "policy_name":policy_name,
    "id":id,
},
success:function(response){
  console.log(response);
  $("#del_errors").html("Policy succesfully deleted");
  setTimeout(function(){
  location.reload();
  },3000);
}
});
}
}
 function elogout(){
    $.ajax({
  type:"POST",
url:"Employeedashboard/logout",
 data:{
  },
  success:function(response){
  console.log(response);
  window.location.href = '<?php echo base_url(); ?>Login';
}
});
}

function editpolicy(id){
  $.ajax({
    type:"POST",
      url:"<?php echo base_url();?>Hrpolicies/get_policies",
   data:{
      "id":id,
  },
  dataType:'json',
  success:function(response){
    console.log(response);
    $.each(response,function(key,value){
    $("#policy_id").val(value.image_id);
    $("#up_policy_name").val(value.policy_name);
    $("#up_image").html(value.image);
    $("#prev_img").val(value.image);
    $("#mymodal").modal('show');
  });
}
});
}

$('#myModal').on('hidden.bs.modal', function () {
 location.reload();
});

$(document).ready(function(){
$('#btn_cat_edit').on('submit', function(e){
             e.preventDefault();
  var policy_name = $("#up_policy_name").val();
           var errors = "";
           if(policy_name == ""){
            errors = "policy name should not be empty";
            $("#errrors_edit").html(errors).css('color','red');;
           }
           else if(policy_name != ""){
                   $("#errrors").empty();
                $.ajax({  
                     url:"<?php echo base_url();?>Hrpolicies/update_policy",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {
                      console.log(data);
           if(data == "true"){
            $("#errrors_edit").html("Policy succesfully updated!!").css("color","green");
            document.getElementById("btn_cat_edit").reset();
             setTimeout(function(){
              location.reload();
                 },3000);
           }else{
            $("#errrors_edit").html("Invalid file type. only file type of pdf,csv and doc!!");
           }
                     } 
                     });
                     } 
                 });
        });
</script>
 
 </body>
 </html>
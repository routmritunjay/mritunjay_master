 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Leaf Lite - Free Bootstrap Admin Template">
   <meta name="author" content="Łukasz Holeczek">
   <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
   <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png">
   <title>Intelexsystemsinc.com</title>
 
   <!-- Icons -->
   <link href="<?php echo base_url(); ?>vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>vendors/css/simple-line-icons.min.css" rel="stylesheet">
 
   <!-- Main styles for this application -->
   <link href="<?php echo base_url(); ?>css/dashboard.css" rel="stylesheet">
   <!-- Styles required by this views -->
 <style>
 input[type='submit']
{
    margin:10px 10px 10px 10px; //just an example, you can add according to your need
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
         <li class="breadcrumb-item">Employee</li>
         <li class="breadcrumb-item active">Policies</li>
 
         <!-- Breadcrumb Menu-->
        
       </ol>
               <input type="hidden" id="vals" value="<?php echo $email; ?>">
       <div class="panel panel-default">
              <div class="panel-heading">Policies Status</div>
              <div class="panel-body">
                <input type="hidden" id="policy_name">
                <table class="table table-bordered" id="myiTable">
                    <thead>
                      <tr>
                        <th>Policy-name</th>
                        <th>Policy-view</th>
                        <th>Policy-status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach($details as $key=>$value){
                        ?>
                      <tr>
                        <td>
                        <?php echo $value['policy_name']; ?></td>
                        <td><input type="button" class="btn btn-primary" value="View Document" onclick="opendoc('<?php echo base_url(); ?>/<?php echo $value['policy_image']; ?>','<?php echo $value['policy_name']; ?>')"></td>
                        <?php $emppolicy = $value['policy_status'];
                        if(empty($emppolicy)){ ?>
                          <td class="policy_status_view"><div class="show_policy_response" id="show_policy_response">
                        </div></td>
                        <?php } ?>
                        <?php foreach($value['policy_status'] as $key=>$val){ ?>
                          <?php if($val['policy_status'] == 'accepted'){?>
                       <td class="policy_status_view"><input type="submit" class="btn btn-default" id="accep" value="Accepted"></td>
                        <?php }else if($val['policy_status'] == 'rejected'){?>
                        <td class="policy_status_view"><input type="submit" class="btn btn-default" id="accep" value="Rejected"></td>
                        <?php } ?>
                        <?php } ?>
                         <?php } ?>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
           </div>
     </main>
   </div>
 
 
   <footer class="app-footer footerbg">
     <span><a href="https://genesisui.com/bootstrap-admin-template.html?id=leaf">Intelex Systems </a> © 2018 Intelex Systems Inc.</span>
     <span class="ml-auto">Powered by <a href="https://genesisui.com/bootstrap-admin-template.html?id=leaf">Intelex Systems Inc </a></span>
   </footer>
 
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url(); ?>vendors/js/jquery.min.js"></script>
   <script src="<?php echo base_url(); ?>vendors/js/popper.min.js"></script>
   <script src="<?php echo base_url(); ?>vendors/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="Loginvendors/js/Chart.min.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="<?php echo base_url(); ?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="<?php echo base_url(); ?>js/views/main.js"></script>
<script>
  $(document).ready(function(){
    var email = $("#vals").val();
    var status_val = $(".policy_status_view").html();
    $.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>/Employeedashboard/getdetails",
        dataType: "json",
 data:{
  "email":email,
},
success:function(response){
  console.log(response);
  $.each(response,function(key,value){
    var exe  = value.employee_policies;
if(exe == ""){
}
else if(exe == "accepted"){
  $("#accep").val("accepted");
}
else if(exe == "declined"){
  $("#dec").val("declined");
}
  });
}
  });
  });
  function viewsta(value,policy_name){
    var email = $("#vals").val();
    var policy_name = $("#policy_name").val();
$.ajax({
  type:"POST",
url:"<?php echo base_url(); ?>/Employeedashboard/updatestatus",
 data:{
  "email":email,
  "policy_name":policy_name,
  "value":value
},
success:function(response){
  console.log(response);
  alert("Your data has been successfully updated");
  window.location.href="<?php echo base_url(); ?>Employeedashboard/viewpolicies";
}
});
  }

 
function opendoc(url,policy_name){
window.open(url, '_blank');
show_btn_response(policy_name);
}


function show_btn_response(policy_name){
  $("#policy_name").val(policy_name);
  $("#show_policy_response").empty();
  $("#show_policy_response").append("<input type='submit' class='btn btn-success' id='accep' value='Accept' onclick='viewsta(1)'><input type='submit' class='btn btn-danger' id='accep' value='Reject' onclick='viewsta(0)'>");
}


function elogout(){
    $.ajax({
  type:"POST",
  url:"<?php echo base_url(); ?>Employeedashboard/logout",
  data:{
  },
  success:function(response){
    window.location.href="<?php echo base_url(); ?>Login";
}
});
}
 </script>
 </body>
 </html>
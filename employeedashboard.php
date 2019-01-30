
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
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
   <!-- Styles required by this views -->
 
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">   
     <main class="main mainbg">
       <!-- Breadcrumb -->
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Employee</li>
         <li class="breadcrumb-item active">Dashboard</li>
         <!-- Breadcrumb Menu-->
         <div class = "pull-right" style="margin-left:600px; margin-top: -3px; color:green;"></div>
       </ol>
 
       <div class="container-fluid dashboradbg">
         <div class="animated fadeIn">
           <div class="row">
             <div class="col-sm-3 col-lg-3">
                 <div class="card">
                 <div class="card-body pb-0">
                   <h4 class="mb-0">Employee Policies</h4>
                    <p>Document</p>
                 </div>
                  <input type="hidden" id="vals" value="<?php echo $email; ?>">
                  <button type="button" class="btn_dashbaordpanel" onclick="window.location.href='Employeedashboard/viewpolicies'">View</button>
                  <!-- <div class="action_buttons">

                   <button class="btn_accept" id="accep" onclick="viewsta('accepted')" value="Accept"><i class="fa fa-check" aria-hidden="true"></i></button><button class="btn_reject" id="dec" onclick="viewsta('declined')" value="Decline"><i class="fa fa-ban" aria-hidden="true"></i></button>
                 </div> -->
               </div>
             </div>
             <!--/.col-->
          
              <div class="col-sm-3 col-lg-3">
               <div class="card">
                 <div class="card-body pb-0">
                   <h4 class="mb-0">Leave Applications</h4>
                 </div>
                 <button class="btn_dashbaordpanel color_red" onclick="window.location.href='Employeedashboard/Leave'">Apply</button>
               </div>
             </div>
             <!--/.col-->
 
             <div class="col-sm-3 col-lg-3">
               <div class="card">
                 <div class="card-body pb-0">
                   <div class="btn-group float-right">
                    </div>
                   <h4 class="mb-0">Timesheet</h4>
                 </div>
                 <button class="btn_dashbaordpanel color_purple" onclick="window.location.href='Timesheet'">Apply</button>
               </div>
             </div>
             <!--/.col-->
 
             <div class="col-sm-3 col-lg-3">
               <div class="card">
                 <div class="card-body pb-0">
                   <div class="btn-group float-right">
                   </div>
                   <h4 class="mb-0">Holidays</h4>
                   <p>List of Holidays - 2018</p>
                 </div>
                 <button class="btn_dashbaordpanel color_blue" onclick="window.location.href='HolidayList'">View</button>
               </div>
             </div>
             <!--/.col-->
           </div>
          
         </div>
 
       </div>
       <!-- /.conainer-fluid -->
     </main>
 
   </div>
 
   <footer class="app-footer footerbg">
     <span><a href="https://genesisui.com/bootstrap-admin-template.html?id=leaf">Intelex Systems </a> © 2018 Intelex Systems Inc.</span>
     <span class="ml-auto">Powered by <a href="https://genesisui.com/bootstrap-admin-template.html?id=leaf">Intelex Systems Inc </a></span>
   </footer>
 
   <!-- Bootstrap and necessary plugins -->
   <script src="vendors/js/jquery.min.js"></script>
   <script src="vendors/js/popper.min.js"></script>
   <script src="vendors/js/bootstrap.min.js"></script>
   <script src="vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="vendors/js/Chart.min.js"></script>
 
   <!-- Leaf Lite main scripts -->
 
   <script src="js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="js/views/main.js"></script>
<script>
  $(document).ready(function(){
    $("#accep").hide();
$("#dec").hide();
        var email = $("#vals").val();
    $.ajax({
  type:"POST",
url:"Employeedashboard/getdetails",
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
  $("#dec").hide();
  $("#accep").show();
  $("#accep").val("accepted");
$('input[type="submit"]').attr('disabled','disabled');
}
else if(exe == "declined"){
  $("#accep").hide();
  $("#dec").val("declined");
}
  });
}
  });
  });
  function viewsta(value){
    var email = $("#vals").val();
$.ajax({
  type:"POST",
url:"Employeedashboard/updatestatus",
 data:{
  "email":email,
    "value":value
},
success:function(response){
  console.log(response);
    alert("your data has been successfully updated");
          location.reload();
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
    location.reload();
}
});
}

function opendoc(url){
window.open(url, '_blank');
$("#accep").show();
$("#dec").show();
}
 </script>
 </body>
 </html>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="Łukasz Holeczek">
   <meta name="keyword" content="">

   <link rel="shortcut icon" href="images/favicon.png">
   <title>Intelexsystemsinc.com</title>
 
   <!-- Icons -->
   <link href="vendors/css/font-awesome.min.css" rel="stylesheet">
   <link href="vendors/css/simple-line-icons.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
   <!-- Main styles for this application -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link href="css/dashboard.css" rel="stylesheet">
   <!-- Styles required by this views -->
   <style>
   .active{
    color:red;
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
         <li class="breadcrumb-item active">Dashboard</li>
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
                  <?php foreach ($details as $details) { ?>
                 <button type="button" class="btn_dashbaordpanel" onclick="window.open('<?php echo $details->image; ?>','_blank')">View</button>
                 <?php } ?>
               </div>
             </div>
             <!--/.col-->
          
             <div class="col-sm-3 col-lg-3">
               <div class="card">
                 <div class="card-body pb-0">
                   <h4 class="mb-0">Leave Applications</h4>
                   <p>Employees on Leave</p>
                 </div>
                 <?php $leave_date = date("Y-m-d"); ?>
                 <button class="btn_dashbaordpanel color_red" onclick="window.location.href='Leave?leave_date=<?php echo $leave_date; ?>'"><?php echo $total_leave_count; ?></button>
               </div>
             </div>
             <!--/.col-->
 
             <div class="col-sm-3 col-lg-3">
               <div class="card">
                 <div class="card-body pb-0">
                   <div class="btn-group float-right">
                    </div>
                   <h4 class="mb-0">Employee</h4>
                   <p>Total Employee Count</p>
                 </div>
                 <button class="btn_dashbaordpanel color_purple" onclick="window.location.href='Admin_usermanagement'"><?php echo $total_emp_count; ?></button>
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
 
   <footer class="app-footer footerbg text-center">Intelex Systems © 2018 Intelex Systems Inc. </footer>
 
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
   <script src="js/views/.main.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    var reset_url = "";
          $('.nav-link').each(function(){
          var url  = $('#url').val();
          if(url == $(this).attr('href')){
            $(this).addClass("active");
          }
          });
  </script>
 </body>
 </html>
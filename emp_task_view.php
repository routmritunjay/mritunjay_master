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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
   <link rel="<?php echo base_url();?>stylesheet" href="css/bootstrap.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url();?>css/dashboard.css" rel="stylesheet">
   <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
   <!-- Styles required by this views -->
 </head>
 
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   <div class="app-body">
     <main class="main mainbg">
       <ol class="breadcrumb breadcrumbbg">
         <li class="breadcrumb-item">Home</li>
         <li class="breadcrumb-item">Dashboard</li>
         <li class="breadcrumb-item active">Employee_project/taskview</li>
       </ol>
 
       <div class="container-fluid dashboradbg">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">Task-List</div>
              <div class="panel-body">
                <table class="table table-bordered myTable">
                  <thead>
                    <tr>
                      <th scope="col">Employee-Name</th>
                      <th scope="col">Task-Description</th>
                      <th scope="col">Task-added-date</th>
                      <th scope="col">Task-start-time</th>
                      <th scope="col">Task-end-time</th>
                      <th scope="col">Task-status</th>
                      <th scope="col">Task-comments</th>
                      <th scope="col">Manager-comments</th>
                    </tr>
                  </thead>
                  <tbody id="tdetails">
                    <?php foreach($pro_details as $pro_details){ ?>
                    <tr>
                    <td><?php echo $pro_details->first_name; ?><?php echo $pro_details->last_name; ?></td>
                    <td><?php echo $pro_details->task_description; ?></td>
                    <td><?php echo $pro_details->task_date; ?></td>
                    <td><?php echo $pro_details->start_date; ?></td>
                    <td><?php echo $pro_details->end_date; ?></td>
                    <td><?php echo $pro_details->status; ?></td>
                    <td><?php echo $pro_details->comments; ?></td>
                   <?php if ($pro_details->task_comments == "") { ?>
                    <td>No-Comments</td>
                    <?php } else{ ?>
                      <td><?php echo $pro_details->task_comments; ?></td>
                   <?php } ?>
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
       </div>
     </main>
   </div>

   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Status</h4>
      </div>
         <div class="modal-body">
           <form name="MyForm" autocomplete="off" id="frm_cat">
          <div class="form-group">
            <label for="email">Assign status</label>
            <input type="hidden" id="task_id">
            <div><button type="button" class="task_stats" value="approved"><i style="font-size:24px; color:green;" class="fa">&#xf00c;</i></button>
            <button type="button" class="task_stats" value="rejected"><i style="font-size:24px; color:red;" class="fa">&#xf00d;</i></button></div>
          </div>
           <div class="form-group">
            <label for="email">Comments</label>
           <input class="form-control" type="text" name="task_comments" id="task_comments" placeholder="Enter comments">
          </div>
          <p id="leave_errors" style="color:red;"></p>
        </form>
       </div>  
       <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btn_cat">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>   
    </div>
  </div>
</div>
<footer class="app-footer footerbg text-center">Intelex Systems © 2018 Intelex Systems Inc. </footer>
   <!-- Bootstrap and necessary plugins -->
   <script src="<?php echo base_url();?>vendors/js/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/popper.min.js"></script>
   <script src="<?php echo base_url();?>vendors/js/pace.min.js"></script>
 
   <!-- Plugins and scripts required by all views -->
   <script src="<?php echo base_url();?>vendors/js/Chart.min.js"></script>

   <!-- Leaf Lite main scripts -->
 
   <script src="<?php echo base_url();?>js/app.js"></script>
 
   <!-- Plugins and scripts required by this views -->
 
   <!-- Custom scripts required by this view -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>vendors/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>  
<script>
$(document).ready( function () {
  $('.myTable').DataTable();
});



$(document).ready( function () {
$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
});
});

$('.task_stats').click(function() { 
    $(this).data('clicked', true);
    var data = $(this).val();
    if(data == "approved"){
    $("#leave_errors").css("color","green");
     }
    $("#leave_errors").html("you have choosed "+data+"");
});


$(document).ready(function(){
$('#btn_cat').on('click', function(e){
  var tsk_stats;
       if($('.task_stats').data('clicked') == true){
            tsk_stats = $(".task_stats").val();
       }else{
            tsk_stats = "false";
       }
    var task_comments = $("#task_comments").val();
    var task_id = $("#task_id").val();
    if(tsk_stats == "false"){
        $("#leave_errors").html("please choose an status to update!!!");
     }else if(tsk_stats != "false"){
                $.ajax({  
                     url:"<?php echo base_url(); ?>Employee_project/update_task_report",
                     method:"POST",  
                     data:{
                      "tsk_stats":tsk_stats,
                      "task_comments":task_comments,
                      "task_id":task_id
                     },  
                     success:function(data)  
                     {
                      console.log(data);
                      if(data == "true"){
                   $("#leave_errors").html("Task successfully uploaded!!").css('color','green');
                   setTimeout(function(){
                          location.reload();
                        },1000);
                 }else{
                  $("#leave_errors").html("Unable to update!!!");
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

function open_assign_task(id){
$("#task_id").val(id);
$("#myModal").modal('show');
}
</script>
 </body>
 </html>
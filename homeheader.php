
<header class="app-header navbar">
     <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
       <span class="navbar-toggler-icon"></span>
     </button>
     <?php if(ISSET($role)) { ?>
      <?php if($role == 1 || $role == 5 || $role == 3 || $role == 4 || $role == 7) { ?>
     <a class="navbar-brand" href="AdminDashboard">
       <img src="<?php echo base_url(); ?>img/dashboard-logo.png" class="logo" />
     </a>
      <?php }else if($role == 2 || $role == 0){?>
      <a class="navbar-brand" href="<?php echo base_url(); ?>Employeedashboard">
       <img src="<?php echo base_url(); ?>img/dashboard-logo.png" class="logo" />
     </a>
      <?php } ?>
     <?php } ?>
     <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
       <span class="navbar-toggler-icon"></span>
     </button>
    <?php if($role == 2 || $role == 0){?>
     <h6 class="username" style="padding:5px 0px 0px 0px">Welcome  <?php echo $full_name; ?></h6>
     <?php } ?>
     <ul class="nav navbar-nav ml-auto logout">
     	<?php if(ISSET($role)) { ?>
         <?php if($role == 1 || $role == 5 || $role == 3 || $role == 4 || $role == 7) { ?>
       <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
           <button><i class="fa fa-user"></i> Logout </button>
         </a>
         <div class="dropdown-menu dropdown-menu-right">
           <div class="dropdown-header text-center">
             <strong>Settings</strong>
           </div>
           <a class="dropdown-item" href="<?php echo base_url(); ?>Adminprofile"><i class="fa fa-user"></i> Profile</a>
          
           <a class="dropdown-item" href="" onclick ="alogout()"><i class="fa fa-lock"></i> Logout</a>
         </div>
       </li>
        <?php }else if($role == 2 || $role == 0){?>
        <div class='pull-left'>
        
      </div>
       <li class="nav-item dropdown">
         <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
           <button><i class="fa fa-user"></i> Logout </button>
         </a>
         <div class="dropdown-menu dropdown-menu-right">
           <div class="dropdown-header text-center">
             <strong>Settings</strong>
           </div>
           <a class="dropdown-item" href="<?php echo base_url(); ?>Employeeprofile"><i class="fa fa-user"></i> Profile</a>
          
           <a class="dropdown-item" href="" onclick ="elogout()"><i class="fa fa-lock"></i> Logout</a>
         </div>
       </li>
       <?php } ?>
       <?php } ?>
     </ul>
   </header>
   <script>
   	function alogout(){
      $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>AdminDashboard/logout",
       data:{
        },
        success:function(response){
        console.log(response);
      location.reload();
      }
      });
      }
      </script>
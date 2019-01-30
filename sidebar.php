<div class="sidebar">
      <?php $url_view = explode('/',$_SERVER['REQUEST_URI']); 
        $final_url_view = end($url_view);
      ?>
        <nav class="sidebar-nav">
        <ul class="nav">
          <?php if(ISSET($role)) { ?>
            <?php if($role == 2) { ?>
            <li class="nav-item">
             <a class="nav-link <?php if($final_url_view == "Employeedashboard"){echo("active");} ?>" href="<?php echo base_url(); ?>Employeedashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
           </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "leave" || $final_url_view == "Leave" || $final_url_view == "Available_leave"){echo("active");} ?>" href="<?php echo base_url();?>Employeedashboard/leave"><i class="fa fa-envelope" aria-hidden="true"></i> Leave Requests</a>
          </li>
           <li class="nav-item"><a class="nav-link <?php if($final_url_view == "EmployeeLeaves"){echo("active");} ?>" href="<?php echo base_url();?>Employeedashboard/EmployeeLeaves"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></i>Employee Leaves</a></li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "payslip"){echo("active");} ?>" href="<?php echo base_url();?>Employeedashboard/payslip"><i class="fa fa-file" aria-hidden="true"></i>Payslip</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Timesheet" || $final_url_view == "task_entry"){echo("active");} ?>" href="<?php echo base_url();?>Timesheet"><i class="fa fa-list-alt"></i>Timesheet</a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Employee_project"){echo("active");} ?>" href="<?php echo base_url();?>Employee_project"><i class="fa fa-bell" aria-hidden="true"></i>Employee Timesheet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Employee_attendence"){echo("active");} ?>" href="<?php echo base_url();?>Employee_attendence"><i class="fa fa-clock-o" aria-hidden="true"></i>Attendance</a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "HolidayList"){echo("active");} ?>" href="<?php echo base_url();?>HolidayList"><i class="fa fa-list"></i>Holiday List</a>
          </li>
           <?php }else if($role == 0){?>
           <li class="nav-item">
             <a class="nav-link <?php if($final_url_view == "Employeedashboard"){echo("active");} ?>" href="<?php echo base_url(); ?>Employeedashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
           </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "leave" || $final_url_view == "Leave" || $final_url_view == "Available_leave"){echo("active");} ?>" href="<?php echo base_url();?>Employeedashboard/leave"><i class="fa fa-envelope-open-o" aria-hidden="true"></i></i> Leave Requests</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "payslip"){echo("active");} ?>" href="<?php echo base_url();?>Employeedashboard/payslip"><i class="fa fa-file" aria-hidden="true"></i>Payslip</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Timesheet" || $final_url_view == "task_entry"){echo("active");} ?>" href="<?php echo base_url();?>Timesheet"><i class="fa fa-bell" aria-hidden="true"></i>Timesheet</a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Employee_attendence"){echo("active");} ?>" href="<?php echo base_url();?>Employee_attendence"><i class="fa fa-clock-o" aria-hidden="true"></i>Attendance</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "HolidayList"){echo("active");} ?>" href="<?php echo base_url();?>HolidayList"><i class="fa fa-list"></i>Holiday List</a>
          </li>
           <?php } else if($role == 1 || $role == 5 || $role == 3 || $role == 4 || $role == 7){?>
          <?php if($role != 3){?>
          <li class="nav-item">
             <a class="nav-link <?php if($final_url_view == "AdminDashboard"){echo("active");} ?>" href="<?php echo base_url();?>AdminDashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
           </li>
           <?php } else { ?>
           <li class="nav-item">
             <a class="nav-link <?php if($final_url_view == "Hrdashboard"){echo("active");} ?>" href="<?php echo base_url();?>Hrdashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
           </li>
           <?php } ?>
            <?php if($role == 1){?>
           <li class="nav-item">
             <a class="nav-link <?php if($final_url_view == "Admin"){echo("active");} ?>" href="<?php echo base_url();?>Admin"><i class="fa fa-user-circle"></i> Admin </a>
           </li>
           <?php } ?>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Roles"){echo("active");} ?>" href="<?php echo base_url();?>Roles"><i class="fa">&#xf2ba;</i>Roles</a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Hrpolicies"){echo("active");} ?>" href="<?php echo base_url();?>Hrpolicies"><i class="fa fa-flag" aria-hidden="true"></i> HR Policies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Admin_usermanagement" || $final_url_view == "Employeadd"){echo("active");} ?>" href="<?php echo base_url();?>Admin_usermanagement"><i class="fa fa-user" aria-hidden="true"></i> Employee Management</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Resume"){echo("active");} ?>" href="<?php echo base_url();?>Resume"><i class="fa fa-linkedin" aria-hidden="true"></i>Resume DB</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Career"){echo("active");} ?>" href="<?php echo base_url();?>Career"><i class="fa fa-briefcase" aria-hidden="true"></i>Careers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Addjobrole"){echo("active");} ?>" href="<?php echo base_url();?>Career/Addjobrole"><i class="fa fa-laptop"></i>Technology</a>
          </li>
          <li class="dropdown nav-item">
             <a href="#" class="dropdown-toggle nav-link <?php if($final_url_view == "Leave" || $final_url_view == "Leavetype" || $final_url_view == "Employeeleave" || $final_url_view == "RestrictedHoliday"){echo("active");} ?>" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-envelope" aria-hidden="true"></i>Leave Requests<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Leave"></i>Employee Leaves</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Leave/Leavetype"></i>Leave Type</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Leave/Employeeleave"></i>Employee Remaining Leaves</a></li>
              <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Leave/RestrictedHoliday"></i>Restricted Holiday</a></li>
            </ul>
           </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "HolidayList"){echo("active");} ?>" href="<?php echo base_url();?>HolidayList"><i class="fa fa-list"></i> Holiday List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Events</a>
          </li>
          <?php if($role == 1 || $role == 5 || $role == 3 || $role == 4 || $role == 7) { ?>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Payslips"){echo("active");} ?>" href="<?php echo base_url();?>Payslips"><i class="fa fa-file" aria-hidden="true"></i> Payslips</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-money" aria-hidden="true"></i> Salary</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Attendence"){echo("active");} ?>" href="<?php echo base_url();?>Attendence"><i class="fa fa-clock-o" aria-hidden="true"></i>Attendence</a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Employee_timesheet"){echo("active");} ?>" href="<?php echo base_url();?>Employee_timesheet"><i class="fa fa-bell"></i>Employee Timesheet</a>
          </li>
          <?php if($role == 3){?>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "leave" || $final_url_view == "Leave" || $final_url_view == "Available_leave"){echo("active");} ?>" href="<?php echo base_url();?>Employeedashboard/leave"><i class="fa fa-envelope" aria-hidden="true"></i> Leave Requests</a>
          </li>
           <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Hrpayslip"){echo("active");} ?>" href="<?php echo base_url();?>Hrpayslip"><i class="fa fa-file" aria-hidden="true"></i>Payslip</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if($final_url_view == "Timesheet" || $final_url_view == "task_entry"){echo("active");} ?>" href="<?php echo base_url();?>Timesheet"><i class="fa fa-list-alt"></i>Timesheet</a>
          </li>
          <?php } ?>
          <?php } ?>
          <?php } ?>
         </ul>
       </nav>
     </div>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<table style="width: 600px;    padding: 0 0 0 112px;">
    <tr>
        <td style="width: 10%">

        </td>
        <td>
            <img src="<?php echo base_url();?>img/logo2.png" alt="Intellex logo">
        </td>
        <td>

        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
<table style="width: 600px ;    border-radius: 9px;

padding: 20px;
width: 596px;
height: 33px;
border: 1px solid #e4ecf0;    border-top: 5px solid #119ed5;">

    <tr>
        <td>
            <span style="font-family: Arial;font-size: 20px;color: #06705b"> Dear Sir/Mam,</span>
            </td>
            </tr>
            <tr>
        <td>
            <span style=" font-family: Arial;font-size: 15px">
                <?php if($leave_type == "Restricted Holiday"){ ?>
                I am <?php echo $name; ?>, would like to apply leave(RH) for <?php echo $leave; ?>.
                    <br>
                    <br>
                    <span style="font-size: 15px;font-family:Arial">Kind Regards,</span>
                  <span style="font-size: 15px;font-family:Arial"><?php echo $name; ?>.</span>
                <?php }else if($leave_type == "Sick Leave"){ ?>
                    I am <?php echo $name; ?>, would like to apply leave(SL) for <?php echo $no_days; ?>day from <?php echo $start_date; ?> to <?php echo $end_date; ?>.
                    <br>
                    <br>
                    <span style="font-size: 15px;font-family:Arial">Kind Regards,</span>
                  <span style="font-size: 15px;font-family:Arial"><?php echo $name; ?>.</span>
                <?php }else if($leave_type == "Casual Leave"){ ?>
                I am <?php echo $name; ?>, would like to apply leave(CL) for <?php echo $no_days; ?> day from <?php echo $start_date; ?> to <?php echo $end_date; ?>
                    <br>
                    <br>
                    <span style="font-size: 15px;font-family:Arial">Kind Regards,</span>
                    <span style="font-size: 15px;font-family:Arial"><?php echo $name; ?>.</span>
                <?php }else if($leave_type == "LOP"){ ?>
                 I am <?php echo $name; ?>, would like to apply leave(LOP) for <?php echo $no_days; ?> day from <?php echo $start_date; ?> to <?php echo $end_date; ?>
                    <br>
                    <br>
                    <span style="font-size: 15px;font-family:Arial">Kind Regards,</span>
                    <span style="font-size: 15px;font-family:Arial"><?php echo $name; ?>.</span>
                <?php }else if($leave_type == "mresapprove"){ ?>
                Hii <?php echo $name; ?>your Leave Application For <?php echo $restricted_holiday; ?>  has been <?php echo $status_value; ?> by Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "mapprove"){ ?>
                Hii <?php echo $name; ?> your Leave Application From <?php echo $start_date; ?> to <?php echo $end_date; ?> has been <?php echo $status_value; ?> From Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "mcanapprove"){ ?>
                Hii <?php echo $name; ?>your Request For Cancellation of Leave Application From <?php echo $start_date; ?> to <?php echo $end_date; ?> has been <?php echo $status_value; ?> From Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "mrescanapprove"){ ?>
                Hii <?php echo $name; ?> Your Request For Cancellation of Leave Application For <?php echo $restricted_holiday; ?> has been <?php echo $status_value; ?> From Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "emprescanapprove"){ ?>
                Hii <?php echo $name; ?> has applied for leave Cancellation for <?php echo $leave; ?>.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "ecanapprove"){ ?>
                Hii <?php echo $name; ?> has applied for leave Cancellation from <?php echo $start_date; ?> to <?php echo $end_date; ?>.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "hrresapprove"){ ?>
                Hii<?php echo $name; ?> Your Leave Application For <?php echo $restricted_holiday; ?>  has been <?php echo $status_value; ?> by HR Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "hrapprove"){ ?>
                Hii<?php echo $name; ?> Your Leave Application From <?php echo $start_date; ?> to <?php echo $end_date; ?> has been <?php echo $status_value; ?> From HR Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "hrcanresapprove"){ ?>
                Hii<?php echo $name; ?> Your Leave Application For <?php echo $restricted_holiday; ?>  has been <?php echo $status_value; ?> by HR Manager.<br><br>
                Please check in HR Portal for updates.
                <?php }else if($leave_type == "hrcanapprove"){ ?>
                Hii<?php echo $name; ?> Your Leave Application From <?php echo $start_date; ?> to <?php echo $end_date; ?> has been <?php echo $status_value; ?> From HR Manager.<br><br>
                Please check in HR Portal for updates.
                <?php } ?>
            </span>
        </td>
    </tr>
<table style="color:black;width: 600px">
    <tr style="text-align: center;width:33.3%">
        <td>
            <p style="font-family: Arial;font-size: 12px"> All Rights Reserved
                <br> privacy policy/Terms and conditions
            </p></td>

    </tr>
</table>
</html>
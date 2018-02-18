<?php
include '../class/myclass.php';
connection_open();
$eid=$_GET['eid'];
if(!isset($_GET['eid']) || empty($_GET['eid']))
{
    header("location:reservation-display.php");
}
$editquery=  mysql_query("select * from reservation where reservation_id='{$eid}'") or die(mysql_error());
$edit_data=  mysql_fetch_array($editquery);

if($_POST)
{
    $reservation_date=$_POST['reservation_date'];
    $parking_id=$_POST['parking_id'];
    $slot_id=$_POST['slot_id'];
    $reservation_charges=$_POST['reservation_charges'];
    $r_in_time=$_POST['r_in_time'];
     
    $r_out_time=$_POST['r_out_time'];
    $user_id=$_POST['user_id'];
    $reservation_status=$_POST['reservation_status'];
    
    $insert=  mysql_query("update `reservation` set `reservation_date`='{$reservation_date}', `parking_id`='{$parking_id}', `slot_id`='{$slot_id}', `reservation_charges`='{$reservation_charges}', `r_in_time`='{$r_in_time}', `r_out_time`='{$r_out_time}', `user_id`='{$user_id}', `reservation_status`='{$reservation_status}' where `reservation_id`='{$eid}' ") or die(mysql_error());
    if($insert)
    {
         
       header("location:reservation-display.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

        

    <title>Parking</title>

    <!-- Bootstrap Core CSS -->
    <?php
    include './theme-part/header-script.php';
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
           <?php
            
            include './theme-part/header.php';
            ?>
            <!-- /.navbar-top-links -->

            <?php
            
            include './theme-part/side-menu.php';
            ?>
             
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reservation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reservation Update
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" name="reservation_date" value="<?php echo $edit_data['reservation_date']; ?>" placeholder="Enter reservation_date" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Parking</label>
                                            <select class="form-control" name="parking_id">
                                                <option>--Select--</option>
                                                 <?php
                                                 $parking=mysql_query("SELECT * FROM `parking`");
                                                 while($parking_data=  mysql_fetch_array($parking))
                                                 {
                                                     $selected=$parking_data[0]==$edit_data[2] ? "selected" : "";
                                                     echo "<option value='{$parking_data[0]}'$selected >{$parking_data['parking_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Slot</label>
                                            <select class="form-control" name="slot_id">
                                                <option>--Select--</option>
                                                 <?php
                                                 $parkingslot=mysql_query("SELECT * FROM `parkingslot`");
                                                 while($parkingslot_data=  mysql_fetch_array($parkingslot))
                                                 {
                                                     $selected1=$parkingslot_data[0]==$edit_data[3] ? "selected" : "";
                                                     echo "<option value='{$parkingslot_data[0]}'$selected1 >{$parkingslot_data['slot_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>User</label>
                                            <select class="form-control" name="user_id">
                                                <option>--Select--</option>
                                                 <?php
                                                  $owner=mysql_query("SELECT * FROM `user` where `is_owner`='No'");
                                                 while($user_data=  mysql_fetch_array($owner))
                                                 {
                                                      $selected2=$user_data[0]==$edit_data[7] ? "selected" : "";
                                                     echo "<option value='{$user_data[0]}' $selected2>{$user_data['user_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Charges</label>
                                            <input class="form-control" value="<?php echo $edit_data['reservation_charges']; ?>" type="number" name="reservation_charges" placeholder="Enter reservation_charges">
                                        </div>
                                        <div class="form-group">
                                            <label>In Time</label>
                                            <input class="form-control" value="<?php echo $edit_data['r_in_time']; ?>" type="time" name="r_in_time" placeholder="Enter In Time">
                                        </div>
                                         
                                        <div class="form-group">
                                            <label>Out Time</label>
                                            <input class="form-control" value="<?php echo $edit_data['r_out_time']; ?>" type="time" name="r_out_time" placeholder="Enter Out Time">
                                        </div>
                                         
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input class="form-control" value="<?php echo $edit_data['reservation_status']; ?>" type="text" name="reservation_status" placeholder="Enter reservation_status">
                                        </div>
                                         
                                         
                                         <button type="submit" class="btn btn-default">Update</button>
                                         <a href="reservation-display.php" class="btn btn-default">Cancel</a>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                 
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
  <?php
          include './theme-part/footer-script.php';
  ?>

</body>

</html>

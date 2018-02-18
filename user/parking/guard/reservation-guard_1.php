<?php
include '../class/myclass.php';
connection_open();
session_start();
if(!isset($_SESSION['admin_id'])){
    header("location:login.php");
}
$guard=$_SESSION['admin_id'];
if($_POST)
{
    $reservation_date=$_POST['reservation_date'];
    $parking_id=$_POST['parking_id'];
    $slot_id=$_POST['slot_id'];
    $reservation_charges=$_POST['reservation_charges'];
    $r_in_time=$_POST['r_in_time'];
     
    $r_out_time=$_POST['r_out_time'];
    $user_id=$_POST['user_id'];
    
    
    $insert=  mysql_query("INSERT INTO `reservation`(`reservation_date`, `parking_id`, `slot_id`, `reservation_charges`, `r_in_time`, `r_out_time`, `user_id`, `reservation_status`) VALUES "
            . "('{$reservation_date}','{$parking_id}','{$slot_id}','{$reservation_charges}','{$r_in_time}','{$r_out_time}','{$user_id}','Waiting')") or die(mysql_error());
    if($insert)
    {
         
        echo"<script>alert('Record Inserted');</script>";
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
                            Reservation Insert
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" name="reservation_date" placeholder="Enter reservation_date" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Parking</label>
                                            <select class="form-control" name="parking_id">
                                                <option>--Select--</option>
                                                 <?php
                                                 $parking=mysql_query("SELECT * FROM `parking` where guard_id='{$guard}'");
                                                 while($parking_data=  mysql_fetch_array($parking))
                                                 {
                                                     echo "<option value='{$parking_data[0]}' >{$parking_data['parking_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Slot</label>
                                            <select class="form-control" name="slot_id">
                                                <option>--Select--</option>
                                                 <?php
                                                 $parkingid=mysql_query("SELECT * FROM `parking` where guard_id='{$guard}'");
                                                 $parkingiddata=  mysql_fetch_array($parkingid);
                                                 $parkingslot=mysql_query("SELECT * FROM `parkingslot` WHERE `parking_id`='{$parkingiddata['parking_id']}'");
                                                 while($parkingslot_data=  mysql_fetch_array($parkingslot))
                                                 {
                                                     echo "<option value='{$parkingslot_data[0]}' >{$parkingslot_data['slot_name']}</option>";
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
                                                     echo "<option value='{$user_data[0]}' >{$user_data['user_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Charges</label>
                                            <input class="form-control" type="number" name="reservation_charges" placeholder="Enter reservation_charges">
                                        </div>
                                        <div class="form-group">
                                            <label>In Time</label>
                                            <input class="form-control" type="time" name="r_in_time" placeholder="Enter In Time">
                                        </div>
                                         
                                        <div class="form-group">
                                            <label>Out Time</label>
                                            <input class="form-control" type="time" name="r_out_time" placeholder="Enter Out Time">
                                        </div>
                                         
                                         
                                         
                                         
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
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

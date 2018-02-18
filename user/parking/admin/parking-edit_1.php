<?php
include '../class/myclass.php';
connection_open();
$eid=$_GET['eid'];
if(!isset($_GET['eid']) || empty($_GET['eid']))
{
    header("location:parking-display.php");
}
$editquery=  mysql_query("select * from parking where parking_id='{$eid}'") or die(mysql_error());
$edit_data=  mysql_fetch_array($editquery);

if($_POST)
{
    $parking_name=$_POST['parking_name'];
    $parking_address=$_POST['parking_address'];
    $parking_latitude=$_POST['parking_latitude'];
    $parking_longitude=$_POST['parking_longitude'];
    $location_id=$_POST['location_id'];
     
    $owner_id=$_POST['owner_id'];
    
     
    
    $insert=  mysql_query("update `parking` set `parking_name`='{$parking_name}', `parking_address`='{$parking_address}', `parking_latitude`='{$parking_latitude}', `parking_longitude`='{$parking_latitude}', `owner_id`='{$owner_id}', `location_id`='{$location_id}' where `parking_id`='{$eid}'") or die(mysql_error());
    if($insert)
    {
        
         header("location:parking-display.php");
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
                    <h1 class="page-header">Parking</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Parking Update
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="parking_name" value="<?php echo $edit_data['parking_name']; ?>" placeholder="Enter Name" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Latitude</label>
                                            <input class="form-control" name="parking_latitude" value="<?php echo $edit_data['parking_latitude']; ?>" placeholder="Enter Latitude">
                                        </div>
                                        <div class="form-group">
                                            <label>Longtitude</label>
                                            <input class="form-control" name="parking_longitude" value="<?php echo $edit_data['parking_longitude']; ?>" placeholder="Enter Longtitude">
                                        </div>
                                         
                                         
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="parking_address" placeholder="Enter parking Address" rows="3"><?php echo $edit_data['parking_address']; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Owner</label>
                                            <select class="form-control" name="owner_id">
                                                <option>--Select--</option>
                                                 <?php
                                                 $owner=mysql_query("SELECT * FROM `user` where `is_owner`='yes'");
                                                 while($user_data=  mysql_fetch_array($owner))
                                                 {
                                                     $selected1=$user_data[0]==$edit_data[6] ? "selected" : "";
                                                     echo "<option value='{$user_data[0]}'$selected1 >{$user_data['user_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control" name="location_id">
                                                <option>--Select--</option>
                                               <?php
                                                 $location=mysql_query("SELECT * FROM `location`");
                                                 while($location_data=  mysql_fetch_array($location))
                                                 {
                                                      $selected2=$location_data[0]==$edit_data[7] ? "selected" : "";
                                                     echo "<option value='{$location_data[0]}'$selected2 >{$location_data['location_name']}</option>";
                                                 }
                                                 ?>
                                                 
                                                 
                                            </select>
                                        </div>
                                         
                                         
                                         
                                         
                                        <button type="submit" class="btn btn-default">Update</button>
                                        <a href="parking-display.php" class="btn btn-default">Cancel</a>
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

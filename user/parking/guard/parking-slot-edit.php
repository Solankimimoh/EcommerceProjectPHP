<?php
include '../class/myclass.php';
connection_open();
$eid=$_GET['eid'];
if(!isset($_GET['eid']) || empty($_GET['eid']))
{
    header("location:parking-slot-display.php");
}
$editquery=  mysql_query("select * from parkingslot where slot_id='{$eid}'") or die(mysql_error());
$edit_data=  mysql_fetch_array($editquery);

if($_POST)
{
    $slot_name=$_POST['slot_name'];
    $parking_id=$_POST['parking_id'];
     
    
    $insert=  mysql_query("update `parkingslot` set `slot_name`='{$slot_name}', `parking_id`='{$parking_id}' where `slot_id`='{$eid}'") or die(mysql_error());
    if($insert)
    {
       
       header("location:parking-slot-display.php");
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
                    <h1 class="page-header">Parking Slot</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Parking Slot Update
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="slot_name" value="<?php echo $edit_data['slot_name']; ?>" placeholder="Enter Name" class="form-control">
                                           
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
                                                     echo "<option value='{$parking_data[0]}'$selected>{$parking_data['parking_name']}</option>";
                                                 }
                                                 ?>
                                                
                                                 
                                            </select>
                                        </div>
                                         
                                         
                                        
                                        <button type="submit" class="btn btn-default">Update</button>
                                        <a href="parking-slot-display.php" class="btn btn-default">Cancel</a>
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

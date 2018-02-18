<?php
include '../class/myclass.php';
connection_open();
$eid=$_GET['eid'];
if(!isset($_GET['eid']) || empty($_GET['eid']))
{
    header("location:guard-display.php");
}
$editquery=  mysql_query("select * from guard where guard_id='{$eid}'") or die(mysql_error());
$edit_data=  mysql_fetch_array($editquery);

if($_POST)
{
    $guard_name=$_POST['guard_name'];
    $guard_address=$_POST['guard_address'];
    $guard_mobile=$_POST['guard_mobile'];
    $guard_email=$_POST['guard_email'];
    
    
    
    
    $insert=  mysql_query("update `guard` set  `guard_name`='{$guard_name}', `guard_address`='{$guard_address}', `guard_mobile`='{$guard_mobile}', `guard_email`='{$guard_email}' where guard_id='{$eid}'") or die(mysql_error());
    if($insert)
    {
       
       header("location:guard-display.php");
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
                    <h1 class="page-header">Guard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guard Update
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="guard_name" value="<?php echo $edit_data['guard_name']; ?>" placeholder="Enter Name" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="guard_email" value="<?php echo $edit_data['guard_email']; ?>" placeholder="Enter Email">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="guard_mobile" value="<?php echo $edit_data['guard_mobile']; ?>" placeholder="Enter Mobile No">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="guard_address" placeholder="Enter Address" rows="3"><?php echo $edit_data['guard_address']; ?></textarea>
                                        </div>
                                        
                                         
                                         
                                         
                                         
                                        <button type="submit" class="btn btn-default">Update</button>
                                        <a href="guard-display.php" class="btn btn-default">Cancel</a>
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

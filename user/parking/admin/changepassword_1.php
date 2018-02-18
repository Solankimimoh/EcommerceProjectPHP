<?php
session_start();
require '../class/myclass.php';
connection_open();
if(!isset($_SESSION['admin_id']))
{
    header("location:login.php");
 }
 
 
  if ($_POST)
 {
     $opass =$_POST['opass'];
     $npass =$_POST['npass'];
     $cpass =$_POST['cpass'];
     $id = $_SESSION['admin_id'];
     $getoldpss=  mysql_query("select guard_password from guard where guard_id='{$id}'") or die(mysql_error());
     $oldpssdata = mysql_fetch_row($getoldpss);
       if ($opass==$oldpssdata[0])
               {
                   if ($npass==$cpass)
                   {
                       if($oldpssdata[0]==$npass)
                       {
                           echo "<script>alert('new and old must be passwrd dif');</script>";
                       }
                       else 
                       {
                           $updateq=mysql_query("update guard set guard_password = '{$npass}' where guard_id='{$id}'") or die(mysql_errno());
                      echo "<script>alert(' passwrd changed');</script>";
                      
                
                        }
                   }else 
                   {
                      echo "<script>alert('new and confirm passwrd not match');</script>";
                      
                   }
                  
                   
               }
                else
                   {
                       echo "<script>alert('old passwrd not match');</script>";
                      
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
                    <h1 class="page-header">Change Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Change Password
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control" name="opass" placeholder="Enter OldPassword">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="npass" placeholder="Enter NewPassword">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="cpass" placeholder="Enter ConfirmPassword">
                                        </div>
                                        
                                        
                                         
                                         
                                         
                                         
                                        <button type="submit" class="btn btn-default">Change</button>
                                        <button type="reset" class="btn btn-default">Reset </button>
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

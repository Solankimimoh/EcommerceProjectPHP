<?php
include '../class/myclass.php';
connection_open();
if($_POST)
{
    $guard_name=$_POST['guard_name'];
    $guard_address=$_POST['guard_address'];
    $guard_mobile=$_POST['guard_mobile'];
    $guard_email=$_POST['guard_email'];
    $guard_password=$_POST['guard_password'];
    $guard_pic=$_FILES['guard_pic']['name'];
    $is_admin=$_POST['is_admin'];
     
    $insert=  mysql_query("INSERT INTO `guard`(`guard_name`, `guard_address`, `guard_mobile`, `guard_email`, `guard_password`, `guard_pic`, `is_admin`) VALUES "
            . "('{$guard_name}','{$guard_address}','{$guard_mobile}','{$guard_email}','{$guard_password}','{$guard_pic}','{$is_admin}')") or die(mysql_error());
    if($insert)
    {
        move_uploaded_file($_FILES['guard_pic']['tmp_name'], "../upload/".$guard_pic);
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
                    <h1 class="page-header">Guard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guard Insert
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="guard_name" placeholder="Enter Name" class="form-control">
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="guard_email" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="guard_password" placeholder="Enter Password">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="guard_mobile" placeholder="Enter Mobile No">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Profile Picture</label>
                                            <input type="file"  name="guard_pic">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="guard_address" placeholder="Enter Address" rows="3"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Is Admin</label>
                                            <select class="form-control" name="is_admin">
                                                <option>--Select--</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                                 
                                            </select>
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

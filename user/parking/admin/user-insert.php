<?php
include '../class/myclass.php';
connection_open();
if($_POST)
{
    $user_name=$_POST['user_name'];
    $location_id=$_POST['location_id'];
    $user_mobile=$_POST['user_mobile'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
     
    $is_owner=$_POST['is_owner'];
    
    $insert=  mysql_query("INSERT INTO `user`(`user_name`, `location_id`, `user_mobile`, `user_email`, `user_password`, `is_owner`) VALUES "
            . "('{$user_name}','{$location_id}','{$user_mobile}','{$user_email}','{$user_password}','{$is_owner}')") or die(mysql_error());
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
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Insert
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="user_name" required="" placeholder="Enter Name" class="form-control">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control" required="" name="location_id">
                                                <option>--Select--</option>
                                               <?php
                                                 $location=mysql_query("SELECT * FROM `location`");
                                                 while($location_data=  mysql_fetch_array($location))
                                                 {
                                                     echo "<option value='{$location_data[0]}' >{$location_data['location_name']}</option>";
                                                 }
                                                 ?>
                                                 
                                                 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" required="" name="user_mobile" placeholder="Enter Mobile">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" required="" type="email" name="user_email" placeholder="Enter Email">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" required="" type="password" name="user_password" placeholder="Enter Password">
                                        </div>
                                        
                                         
                                        
                                        <div class="form-group">
                                            <label>Is Parents</label>
                                            <select class="form-control" required="" name="is_owner">
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

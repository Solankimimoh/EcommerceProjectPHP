<?php
include '../class/myclass.php';
connection_open();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking</title>
 
        <?php
          include './theme-part/header-script.php';
  ?>
     
    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
  
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
             
            <!-- /.navbar-top-links -->

             
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
             
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
                 
                <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Guard Display
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Profile</th>
                                            <th>Is Admin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['did']))
                                        {
                                            $delete=$_GET['did'];
                                            $del=  mysql_query("delete from guard where guard_id='{$delete}'");
                                            if($del)
                                            {
                                                echo"<script>alert('Record Deleted');</script>";
                                            }
                                        }
                                        
                                        $display=mysql_query("SELECT * FROM `guard`") or die(mysql_error());
                                        while($display_data=  mysql_fetch_array($display))
                                        {
                                            echo "<tr class='success'>
                                                    <td>{$display_data['guard_id']}</td>
                                                    <td>{$display_data['guard_name']}</td>
                                                    <td>{$display_data['guard_address']}</td>
                                                    <td>{$display_data['guard_mobile']}</td>
                                                    <td>{$display_data['guard_email']}</td>
                                                    <td><img src='../upload/{$display_data['guard_pic']}' height='100px;'</td>
                                                    <td>{$display_data['is_admin']}</td>
                                                    <td><a href='?did={$display_data[0]}'>Remove</a> | <a href='guard-edit.php?eid=$display_data[0]'>Update</a></td>
                                                    
                                                     
                                        </tr>";
                                        }
                                        ?>
                                        
                                        
                                         
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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
    <!-- DataTables JavaScript -->
    <script src="bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

 

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>

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
                    <h1 class="page-header">Parking</h1>
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
                           Parking Display
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                
                                <h3>
                                <a href="../api/guard-insert.php" target="blank">Guard insert</a>
                                <a href="../api/guard-view.php" target="blank">Guard view</a>
                                <a href="../api/parking-insert.php" target="blank">parking insert</a>
                                <a href="../api/parking-view.php" target="blank">parking view</a>
                                <a href="../api/guard-insert.php" target="blank">parking slot insert</a>
                                <a href="../api/guard-insert.php" target="blank">parking slot view</a>
                                <a href="../api/guard-insert.php" target="blank">payment insert</a>
                                <a href="../api/guard-insert.php" target="blank">payment view</a>
                                <a href="../api/guard-insert.php" target="blank">reservation insert</a>
                                <a href="../api/guard-insert.php" target="blank">reservation view</a>
                                <a href="../api/guard-insert.php" target="blank">user insert</a>
                                <a href="../api/guard-insert.php" target="blank">user view</a>
                                <a href="../api/guard-insert.php" target="blank">Sign Up</a>
                                <a href="../api/guard-insert.php" target="blank">Login</a>
                                
                                
                                </h3>
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

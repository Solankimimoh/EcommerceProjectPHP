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
                        <h1 class="page-header">Reservation</h1>
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
                                Reservation Display
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">

                                        <tbody>

                                            <?php
                                            $display = mysql_query("SELECT * FROM `reservation`") or die(mysql_error());
                                            $i = 0;
                                            $flag = 0;
                                            while ($display_data = mysql_fetch_array($display)) {
                                                $i++;
                                                if ($i > 6) {
                                                    $i = 1;
                                                    echo "</tr><tr>";
                                                } else {
                                                    if ($flag == 0) {
                                                        echo "<tr>";
                                                        $flag = 1;
                                                    }
                                                }
                                                if ($display_data['reservation_status'] == 'Confirm') {
                                                    echo "<td><img src='image/redcar.png' height='100px;'><br><center>{$display_data['reservation_id']}</center></td>";
                                                } else {
                                                    echo "<td><img src='image/green.png' height='100px;'><br><center>{$display_data['reservation_id']}</center></td>";
                                                }
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
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>
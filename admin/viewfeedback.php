<?php
require 'db_connect.php';

//require 'cssl.php';
require 'header.php';
require 'sidebar.php';
//require 'content.php';
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" align="center" style="color: red; ,size: 30px;">
                          <h3 align="center">View Feedback</h3> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>UserName</th>
                                            <th>Email Id</th>
                                            <th>Mobile No</th>
                                             <th>Comment</th>
                                             <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $qry="SELECT * from feedback";
                                            $select=mysqli_query($con,$qry);

                                            if(mysqli_num_rows($select)> 0)
                                            {
                                                while($row=mysqli_fetch_assoc($select))
                                                {
                                                    $id=$row['id'];
                                                    $unm=$row['username'];
                                                    $email=$row['email'];
                                                    $mob=$row['mobileno'];
                                                    $msg=$row['message'];

                                    ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $unm; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $mob; ?></td>
                                            <td><?php echo $msg; ?></td>
                                            <td><a href="deletefeedback.php?d_id=<?php echo $row['id'];?>"><img height="15px" src="assets/img/images (1).jpg"></a></td>
                                        </tr>
                                        <?php 

                                    }
                                }
                                else
                                {
                                    echo "0 result";
                                }

                                        ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>


                    </div>
                </div>
</div>
 <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
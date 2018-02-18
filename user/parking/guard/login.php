<?php
session_start();
require '../class/myclass.php';
connection_open();
if ($_POST)
{
    $email=$_POST['email'];
    $password=$_POST['password'];  
    
    $loginq=mysql_query("SELECT * FROM `guard` WHERE `guard_email`='{$email}' and `guard_password`='{$password}' and `is_admin`='No'")or die(mysql_error());
    $data= mysql_fetch_array($loginq);
    if ($data)
    {
        $_SESSION['admin_id']=$data[0];
        $_SESSION['admin_name']=$data[1];
        header("location:parkingdispaly.php");
    }
        else {
        echo "<script>alert('Please Enter Valid Email & Password');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

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

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                           <a href="forgotpassword.php" >Forgotpassword</a>
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                                   
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    include './theme-part/footer-script.php';
    ?>

    </body>

</html>

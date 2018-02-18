<?php
session_start();
require '../class/myclass.php';
connection_open();
if ($_POST)
{
    $id=$_POST['email'];
    $loginq=mysql_query("select * from `guard` WHERE `guard_email`='{$id}' and `is_admin`='No' ")or die(mysql_error());
    $data=  mysql_fetch_row($loginq);
    if ($data>0)
    {

       require '../class/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Admin email';                 // SMTP username
$mail->Password = 'AdminPassword';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('Admin email', 'Parking');
$mail->addAddress($id, $id);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Forget Password';
$mail->Body    = "Your Password is '$data[5]'";
$mail->AltBody = $data[5];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
   
}
        
        
        }
        else {
        echo "<script>alert('Email ID is wrong');</script>";
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
                            <h3 class="panel-title">Forgot Password</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    
                                    <input type="submit" value="Send Mail" class="btn btn-lg btn-success btn-block">
                                    <a href="login.php" class="btn btn-lg btn-success btn-block">Back To Login</a>
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

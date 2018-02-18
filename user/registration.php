<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition register-page">

        <script>
          function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("confirm_password").value;
            if (a!=b) {
              alert("Passwords do no match");
              return false;
            }
          }
        </script>
        <div class="register-box">
          <div class="register-logo">
            <a href="index.php"><b>User</b> | Registration</a>
          </div>

          <div class="register-box-body">
            <p class="login-box-msg">Register a new Account</p>
            <form onSubmit="return validate();" action="reg_data.php" method="post">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="r_fullname" required="" placeholder="Full Name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>

              <div class="form-group has-feedback">
                <input type="email" class="form-control" name="r_email" required="" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="r_number" required="" placeholder="Number">
                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
              </div>

              <div class="form-group has-feedback">
              
              <input type="text" class="form-control" name="r_address1" required="" placeholder="Address line 1">
              <span class="glyphicon glyphicon-home form-control-feedback"></span>

               
             </div>
             <div class="form-group has-feedback">
              <input type="text" class="form-control" name="r_address2" required="" placeholder="Address line 2">
              <span class="glyphicon glyphicon-home form-control-feedback"></span>
             </div>


             <div class="form-group has-feedback">
              <input type="text" class="form-control" name="r_city" required="" placeholder="City">
              <span class="glyphicon glyphicon-home form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="r_state" required="" placeholder="State">
              <span class="glyphicon glyphicon-home form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="r_country" required="" placeholder="Country">
              <span class="glyphicon glyphicon-home form-control-feedback"></span>
            </div>


            <div class="form-group has-feedback">
              <input type="password" id="password" class="form-control" name="r_pwd" required="" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" id="confirm_password"  name="r_repwd" class="form-control" required="" placeholder="Retype password">
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">

              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" style="margin-bottom: 20px;">Register</button>
              </div><!-- /.col -->
            </div>
          </form>



          <a href="login.php" class="text-center">I already have a Account</a>
        </div><!-- /.form-box -->
      </div><!-- /.register-box -->

      <!-- jQuery 2.1.4 -->
      <script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <!-- Bootstrap 3.3.5 -->
      <script src="../admin/bootstrap/js/bootstrap.min.js"></script>
      <!-- iCheck -->
      <script src="../admin/plugins/iCheck/icheck.min.js"></script>
      <script type="text/javascript"></script>



      <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        });
      </script>
    </body>
    </html>

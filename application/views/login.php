<!DOCTYPE html>
<html>

<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: dashboard");
}
?>

    <head>
        <meta charset="UTF-8">
        <title>Citra Florist | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <style type="text/css">
            
            .error_msg{
                color:red;
                font-size: 16px;
            }

            .message{
                position: absolute;
                font-weight: bold;
                font-size: 28px;
                color: #6495ED;
                left: 262px;
                width: 500px;
                text-align: center;
            }

        </style>

    </head>
    <body class="login-page">

        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url('auth/login'); ?>"><b>Admin</b>Login</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">

                <?php echo form_open('auth/login'); ?>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <?php
                        echo "<div class='error_msg'>";
                            if (isset($error_message)) {
                                echo $error_message;
                            }
                            echo validation_errors();
                        echo "</div>";
                    ?>
                    <div class="row">
                        <div class="col-xs-8">                       
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>

                <?php echo form_close(); ?>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

    </body>
</html>

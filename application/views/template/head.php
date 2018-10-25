<!DOCTYPE html>
<html>

<?php

if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['admin_name']);
} else {
    header("location: auth/login");
}

?>

    <head>
        <meta charset="UTF-8">
        <title>Citra Florist</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">

        <style>
            .skin-blue .main-header .navbar{
                background-color:  #dd137b;
            }

            .skin-blue .main-header .logo {
                background-color:  #ad0e60;
            }

            .skin-blue .main-header .logo:hover{
                background-color:  #dd137b;
            }
            .skin-blue .main-header .navbar .sidebar-toggle:hover{
                background-color: #ad0e60;
            }

            .skin-blue .main-header li.user-header{
                background-color:  #dd137b;
            }

            .box{
                border-top: 3px solid #337ab7;
            }
        </style>

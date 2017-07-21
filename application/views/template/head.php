<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titulo; ?></title>
        <link rel="shortcut icon" href="http://msi.gob.pe/portal/wp-content/uploads/2015/11/índice.ico"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url(); ?>archivos/bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>archivos/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>archivos/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>archivos/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>archivos/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>archivos/jquery/jquery.min1.12.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>archivos/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>archivos/bootstrap/js/bootstrap.js" type="text/javascript"></script>

        <?php
        if (isset($dataTable)) {
            echo $dataTable;
        }
        if (isset($dataPicker)) {
            echo $dataPicker;
        }
        ?>

    </head>
    <body>

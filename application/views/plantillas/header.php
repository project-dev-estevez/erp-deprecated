<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $titulo ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->    
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome CSS-->
    <?php echo link_tag('vendor/font-awesome/css/font-awesome.min.css') ?>
    <!-- Fontastic Custom icon font-->
    <?php echo link_tag('css/fontastic.css') ?>
    <!-- Google fonts - Poppins -->
    <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    #draw-canvas {
        cursor: crosshair;
    }

    #draw-canvas2 {
        cursor: crosshair;
    }

    #draw-canvas3 {
        cursor: crosshair;
    }

    #draw-canvas4 {
        cursor: crosshair;
    }

    #draw-canvas5 {
        cursor: crosshair;
    }

    #draw-canvas6 {
        cursor: crosshair;
    }

    #draw-canvas7 {
        cursor: crosshair;
    }

    .list-group {
        max-height: 100px;
        margin-bottom: 10px;
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/datatables.min.css" />


    <!-- theme stylesheet-->
    <?php echo link_tag('css/style.css') ?>
    <!-- Custom stylesheet - for your changes-->
    <?php if($titulo != 'Listado Asignaciones') { ?>
    <?php echo link_tag('css/custom.css?v=1.0.1') ?>
    <?php } ?>
    <?php echo link_tag('css/messenger-theme-air.css') ?>
    <?php echo link_tag('css/gridforms.css') ?>
    <?php echo link_tag('css/bootstrap-tagsinput.css') ?>
    <?php echo link_tag('css/ladda-themeless.min.css') ?>
    <?php echo link_tag('vendor/fullcalendar/fullcalendar.min.css') ?>


    <!-- Favicon-->
    <?php echo link_tag('img/favicon.ico', 'shortcut icon', 'image/ico'); ?>
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script type="text/javascript">
    var base_url = '<?= base_url() ?>';
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Javascript files-->
    <script src="<?= base_url(); ?>js/moment.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url() ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>js/charts-home.js"></script> -->
    <script src="<?php echo base_url() ?>js/messenger.min.js"></script>
    <script src="<?php echo base_url() ?>js/gridforms.js"></script>
    <script src="<?php echo base_url() ?>js/ladda/components-ladda.js"></script>
    <script src="<?php echo base_url() ?>js/ladda/spin.js"></script>
    <script src="<?php echo base_url() ?>js/ladda/ladda.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js">
    </script>
    <!-- Main File-->
    <script src="<?php echo base_url() ?>js/front.js"></script>
    <script src="<?php echo base_url() ?>js/functions.js?v=2.0.1"></script>
    <script src="<?= base_url(); ?>js/es.js"></script>
    <script src="<?= base_url(); ?>js/printThis.js"></script>
    <script src="<?= base_url(); ?>js/pace.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.3/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.3/dist/sweetalert2.min.css" />

    <script src="<?= base_url(); ?>vendor/fullcalendar/fullcalendar.min.js"> </script>
    <script src="<?= base_url(); ?>vendor/fullcalendar/gcal.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js"></script>

    <script>
    Messenger.options = {
        extraClasses: 'messenger-fixed messenger-on-bottom messenger-on-right',
        theme: 'flat'
    }
    var table, table_without;
    </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="page <?php echo $clase_pagina ?>">
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Klinik Bunda Anak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.min.css" media="screen,projection" />

    <link href="https://fonts.googleapis.com/css?family=Arvo|Righteous|Roboto" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
        .left{
            float: left;
            width: 20%;
        }
        .right{
            float: right;
            width: 75%;
            position: absolute;
            right: 60px;
        }
    </style>
</head>

<body>
    <div class="head">
        <?php $this->load->view('head'); ?>
    </div>
    
    <div class="left">
        <?php $this->load->view('menu'); ?>
    </div>

    <div class="right">
        <?php $this->load->view($page); ?>
    </div>
    
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?php echo base_url() ?>vendor/materialize/js/materialize.min.js"></script>
</body>

</html>
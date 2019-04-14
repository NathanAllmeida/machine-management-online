<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Machine</title>
    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">


    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/twbs/bootstrap/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/twbs/bootstrap/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/components/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/components/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/themify-icons/themify-icons.css">    
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/datatables/datatables/media/css/dataTables.bootstrap4.css">    
    
    

    <!-- Personal Style -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/style.css">
    <!-- End Personal Style -->

    <script src="<?php echo base_url();?>/assets/vendor/components/jquery/jquery.js" ></script>    
    <script src="<?php echo base_url();?>/assets/vendor/twbs/bootstrap/dist/js/bootstrap.min.js" async></script>
    <script src="<?php echo base_url();?>/assets/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" async></script>    
    <script src="<?php echo base_url(); ?>/assets/vendor/datatables/datatables/media/js/jquery.dataTables.js"></script>    
    <script src="<?php echo base_url(); ?>/assets/vendor/datatables/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/notify/notify.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/sweetalert/package/dist/sweetalert2.all.min.js"></script>
   
    <script src="<?php echo base_url();?>/assets/js/script.js" async></script>

   
    
</head>
<body   data-spy='scroll' data-target='#menu' data-offset='50'>
    <nav id="menu">
        <button class="toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class='fa fa-bars'></i>
        </button>
        <?php 
            echo $menu;
        ?>
    </nav>
    <div id='main-panel'>        
        <div class='height-100vh'>
            
                <?php
                    echo $content;
                ?>
            
        </div>
    </div>    
</body>
</html>

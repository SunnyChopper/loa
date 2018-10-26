<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">

        <!-- Author Meta -->
        <meta name="author" content="Law of Ambition">

        <!-- Meta Description -->
        <?php if(isset($page_description)): ?>
            <meta name="description" content="<?php echo e($page_description); ?>">
        <?php else: ?>
            <meta name="description" content="">
        <?php endif; ?>

        <!-- meta character set -->
        <meta charset="UTF-8">

        <?php if(isset($page_title)): ?>
            <title><?php echo e($page_title); ?> - Law of Ambition</title>
        <?php else: ?>
            <title>Law of Ambition</title>
        <?php endif; ?>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NMZMHDX');</script>
        <!-- End Google Tag Manager -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128180547-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-128180547-1');
        </script>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Oxygen:100,400,600" rel="stylesheet" type="text/css">
        <link href="<?php echo e(URL::asset('font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/linearicons.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/magnific-popup.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/nice-select.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/animate.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/owl.carousel.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/jquery-ui.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/main.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('css/app.css')); ?>">
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMZMHDX"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>

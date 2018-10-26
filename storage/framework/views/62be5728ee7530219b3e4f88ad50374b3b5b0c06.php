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
        <?php echo $__env->make('layouts.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <?php echo $__env->yieldContent('meta_tags'); ?>

    
    <title>
    Fatura
    </title>
    <link rel="icon" href="<?php echo e(asset('public/vendor/adminlte/dist/img/icon.png')); ?>">

    
    <?php echo $__env->yieldContent('adminlte_css_pre'); ?>

    
    <?php if(!config('adminlte.enabled_laravel_mix')): ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/vendor/fontawesome-free/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">

        
        <?php echo $__env->make('adminlte::plugins', ['type' => 'css'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <link rel="stylesheet" href="<?php echo e(asset('public/vendor/adminlte/dist/css/adminlte.min.css')); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(mix(config('adminlte.laravel_mix_css_path', 'public/css/app.css'))); ?>">
    <?php endif; ?>

    
    <?php echo $__env->yieldContent('adminlte_css'); ?>

    
    <?php if(config('adminlte.use_ico_only')): ?>
        <link rel="shortcut icon" href="<?php echo e(asset('public/favicons/favicon.ico')); ?>" />
    <?php elseif(config('adminlte.use_full_favicon')): ?>
        <link rel="shortcut icon" href="<?php echo e(asset('public/favicons/favicon.ico')); ?>" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('favicons/apple-icon-57x57.png')); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('favicons/apple-icon-60x60.png')); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicons/apple-icon-72x72.png')); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('favicons/apple-icon-76x76.png')); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('favicons/apple-icon-114x114.png')); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicons/apple-icon-120x120.png')); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('favicons/apple-icon-144x144.png')); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('favicons/apple-icon-152x152.png')); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('favicons/apple-icon-180x180.png')); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicons/favicon-16x16.png')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicons/favicon-32x32.png')); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('favicons/favicon-96x96.png')); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('favicons/android-icon-192x192.png')); ?>">
        <link rel="manifest" href="<?php echo e(asset('public/favicons/manifest.json')); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo e(asset('public/favicon/ms-icon-144x144.png')); ?>">
    <?php endif; ?>
        <link rel="stylesheet" href="<?php echo e(url('/public/sweetalert2/dist/sweetalert2.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
       <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Expletus+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/css/style.css')); ?>">

<style>


.sub_category_id{
  min-width:250px;
    max-width:250px;
    height: 40px!important;
}
.product_id{
    min-width:250px;
    max-width:250px;
    height: 40px!important;
}
.select2-container .select2-selection--single {
    height: 41px;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 30px;
}
.select2-container--default .select2-selection--single .select2-selection__clear {
    display: none;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 8px;
}
.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color:  #043D50!important;
    color: white;
}

[class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-light-] .nav-treeview>.nav-item>.nav-link.active:hover {
    background-color: #FACD10;
    color: #043D50;
}
.bg-cyan{
    background-color:  #043D50!important;
}
.bg-cyan-2{
    background-color:  #FACD10!important;
    color: white !important;
}
</style>
</head>

<body class="<?php echo $__env->yieldContent('classes_body'); ?>" <?php echo $__env->yieldContent('body_data'); ?>>

    
    <?php echo $__env->yieldContent('body'); ?>

    
    <?php if(!config('adminlte.enabled_laravel_mix')): ?>
        <script src="<?php echo e(asset('public/vendor/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>

        
        <?php echo $__env->make('adminlte::plugins', ['type' => 'js'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <script src="<?php echo e(asset('public/vendor/adminlte/dist/js/adminlte.min.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(mix(config('adminlte.laravel_mix_js_path', 'public/js/app.js'))); ?>"></script>
    <?php endif; ?>

    
    <?php echo $__env->yieldContent('adminlte_js'); ?>
    <script src="<?php echo e(url('/public/sweetalert2/dist/sweetalert2.all.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH E:\xampp\htdocs\fatora-task\resources\views/vendor/adminlte/master.blade.php ENDPATH**/ ?>
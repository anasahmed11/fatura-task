<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>sandwitsh</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">

    <meta name="template-hash" content="baadb45704803c2d1a1ac3e569b757d5">

    <link rel="stylesheet" href="public/css/template2.css">

</head>

<body>
<div id="container" >
    <section id="memo">
        <?php
            $information=\App\Models\Information::all()->first();
        ?>
        <div class="logo">
            <img src="<?php echo e(url("/$information->logo")); ?>" width="200px">
        </div>

        <div class="company-info">
            <br>
            <span>Address : <?php echo e($information->location); ?></span>
            <br>
            <span>Phone : <?php echo e($information->phone); ?></span>
            <br>
            <span>Email : <?php echo e($information->email); ?></span>
        </div>

    </section>
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/layouts/pdf.blade.php ENDPATH**/ ?>
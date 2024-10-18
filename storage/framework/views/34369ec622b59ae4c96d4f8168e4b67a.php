<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('superadmin/css/styles.css')); ?>" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">

    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </main>
                <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('superadmin/js/scripts.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('superadmin/js/datatables-simple-demo.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\proyek1\resources\views/layouts/superadmin.blade.php ENDPATH**/ ?>
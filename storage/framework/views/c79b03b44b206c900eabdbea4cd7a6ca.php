<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'szukamdja.pl'); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f7fb; color: #222; }
        header { background: #111827; color: #fff; padding: 12px 20px; }
        nav a { color: #fff; margin-right: 12px; text-decoration: none; }
        .container { max-width: 1000px; margin: 24px auto; background: #fff; border-radius: 10px; padding: 20px; }
        .grid { display: grid; gap: 12px; }
        input, select, button { padding: 10px; width: 100%; box-sizing: border-box; }
        button { background: #2563eb; color: #fff; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        .alert { padding: 10px; border-radius: 8px; margin-bottom: 10px; }
        .ok { background: #dcfce7; }
        .err { background: #fee2e2; }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="<?php echo e(route('inquiry.create')); ?>">Formularz klienta</a>
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('login')); ?>">Logowanie</a>
            <a href="<?php echo e(route('register')); ?>">Rejestracja DJ</a>
        <?php else: ?>
            <?php if(auth()->user()->role === 'dj'): ?>
                <a href="<?php echo e(route('dj.dashboard')); ?>">Panel DJ</a>
            <?php else: ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>">Panel Admin</a>
            <?php endif; ?>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline">
                <?php echo csrf_field(); ?>
                <button type="submit" style="width:auto">Wyloguj</button>
            </form>
        <?php endif; ?>
    </nav>
</header>
<div class="container">
    <?php if(session('success')): ?>
        <div class="alert ok"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert err">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>
<?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>
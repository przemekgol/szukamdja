

<?php $__env->startSection('title', 'Logowanie'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Logowanie</h1>
    <form method="POST" action="<?php echo e(route('login.attempt')); ?>" class="grid">
        <?php echo csrf_field(); ?>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <button type="submit">Zaloguj</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/auth/login.blade.php ENDPATH**/ ?>
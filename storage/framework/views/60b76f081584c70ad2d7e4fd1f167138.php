

<?php $__env->startSection('title', 'Rejestracja DJ'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Rejestracja DJ</h1>
    <form method="POST" action="<?php echo e(route('register.store')); ?>" class="grid">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Nazwa DJ / Imię" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="password" name="password_confirmation" placeholder="Powtórz hasło" required>
        <input type="text" name="postal_code" placeholder="Kod pocztowy DJ, np. 00-000" required>
        <input type="number" name="radius_km" min="1" max="300" placeholder="Promień przyjmowania zleceń (km)" required>
        <button type="submit">Załóż konto DJ</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>
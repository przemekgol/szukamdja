

<?php $__env->startSection('title', 'Zapytanie o DJ'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Znajdź DJ-a na swoją imprezę</h1>
    <p>Nie musisz mieć konta – wyślij zapytanie i czekaj na kontakt od DJ-ów.</p>

    <form method="POST" action="<?php echo e(route('inquiry.store')); ?>" class="grid">
        <?php echo csrf_field(); ?>
        <label>E-mail klienta
            <input type="email" name="client_email" value="<?php echo e(old('client_email')); ?>" required>
        </label>
        <label>Typ imprezy
            <select name="event_type" required>
                <option value="">-- wybierz --</option>
                <option value="urodziny">Urodziny</option>
                <option value="wesele">Wesele</option>
                <option value="event">Event</option>
                <option value="inne">Inne</option>
            </select>
        </label>
        <label>Inny typ imprezy (opcjonalnie)
            <input type="text" name="event_type_other" value="<?php echo e(old('event_type_other')); ?>">
        </label>
        <label>Data imprezy
            <input type="date" name="event_date" value="<?php echo e(old('event_date')); ?>" required>
        </label>
        <label>Kod pocztowy imprezy
            <input type="text" name="postal_code" placeholder="00-000" value="<?php echo e(old('postal_code')); ?>" required>
        </label>
        <button type="submit">Wyślij zapytanie</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/public/inquiry-form.blade.php ENDPATH**/ ?>
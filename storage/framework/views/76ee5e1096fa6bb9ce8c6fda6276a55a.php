

<?php $__env->startSection('title', 'Panel DJ'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Panel DJ</h1>
    <p>Ustaw promień zleceń, aby otrzymywać zapytania.</p>

    <form method="POST" action="<?php echo e(route('dj.radius.update')); ?>" class="grid" style="margin-bottom: 20px;">
        <?php echo csrf_field(); ?>
        <label>Kod pocztowy DJ
            <input type="text" name="postal_code" value="<?php echo e(old('postal_code', $user->postal_code)); ?>" required>
        </label>
        <label>Promień (km)
            <input type="number" name="radius_km" min="1" max="300" value="<?php echo e(old('radius_km', $user->radius_km)); ?>" required>
        </label>
        <button type="submit">Zapisz ustawienia</button>
    </form>

    <h2>Moje zapytania</h2>
    <table>
        <thead>
        <tr>
            <th>E-mail klienta</th>
            <th>Typ imprezy</th>
            <th>Data</th>
            <th>Kod pocztowy</th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($inquiry->client_email); ?></td>
                <td><?php echo e($inquiry->event_type); ?> <?php echo e($inquiry->event_type_other); ?></td>
                <td><?php echo e($inquiry->event_date->format('Y-m-d')); ?></td>
                <td><?php echo e($inquiry->postal_code); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="4">Brak zapytań.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($inquiries->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/resources/views/dj/dashboard.blade.php ENDPATH**/ ?>
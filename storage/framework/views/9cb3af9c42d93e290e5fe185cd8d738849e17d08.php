

<?php $__env->startSection('content'); ?>
<title>ReXsteam - All Transaction</title>
    <div class="container">
        <div class="row">
        <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <p class="card-text">Transaction at: <?php echo e($t->created_at); ?></p>
              <p class="card-text">User ID: <?php echo e($t->user_id); ?></p>
              <p class="card-text">Username: <?php echo e($t->user->name); ?></p>
              <a href="<?php echo e(route('trans.details', ['trans_id'=>$t->id])); ?>" class="card-link">View Details</a>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\!personal\Repo\Laravel---ReXsteam\resources\views/alltrans.blade.php ENDPATH**/ ?>
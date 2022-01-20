

<?php $__env->startSection('content'); ?>
<title>ReXsteam - Game Details</title>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger text-center">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <?php if(Session::has('successMsg')): ?>
    <div class="alert alert-success text-center"> <?php echo e(Session::get('successMsg')); ?></div>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <img class="img-fluid" src="<?php echo e(asset($game->photo)); ?>" alt="">
            </div>
            <div class="col-md-5">
                <h1><?php echo e($game->name); ?></h1>
                <p><?php echo e($game->description); ?></p>
                <h4>Rp <?php echo e($game->price); ?></h4>
                <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->role==1): ?>
                <form class="form-inline" action="<?php echo e(route('add', ['id'=>$game->id])); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                    <div class="form-group mb-2">
                      <h5>Input</h5>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <label for="quantity" class="sr-only">Quantity</label>
                      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>
                  </form>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\!personal\Repo\Laravel---ReXsteam\resources\views/details.blade.php ENDPATH**/ ?>
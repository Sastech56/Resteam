

<?php $__env->startSection('content'); ?>
    <title>ReXsteam - Add Game</title>
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
            <div class="col-md-4">
            <form action="<?php echo e(route('insert')); ?>" method="POST" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label for="InputName">Game Name</label>
                  <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="InputPrice">Game Price</label>
                    <input type="number" class="form-control" id="price" name="price"  placeholder="Enter Price">
                </div>
                <div class="form-group">
                    <label for="InputDesc">Game Description</label>
                    <input type="text" class="form-control" id="description" name="description"  placeholder="Enter Description">
                </div>  
        
                <div class="form-group">
                      <label for="InputPhoto">Game Photo</label>
                      <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sayyid\Downloads\Semester 5\web Prog\Project lab\Web Prog\Laravel---ReXsteam\resources\views/add.blade.php ENDPATH**/ ?>
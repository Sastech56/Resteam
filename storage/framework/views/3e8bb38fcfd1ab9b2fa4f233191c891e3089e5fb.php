<?php $__env->startSection('content'); ?>
<title>ReXsteam - Home</title>
    <div class="container">
        <div class="row">
            <div class="col align-items-center">
                <p class="fresh">ReXsteam</p>
                <p class="fresh">Buy Cheap Digital Games</p>
            </div>
        </div>
        <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role==2): ?>
        <div class="d-flex justify-content-center mb-2">
        <a href="/game/add" class="btn btn-secondary" >Add Game</a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
           <!-- Search form -->
           <div class="col-md-12 d-flex justify-content-center">
           <form method="POST" action="<?php echo e(route('search')); ?>">
            <?php echo csrf_field(); ?>
              
                  <input type="text" class="form-control mb-1" name="search" id="search"
                      placeholder="Search Game">
              
             
                <button type="submit" class="btn btn-dark">Search</button>
             
            </form>
          </div>
            
        </div>
        <div class="row ">

            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 d-flex justify-content-center">
            <div class="card mb-2 mt-2" style="width: 18rem;">
                <a href="/game/<?php echo e($p->id); ?>"><img class="card-img-top" src="<?php echo e(asset($p->photo)); ?>" alt="Card image cap"></a>
                <div class="card-body">
                  <h5 class="card-title"><?php echo e($p->name); ?></h5>
                  <p class="card-text">Rp <?php echo e($p->price); ?></p>
                  <?php if(auth()->guard()->guest()): ?>
                  <a href="/game/<?php echo e($p->id); ?>" class="btn btn-block btn-secondary">View Me!</a>
                  <?php endif; ?>
                  <?php if(auth()->guard()->check()): ?>
                  <?php if(Auth::user()->role==1): ?>
                  <a href="/game/<?php echo e($p->id); ?>" class="btn btn-block btn-secondary">View Me!</a>
                  <?php elseif(Auth::user()->role==2): ?>
                  <a href="/game/edit/<?php echo e($p->id); ?>" class="btn btn-block btn-secondary">Edit Game</a>
                  <a href="/game/delete/<?php echo e($p->id); ?>" class="btn btn-block btn-dark">Delete Game</a>
                  <?php endif; ?>
                  <?php endif; ?>
                  
                </div>
              </div>
            
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 d-flex justify-content-center">
                <?php echo e($game->links()); ?>

                </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\!personal\Repo\Laravel---ReXsteam\resources\views/welcome.blade.php ENDPATH**/ ?>
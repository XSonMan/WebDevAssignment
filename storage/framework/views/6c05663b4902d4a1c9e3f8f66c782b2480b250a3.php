<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                        <div>
                            <a style="font-size:40px;color: black;font-family: 'Bold Italic Art';"><?php echo e(Auth::user()->name); ?> HOMEPAGE</a>
                        </div>
                        <div>
                            <a href="/list">Event List </a>
                        </div>
                        <div>
                            <a href="donate">Donate to an event </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/home.blade.php ENDPATH**/ ?>
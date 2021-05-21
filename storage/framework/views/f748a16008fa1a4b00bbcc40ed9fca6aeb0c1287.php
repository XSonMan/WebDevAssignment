<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('')); ?>

                        <div>
                            <a style="color:black"><i> </i> Admin Homepage<i> </i> </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div>
                            <a style="font-size:30px;color: black;font-family: 'Bold Italic Art';">Hello <?php echo e(Auth::user()->name); ?></a>
                        </div>
                        <div style="text-align: center;">
                            <img  src="/logo.png" alt="Logo">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div style="text-align: center;">
            <p>

            <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/adminHome.blade.php ENDPATH**/ ?>
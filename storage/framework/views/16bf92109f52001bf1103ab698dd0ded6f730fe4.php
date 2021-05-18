<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if(session('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                            <a style="margin: 19px;" href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary">Home</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if($user->status == 0): ?>
                                            <th><?php echo e($user->name); ?></th>
                                            <th><?php echo e($user->email); ?></th>
                                            <th>Inactive</th>
                                            <th><a href="<?php echo e(route('status', ['id'=>$user->id])); ?>">Activate</a></th>
                                        <!--<th><a href="<?php echo e(route('status', ['id'=>$user->id])); ?>">
                                                <?php if($user->status == 0): ?>
                                            Activate
<?php else: ?>
                                            Deactivate
<?php endif; ?>
                                            </a></th>-->
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/RegRequest.blade.php ENDPATH**/ ?>
<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">

                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('success')); ?>

                    </div>
                <?php endif; ?>
            </div>

            <h1 class="display-3">Event List</h1>
            <div>
                <a style="margin: 19px;" href="<?php echo e(route('home')); ?>" class="btn btn-primary">Home</a>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td ></td>
                    <td>Event Name</td>
                    <td>Event Location</td>
                    <td>Event Description</td>
                    <td>Image</td>
                    <td>Event Date</td>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a class="btn btn-primary">View Event</a>
                        </td>
                        <td><?php echo e($event->event_name); ?></td>
                        <td><?php echo e($event->event_location); ?></td>
                        <td><?php echo e($event->event_description); ?></td>
                        <td><?php echo e($event->event_image); ?></td>
                        <td><?php echo e($event->event_date); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/lists/list.blade.php ENDPATH**/ ?>
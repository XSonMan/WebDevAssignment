<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">

                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('success')); ?>

                    </div>
                <?php endif; ?>
            </div>

            <h1 class="display-3">Events</h1>
            <div>
                <a style="margin: 19px;" href="<?php echo e(route('events.create')); ?>" class="btn btn-primary">Create Event</a>
                <a style="margin: 19px;" href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary">Home</a>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Event Name</td>
                    <td>Event Location</td>
                    <td>Event Description</td>
                    <td>Image</td>
                    <td colspan = 2>Event Date</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($event->event_name); ?></td>
                        <td><?php echo e($event->event_location); ?></td>
                        <td><?php echo e($event->event_description); ?></td>
                        <td><?php echo e($event->event_image); ?></td>
                        <td><?php echo e($event->event_date); ?></td>
                        <td>
                            <a href="<?php echo e(route('events.edit',$event->id)); ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('list.show', $event->id)); ?>" class="btn btn-primary">View Event</a>
                        </td>
                        <td>
                            <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete Event?')" type="submit">Cancel Event</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/events/index.blade.php ENDPATH**/ ?>
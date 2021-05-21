<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update an Event</h1>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <br />
            <?php endif; ?>
            <a style="margin: 19px;" href="<?php echo e(route('events.index')); ?>" class="btn btn-primary">Home</a>
            <form method="post" enctype="multipart/form-data" action="<?php echo e(route('events.update', $event->id)); ?>">
                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">

                    <label for="event_name">Event Name:</label>
                    <input type="text" class="form-control" name="event_name" value=<?php echo e($event->event_name); ?> />
                </div>

                <div class="form-group">
                    <label for="event_location">Event Location:</label>
                    <input type="text" class="form-control" name="event_location" value=<?php echo e($event->event_location); ?> />
                </div>

                <div class="form-group">
                    <label for="event_description">Event Description:</label>
                    <input type="text" class="form-control" name="event_description" value=<?php echo e($event->event_description); ?> />
                </div>

                <div class="form-group">
                    <label for="event_image">Current Event Image:</label>
                </div>

                <div class="form-group">
                    <img height="200" width="200" src="<?php echo e(asset("/storage/$event->event_image")); ?>"/>
                    <input type="file" class="form-control-file" name="event_image" id="event_image" aria-describedby="fileHelp" value=<?php echo e($event->event_image); ?> />
                </div>

                <div class="form-group">
                    <label for="event_date">Event Date:</label>
                    <input type="date" class="form-control"  name="event_date" value=<?php echo e($event->event_date); ?> />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/events/edit.blade.php ENDPATH**/ ?>
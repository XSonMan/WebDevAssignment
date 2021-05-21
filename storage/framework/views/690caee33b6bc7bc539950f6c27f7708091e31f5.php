<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-8 offset-sm-2" style="text-align:center;">
            <h1 class="display-3">Create an Event</h1>
            <div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div><br />
                <?php endif; ?>
                <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred;" href="<?php echo e(route('events.index')); ?>" class="btn btn-primary">Home</a>
                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(route('events.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="event_name" class="et1">Event Name:</label>
                        <input type="text" class="form-control" name="event_name"/>
                    </div>

                    <div class="form-group">
                        <label for="event_location" class="et1">Event Location:</label>
                        <input type="text" class="form-control" name="event_location"/>
                    </div>

                    <div class="form-group">
                        <label for="event_description" class="et1">Event Description:</label>
                        <input type="text" class="form-control" name="event_description"/>
                    </div>

                    <div class="form-group">
                        <label for="event_image" class="et1">Event Image:</label>
                        <!--<input type="text" class="form-control" name="event_image"/>-->
                        <input style="margin:0 auto;" type="file" class="form-control-file" <?php echo e((!empty($events->event_image)) ? "disabled" : ''); ?> name="event_image" id="event_image" aria-describedby="fileHelp">
                    </div>

                    <div class="form-group">
                        <label for="event_date" class="et1">Event Date:</label>
                        <input type="date" class="form-control"  name="event_date"/>
                    </div>
                    <button type="submit" class="crt-but">Add Event</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/events/create.blade.php ENDPATH**/ ?>
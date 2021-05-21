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

            <h3 style="font-family:'Britannic Bold';text-align: center;" class="display-3">Event List</h3>
            <div>
                <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred" href="<?php echo e(route('home')); ?>" class="btn btn-primary">Home</a>
            </div>

            <p>

            </p>
            <p>

            </p>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td ></td>
                    <td style="font-family: 'Arial Black'">Event Name</td>
                    <td style="font-family: 'Arial Black'">Event Location</td>
                    <td style="font-family: 'Arial Black'">Event Description</td>
                    <td style="font-family: 'Arial Black'">Image</td>
                    <td style="font-family: 'Arial Black'">Event Date</td>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                        <!--<a href="<?php echo e(route('list.show', $event->id)); ?>" class="btn btn-primary">View Event</a>-->
                            <form method="post" action="<?php echo e(route('list.store', $event->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" class="form-control" name="user_id" value=<?php echo e(Auth::user()->id); ?> />
                                <input type="hidden" class="form-control" name="name" value=<?php echo e(Auth::user()->name); ?> />
                                <input type="hidden" class="form-control" name="email" value=<?php echo e(Auth::user()->email); ?> />
                                <input type="hidden" class="form-control" name="event_id" value=<?php echo e($event->id); ?> />
                                <button style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred" class="btn btn-primary" >Participate</button>
                            </form>
                        </td>
                        <td><?php echo e($event->event_name); ?></td>
                        <td><?php echo e($event->event_location); ?></td>
                        <td><?php echo e($event->event_description); ?></td>
                        <td><img height="200" width="200" src="<?php echo e(asset("/storage/$event->event_image")); ?>"/></td>
                        <td><?php echo e($event->event_date); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div>
            </div>
            <div style="text-align: center;">
                <p>

                <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
                </p>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/lists/list.blade.php ENDPATH**/ ?>
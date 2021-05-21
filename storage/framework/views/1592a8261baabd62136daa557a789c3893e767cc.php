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

            <h3 style="font-family:'Britannic Bold';text-align: center;" class="display-3">Events</h3>
            <div class="crt-butdiv" >
                <a class="crt-but" href="<?php echo e(route('events.create')); ?>" class="btn btn-primary">Create Event</a>
            </div>
            <p>

            </p>
            <p>

            </p>
            <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <td style="font-family: 'Arial Black'">Event Name</td>
                    <td style="font-family: 'Arial Black'">Event Location</td>
                    <td style="font-family: 'Arial Black'">Event Description</td>
                    <td style="font-family: 'Arial Black'">Image</td>
                    <td style="font-family: 'Arial Black'" colspan = 2>Event Date</td>
                    <td style="font-family: 'Arial Black'" colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($event->event_name); ?></td>
                        <td><?php echo e($event->event_location); ?></td>
                        <td><?php echo e($event->event_description); ?></td>
                    <!--<td><?php echo e($event->event_image); ?></td>-->
                        <td><img height="200" width="200" src="<?php echo e(asset("/storage/$event->event_image")); ?>"/></td>
                    <!--<td><img height="200" width="200" src=" <?php echo e(asset('/storage/'.$event->event_image)); ?>"/></td>-->
                        <td><?php echo e($event->event_date); ?></td>
                        <td>
                            <a href="<?php echo e(route('events.edit',$event->id)); ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a style="margin: 4px 2px;padding: 10px 20px;background-color: #1b1e21;border:darkred" href="<?php echo e(route('list.show', $event->id)); ?>" class="btn btn-primary">View Participants</a>
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
            <div>
                <div style="text-align: center;">
                    <p>

                    <h6>© 2021 Canadian Olympic Committee. All Rights Reserved.</h6>
                    </p>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XSonM\gitapps\laravel\GProject\resources\views/events/index.blade.php ENDPATH**/ ?>
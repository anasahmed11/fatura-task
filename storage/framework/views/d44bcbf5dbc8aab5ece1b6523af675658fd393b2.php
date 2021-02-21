<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="small-box <?php echo e($row->id%2==0?'bg-cyan-2':'bg-cyan'); ?> ">
                            <div class="inner ">
                                <h3><?php echo e($row->id); ?></h3><br>
                                <h2><?php echo e($row->name); ?></h2><br>
                            </div>
                            <div class="icon">
                                <i class="fas fa-caret-square-right"></i>
                            </div>
                            <a href="<?php echo e(route('category-available-products',[$row->id])); ?>" class="small-box-footer">Products <i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <?php echo e($categories->links()); ?>




        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script>
        $( document ).ready(function() {


        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fatora-task\resources\views/index.blade.php ENDPATH**/ ?>
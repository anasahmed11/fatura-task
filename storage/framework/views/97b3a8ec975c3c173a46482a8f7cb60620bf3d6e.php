<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <form >
                <div class="row">

                    <div class="col-md-3">
                        <input type="text" name="product_name" class="form-control" placeholder="name">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-warning" type="submit" ><i class="fas fa-search"></i> search </button>
                        <a class="btn btn-danger " href="<?php echo e(route('dashboard')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a><br><br>

                    </div>
                    <br><br>

                </div>
            </form>
            <div class="row">
                <!-- Single Popular product -->
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-popular-course mb-100 "  data-aos="zoom-in-down"  data-aos-duration="900">
                            <div class="course-img">
                                <?php if( $row->product&&$row->product->image_url ): ?><img src="<?php echo e(url("/".$row->product->image_url )); ?>" width="100%" ><?php endif; ?>
                            </div>
                            <!-- Course Content -->
                            <div class="course-content">
                                <h4><?php echo e($row->product?$row->product->name:''); ?></h4>
                                <br>
                            </div>
                            <!-- Seat Rating Fee -->
                            <div class="seat-rating-fee d-flex justify-content-between">
                                <div class="seat-rating h-100 d-flex align-items-center">
                                    <div class="seat">
                                        <i class="fa fa-dollar-sign" aria-hidden="true"></i> <?php echo e($row->min_price); ?> EGP
                                    </div>
                                    <div class="rating">
                                        <i class="fa fa-star" aria-hidden="true"></i> 4.5
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($products->links()); ?>




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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fatora-task\resources\views/category-products.blade.php ENDPATH**/ ?>
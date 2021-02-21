

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>

            <div class="row">
                <div class="col-md-3 ">
                    <div class="small-box bg-green ">
                        <div class="inner ">
                            <h2>customers</h2> <br><h3><?php echo e($customers); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="small-box bg-cyan" >
                        <div class="inner" >
                            <h2 style="color: white">couriers</h2> <br><h3 style="color: white"><?php echo e($couriers); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h2>vendors</h2> <br><h3><?php echo e($vendors); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h2>products</h2> <br><h3><?php echo e($products); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <div class="small-box bg-red ">
                        <div class="inner ">
                            <h2>pre products</h2> <br><h3><?php echo e($pre_products); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="small-box bg-yellow" >
                        <div class="inner" >
                            <h2 style="color: white">sales invoices</h2> <br><h3 style="color: white"><?php echo e($sales_invoices); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            <h2> products invoices</h2> <br><h3><?php echo e($purchases_invoices); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h2> pre-products invoices</h2> <br><h3><?php echo e($purchases_pre_invoices); ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>
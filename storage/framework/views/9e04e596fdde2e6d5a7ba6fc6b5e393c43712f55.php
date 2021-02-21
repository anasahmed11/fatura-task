

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Customers Accounting</b></h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="<?php echo e(route('new-customer-cash')); ?>"><button class="btn btn-success" type="button" ><i class="fa fa-dollar-sign"></i> New cash</button></a><br><br>
                </div>
                <div class="col-md-2 ">
                    <a href="<?php echo e(route('new-customer-bank')); ?>"><button class="btn btn-primary" type="button" ><i class="fa fa-money-check"></i> New Check</button></a><br><br>

                </div>
            </div>
            <form >
                <div class="row">

                    <div class="col-md-2">
                        <input type="text" name="customer_name" class="form-control" placeholder="name">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="customer_phone" class="form-control" placeholder="phone">
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="category" class="form-control" placeholder="category">

                    </div>
                    <div class="col-md-2">
                        <input type="text" name="type" class="form-control" placeholder="type">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                        <button class="btn btn-danger " ><a href="<?php echo e(route('customers-accounting')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
                    </div>

                </div>
            </form>
                <div class="row">
                    <div class="table-holder table-responsive">
                        <table class="article-table table table-striped  ">
                            <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>phone</th>
                                <th>category</th>
                                <th>type</th>
                                <th>accounting-details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="article-<?php echo e($row->id); ?>">
                                    <th scope="row"><?php echo e($row->id); ?></th>
                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->phone); ?></td>
                                    <td><?php echo e($row->category?$row->category->name:''); ?></td>
                                    <td><?php echo e($row->type); ?></td>
                                    <td><a href="<?php echo e(route('customer-account',[$row->id])); ?>"><button class="details btn btn-info"  ><i class='far fa-edit'></i> details</button></a></td>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($customers->links()); ?>

                            </tbody>
                        </table><br><br>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/customer-account/index.blade.php ENDPATH**/ ?>
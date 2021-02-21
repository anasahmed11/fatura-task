<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Inventory Products</b></h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <button class="btn btn-dark " ><a href="<?php echo e(route('add-product-to-inventory')); ?>" style="color: white"><i class="fas fa-cart-plus"></i> Add finished product to inventory</a></button><br><br>
                </div>

            </div>
            <form >
                <div class="row">

                    <div class="col-md-3">
                        <input type="text" name="product" class="form-control" placeholder="product"><br>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                        <button class="btn btn-danger " ><a href="<?php echo e(route('inventory-products')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>download :</span><br>
                        <button class="btn btn-success" type="button" id="excel"><i class="far fa-file-excel"></i> Export Excel</button><br><br>
                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="table-holder table-responsive">
                        <table class="article-table table table-striped  ">
                            <thead class="thead-light">
                            <tr>
                                <th>product</th>
                                <th>quantity-in</th>
                                <th>quantity-out</th>
                                <th>current</th>
                                <th>re_order_point</th>
                                <th>details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="invoice-<?php echo e($row->id); ?>">
                                    <td><?php echo e($row->product?$row->product->name : ''); ?></td>
                                    <td><?php echo e($row->sum_in); ?></td>
                                    <td><?php echo e($row->sum_out); ?></td>
                                    <td><?php echo e($row->current); ?></td>
                                    <td>
                                        <?php if($row->product && $row->current > $row->product->re_order_point): ?>
                                            <button class="btn btn-success" ><?php echo e($row->product?$row->product->re_order_point : ''); ?></button>
                                        <?php else: ?>
                                            <button class="btn btn-danger" ><?php echo e($row->product?$row->product->re_order_point : ''); ?></button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary  "  href="<?php echo e(route('inventory-product' , $row->product_id)); ?>"><i class="far fa-eye"></i> details </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($products->links()); ?>

                            </tbody>
                        </table>
                        <br><br>
                    </div>
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

            $(document).on("click", "#excel", function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    Content: "text/csv",
                    url: 'export-all-inventory-products',
                    success: function(data) {
                        window.location.href = 'export-all-inventory-products' ;
                    }
                });
                e.preventDefault();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/inventory/inventory-products.blade.php ENDPATH**/ ?>
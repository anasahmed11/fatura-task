<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Products</b></h1><br>
                </div>
            </div>
            <form >
            <div class="row">

                <div class="col-md-3">
                    <input type="text" name="product_name" class="form-control" placeholder="name">
                </div>
                <div class="col-md-3">
                    <input type="text" name="provider_name" class="form-control" placeholder="provider">
                </div>
                <div class="col-md-3">
                    <input type="text" name="category" class="form-control" placeholder="category">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>

                </div>
                <br><br>

            </div>
            </form>
                <div class="row">
                    <div class="table-holder table-responsive">
                        <table class="article-table table table-striped  ">
                            <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>category name</th>
                                <th>availability</th>
                                <th>price</th>
                                <th>photo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="article-<?php echo e($row->id); ?>">
                                    <th scope="row"><?php echo e($row->id); ?></th>
                                    <td><?php echo e($row->product?$row->product->name:''); ?></td>
                                    <td><?php echo e($row->product->category?$row->product->category->name:''); ?></td>
                                    <td>
                                        <?php if($row->available==1): ?>
                                            <button class="btn btn-success change change-<?php echo e($row->id); ?>" data-id="<?php echo e($row->id); ?>" data-active="<?php echo e($row->available); ?>" >
                                                available
                                            </button>

                                        <?php else: ?>
                                            <button class="btn btn-danger change change-<?php echo e($row->id); ?>" data-id="<?php echo e($row->id); ?>" data-active="<?php echo e($row->available); ?>" >
                                                not available
                                            </button>
                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo e($row->price); ?></td>
                                    <td><?php if( $row->product&&$row->product->image_url ): ?><img src="<?php echo e(url("/".$row->product->image_url )); ?>" width="100px" ><?php endif; ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($articles->links()); ?>

                            </tbody>
                        </table><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $( document ).ready(function() {
            $(document).on("click", ".change", function(e) {
                var product_id = $(this).data('id');
                var active = $(this).data('active');
                if(active ==0) {
                    active=1;
                } else{
                    active=0;
                }
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'product-available/'+product_id+'/'+active,
                    success: function(data){
                        if(data.available==0){
                            $(".change-"+product_id).replaceWith("<button class='btn btn-danger change change-"+data.id+"' data-id='"+data.id+"'data-active='"+data.available+"' >  not available </button>");

                        }else{
                            $(".change-"+product_id).replaceWith("<button class='btn btn-success change change-"+data.id+"' data-id='"+data.id+"'data-active='"+data.available+"' > avaialble</button>");
                        }
                    }
                });
                e.preventDefault();
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fatora-task\resources\views/admin/pages/provider-products.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Order Invoices</b></h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">

                </div>
                <div class="col-md-3 ">
                    <button class="btn btn-success btn-block" >Invoices Number <br><?php echo e($count_invoices); ?></button><br>
                </div>
                <div class="col-md-3 ">
                    <button class="btn btn-danger btn-block" >Total Invoices Value <br><?php echo e($total_invoices); ?></button><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-dark btn-block " ><a href="<?php echo e(route('inventory-pre-products-invoice')); ?>" style="color: white"><i class="fas fa-cart-plus"></i> Add new</a></button><br><br>
                </div>
            </div>
            <form >
                <div class="row">

                    <div class="col-md-2">
                        <input type="text" name="vendor" class="form-control" placeholder="vendor">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="invoice_id" class="form-control" placeholder="invoice number">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="order_id" class="form-control" placeholder="order_id">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                        <button class="btn btn-danger " ><a href="<?php echo e(route('inventory-pre-products-invoice-index')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">

                        <span>From : </span>  <input type="date" name="from_date" class="form-control" id="from_date"><br>
                    </div>
                    <div class="col-md-3">
                        <span>To :</span>  <input type="date" name="to_date" class="form-control" id="to_date"><br>
                    </div>
                    <div class="col-md-3">
                        <span>download :</span><br>
                        <button class="btn btn-success" type="button" id="excel"><i class="far fa-file-excel"></i> Export Excel</button>
                    </div>
                </div>
            </form>
                <div class="row">
                    <div class="table-holder table-responsive">
                        <table class="article-table table table-striped  ">
                            <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>vendor</th>
                                <th>order_id</th>
                                <th>tax</th>
                                <th>discount</th>
                                <th>total</th>
                                <th>description</th>
                                <th>date</th>
                                <th>details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="invoice-<?php echo e($row->id); ?>">
                                    <th scope="row"><?php echo e($row->id); ?></th>
                                    <td><?php echo e($row->vendor?$row->vendor->name : ''); ?></td>
                                    <td><?php echo e($row->pre_products_invoice_id); ?></td>
                                    <td><?php echo e($row->tax_amount); ?></td>
                                    <td><?php echo e($row->discount); ?></td>
                                    <td><?php echo e($row->grand_total); ?></td>
                                    <td><?php echo e($row->description); ?></td>
                                    <td><?php echo e($row->created_at); ?></td>
                                    <td>
                                        <button class="details btn btn-info" data-toggle="modal" data-target="#details-modal" data-id="<?php echo e($row->id); ?>" ><i class="far fa-eye"></i> show</button>
                                        <button class="pdf btn btn-danger" data-id="<?php echo e($row->id); ?>" ><i class="far fa-file-pdf"></i> Print</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($invoices->links()); ?>

                            </tbody>
                        </table>
                        <br><br>
                    </div>
                </div>
            <!-- details-Modal -->
            <div class="modal fade" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">invoice details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="main-table" class="row">
                                <div class="table-responsive">
                                    <table class="table color-table inverse-table">

                                        <thead>
                                        <tr>
                                            <th>pre product</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>total</th>
                                        </tr>

                                        </thead>
                                        <tbody class="pre">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
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
            /* ------------- details --------------*/
            $(document).on('click',".details",function(e){
                var id=$(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: 'inventory-pre-products-invoice-details/'+id,
                    processData: false,
                    success: function (data) {
                        if((data.errors)){
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: value,
                            });
                        }else{
                            $(".pre").html(
                                "<tr></tr>"
                            );

                            $.each(data, function(i, item) {
                                $(".pre").append(
                                    "<tr>"+
                                    "<td>"+item.pre_product.name +"</td>"+
                                    "<td>"+item.quantity+"</td>"+
                                    "<td>"+item.pre_product.purchase_price +"</td>"+
                                    "<td>"+item.total+"</td>"+
                                    "</tr>"
                                )
                            });
                        }
                    }
                });
                e.preventDefault();
            });

            $(document).on("click", "#excel", function(e) {
                to_date = $("#to_date").val();
                from_date = $("#from_date").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    Content: "text/csv",
                    url: 'export-all-inventory-pre-products-invoices?from_date=' + from_date + '&to_date=' + to_date,
                    success: function(data) {
                        window.location.href = 'export-all-inventory-pre-products-invoices?from_date=' + from_date +
                            '&to_date=' + to_date ;
                    }
                });
                e.preventDefault();
            });
            $(document).on("click", ".pdf", function(e) {
                var id=$(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    Content: "text/csv",
                    url: 'export-inventory-pre-products-invoice-details/'+id,
                    success: function(data) {
                        window.location.href = 'export-inventory-pre-products-invoice-details/'+id ;
                    }
                });
                e.preventDefault();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/inventory-pre-products-invoice/index.blade.php ENDPATH**/ ?>
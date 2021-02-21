<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Customer Account</b></h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ">
                    <button class="btn btn-primary btn-block" > total value <br><?php echo e($total); ?></button><br>
                </div>
                <div class="col-md-4 ">
                    <button class="btn btn-success btn-block" > payed <br><?php echo e($payed); ?></button><br>
                </div>
                <div class="col-md-4 ">
                    <button class="btn btn-danger btn-block" >  Pending <br><?php echo e($required); ?></button><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <button class="btn  btn-success" type="button" data-id="<?php echo e($id); ?>" id="excel"><i class="far fa-file-excel"></i> Excel</button>
                    <button class="btn btn-danger " ><a href="<?php echo e(route('customers-accounting')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
                </div>
                 <div class="col-md-4"></div>
            </div>
            <!------------------------------------- sales ------------------------->

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Order Invoices</b></h1><br>
                </div>

            </div>

            <form >
                <div class="row">
                    <div class="col-md-4 ">
                    </div>
                    <div class="col-md-4 ">
                        <button class="btn btn-success btn-block" > total_invoices <br><?php echo e($total_invoices); ?></button><br>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>

            </form>
                <div class="row">
                    <div class="table-holder table-responsive">
                        <table class="article-table table table-striped  ">
                            <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>courier</th>
                                <th>tax</th>
                                <th>discount</th>
                                <th>total</th>
                                <th>description</th>
                                <th>date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="invoice-<?php echo e($row->id); ?>">
                                    <td><?php echo e($row->id); ?></td>
                                    <td><?php echo e($row->courier?$row->courier->name : ''); ?></td>
                                    <td><?php echo e($row->tax_amount); ?></td>
                                    <td><?php echo e($row->discount); ?></td>
                                    <td><?php echo e($row->grand_total); ?></td>
                                    <td><?php echo e($row->description); ?></td>
                                    <td><?php echo e($row->created_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($invoices->links()); ?>

                            </tbody>
                        </table>
                        <br><br>
                    </div>
                        <hr>
                    </div>

            <!------------------------------------- sales return ------------------- ------------------------->

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Order return Invoices</b></h1><br>
                </div>

            </div>
            <form >
                <div class="row">
                    <div class="col-md-4 ">
                    </div>
                    <div class="col-md-4 ">
                        <button class="btn btn-danger btn-block" > total_return_invoices <br><?php echo e($total_return_invoices); ?></button><br>
                    </div>
                    <div class="col-md-4 ">
                    </div>
                </div>

            </form>
            <div class="row">
                <div class="table-holder table-responsive">
                    <table class="article-table table table-striped  ">
                        <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>courier</th>
                            <th>tax</th>
                            <th>discount</th>
                            <th>total</th>
                            <th>description</th>
                            <th>date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $return_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="invoice-<?php echo e($row->id); ?>">
                                <td><?php echo e($row->id); ?></td>
                                <td><?php echo e($row->courier?$row->courier->name : ''); ?></td>
                                <td><?php echo e($row->tax_amount); ?></td>
                                <td><?php echo e($row->discount); ?></td>
                                <td><?php echo e($row->grand_total); ?></td>
                                <td><?php echo e($row->description); ?></td>
                                <td><?php echo e($row->created_at); ?></td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($return_invoices->links()); ?>

                        </tbody>
                    </table>
                    <br><br>
                    <hr>
                </div>
            </div>

            <!------------------------------------- transactions ------------------------->

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>cash </b></h1><br>
                </div>

            </div>
            <form >
                <div class="row">
                    <div class="col-md-4 ">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-info btn-block" > total_cash <br><?php echo e($total_cash); ?></button><br>
                    </div>
                    <div class="col-md-4 ">
                    </div>
                </div>

            </form>
            <div class="row">
                <div class="table-holder table-responsive">
                    <table class="article-table table table-striped  ">
                        <thead class="thead-light">
                        <tr>
                            <th>value</th>
                            <th>invoice no </th>
                            <th>date</th>
                            <th>notes</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $cash_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="invoice-<?php echo e($row->id); ?>">
                                <td><?php echo e($row->value); ?></td>
                                <td><?php echo e($row->invoice_id); ?></td>
                                <td><?php echo e($row->date); ?></td>
                                <td><?php echo e($row->notes); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($cash_accounts->links()); ?>

                        </tbody>
                    </table>
                    <br><br><hr>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>check </b></h1><br>
                </div>

            </div>
        <form >
            <div class="row">
                <div class="col-md-4 ">
                </div>
                <div class="col-md-4 ">
                    <button class="btn btn-dark btn-block" > total_check<br><?php echo e($total_check); ?></button><br>
                </div>
                <div class="col-md-4 ">
                </div>
            </div>

        </form>
        <div class="row">
            <div class="table-holder table-responsive">
                <table class="article-table table table-striped  ">
                    <thead class="thead-light">
                    <tr>
                        <th>bank</th>
                        <th>value</th>
                        <th>invoice no </th>
                        <th>bank date</th>
                        <th>due date</th>
                        <th>notes</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $bank_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="invoice-<?php echo e($row->id); ?>">
                            <td><?php echo e($row->bank?$row->bank->bank :''); ?></td>
                            <td><?php echo e($row->value); ?></td>
                            <td><?php echo e($row->invoice_id); ?></td>
                            <td><?php echo e($row->bank_date); ?></td>
                            <td><?php echo e($row->due_date); ?></td>
                            <td><?php echo e($row->notes); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($bank_accounts->links()); ?>

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
                                            <th>product</th>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

    <script>
        $( document ).ready(function() {

            $(document).on("click", "#excel", function(e) {
                to_date = $("#to_date").val();
                from_date = $("#from_date").val();
                var id=$(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    Content: "text/csv",
                    url: 'export-customer-account/'+id,
                    success: function(data) {
                        window.location.href = 'export-customer-account/'+id ;
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
                    url: 'export-sales-invoice-details/'+id,
                    success: function(data) {
                        window.location.href = 'export-sales-invoice-details/'+id ;
                    }
                });
                e.preventDefault();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/customer-account/customer-account.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>


    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <form method="post" enctype="multipart/form-data" id="add-invoice-form">
        <div class="row clearfix">
            <div class="col-md-12">
                <table class="table table-bordered table-hover " >
                    <tbody>
                    <tr>
                        <div class="col-md-6">
                            <th class="text-center"><?php echo e(Form::label('customer_id', ' invoice')); ?></th>
                            <td >
                                <select class="form-control customer_id " style="height: 200px ; width: 100% ;"   name="sales_invoice" >
                                    <option value=""  >choose invoice</option>
                                    <?php $__currentLoopData = $sales_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" ><?php echo e($row->id); ?> | <?php echo e($row->customer?$row->customer->name : ''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                        </div>

                        <div class="col-md-6">
                            <th class="text-center"><?php echo e(Form::label('created_at', ' Date')); ?></th>
                            <td >
                                <input type="date" id="created_at " class="form-control"  placeholder="0" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                            </td>
                        </div>

                    </tr>

                    </tbody>
                </table>

                <br>

            </div>

        </div>
        <div class="row clearfix" style="margin-top:20px">
            <div class="col-md-6 offset-3">
                <table class="table table-bordered table-hover"  >
                    <thead>
                    <tr>
                        <th class="text-center"> description </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td ><?php echo e(Form::textarea('description','',['class' => 'form-control','rows' =>9,'cols'=>10,'placeholder'=>'description','id'=>'description-edit'])); ?></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
            <div class="row">
                <div class="col-3">

                </div>
                <div class="col-3">
                    <button id="add-invoice" type="submit" class="btn btn-primary btn-block"><i class="far fa-save"></i> save</button><br><br>
                </div>
                <div class="col-3">
                    <a href="<?php echo e(route('inventory-sales-invoice-index')); ?>" style="color: white"> <button  type="button" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"></i> Back </button></a><br><br>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.customer_id').select2({
                allowClear: true,
                width: "resolve"
            });
            $('.courier_id').select2({
                allowClear: true,
                width: "resolve"
            });
            $('.sub_category_id').select2({
                allowClear: true,
                width: "resolve"
            });

                /* ------------------- new-article----------------- */
                $(document).on("click", "#add-invoice", function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: 'inventory-sales-invoice',
                        data: new FormData($("#add-invoice-form")[0]),
                        dataType: 'json',
                        async: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if(data.message){

                                Swal.fire({
                                    type: 'error',
                                    title: 'sorry',
                                    text: data.message,
                                });
                            }else {
                                Swal.fire(
                                    'done',
                                    '',
                                    'success'
                                );
                                $('#add-invoice-form').trigger("reset");
                            }


                        },
                        error: function (data) {
                            $.each(data.responseJSON.errors, function (key, value) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'sorry',
                                    text: value,
                                });
                            })
                        },
                        statusCode: {
                            500: function() {
                                Swal.fire({
                                    type: 'error',
                                    title: 'sorry',
                                    text: 'you should fill  all fields ',
                                });
                            }
                        }
                    });
                    e.preventDefault();
                });


        });




    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/inventory-sales-invoice/sales-invoice.blade.php ENDPATH**/ ?>
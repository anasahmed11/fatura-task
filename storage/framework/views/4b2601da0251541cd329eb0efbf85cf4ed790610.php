<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>


    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <form method="post" enctype="multipart/form-data" id="add-invoice-form">
        <div class="row clearfix">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" >
                    <tbody>
                    <tr>
                        <div class="col-md-4">
                            <th class="text-center"><?php echo e(Form::label('customer_id', ' customer')); ?></th>
                            <td >
                                <select class="form-control customer_id " style="height: 200px ; width: 100% ;"   name="customer_id" >
                                    <option value=""  >choose customer</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" ><?php echo e($row->name); ?> | <?php echo e($row->phone); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                        </div>
                        <div class="col-md-4">
                            <th class="text-center"><?php echo e(Form::label('courier_id', ' courier')); ?></th>
                            <td >
                                <select class="form-control courier_id " style="height: 200px ; width: 100% ;"   name="courier_id" >
                                    <option value=""  >choose courier</option>
                                    <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->id); ?>" ><?php echo e($row->name); ?> | <?php echo e($row->area?$row->area->name : ''); ?>  </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                        </div>
                        <div class="col-md-4">
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
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center"> # </th>
                        <th class="text-center"> Product </th>
                        <th class="text-center"> Quantity </th>
                        <th class="text-center"> Price </th>
                        <th class="text-center"> Total </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id='addr0'>
                        <td>1</td>
                        <td><select class="form-control sub_category_id " style="height: 200px"   name="product_id[]">
                                <option value=""  >choose product</option>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>" data-price="<?php echo e($row->sale_price); ?>" ><?php echo e($row->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><br></td>
                        <td><input type="number" name='quantity[]' placeholder='Enter Qty' class="form-control qty" step="0" min="0" required/></td>
                        <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" id="price0" step="0.00" min="0" readonly/></td>
                        <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                    </tr>
                    <tr id='addr1'></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <button id="add_row" type="button" class="btn btn-default pull-left">Add Row</button>
                <button id='delete_row' type="button" class="pull-right btn btn-default">Delete Row</button>
            </div>
        </div>
        <div class="row clearfix" style="margin-top:20px">
            <div class="pull-right col-md-6">
                <table class="table table-bordered table-hover" id="tab_logic_total">
                    <tbody>
                    <tr>
                        <th class="text-center">Sub Total</th>
                        <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                    </tr>
                    <tr>
                        <th class="text-center">Tax</th>
                        <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                <input type="number" class="form-control" value="0" id="tax" placeholder="0" name="tax">
                                <div class="input-group-addon">%</div>
                            </div></td>
                    </tr>
                    <tr>
                        <th class="text-center">Tax Amount</th>
                        <td class="text-center"><input type="number" value="0" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                    </tr>
                    <tr>
                        <th class="text-center">Discount Amount</th>
                        <td class="text-center"><input type="number" value="0" name='discount_amount' id="discount" placeholder='0.00' class="form-control" /></td>
                    </tr>
                    <tr>
                        <th class="text-center">Grand Total</th>
                        <td class="text-center"><input type="number" name='grand_total' id="grand_total" placeholder='0.00' class="form-control" readonly/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
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
                    <a href="<?php echo e(route('sales-invoice-index')); ?>" style="color: white"> <button  type="button" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"></i> Back </button></a><br><br>
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
            calc();
            var i=1;
            $("#add_row").on('click',function(){b=i-1;
                $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
                $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
                $('.sub_category_id').select2({
                    allowClear: true,
                    width: "resolve"
                });
                $('.sub_category_id').last().next().next().remove();
                i++;
            });

            $("#delete_row").on('click',function(){
                if(i>1){
                    $("#addr"+(i-1)).html('');
                    i--;
                }
                calc();
            });

            $('#tab_logic tbody').on('keyup change',function(){
                calc();
            });
            $('#tax').on('keyup change',function(){
                calc_total();
            });
            $('#discount').on('keyup change',function(){
                calc_total();
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
                        url: 'sales-invoice',
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

        function calc()
        {
            $('#tab_logic tbody tr').each(function(i, element) {
                var html = $(this).html();
                if(html!='')
                {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    var cat = $(this).find('.sub_category_id');
                    var pricee = $(this).find('.price');

                    $(this).find('.total').val(qty*price);
                    $(pricee).val($(cat).children("option:selected").data('price'));
                    $(cat).change(function(){
                        $(pricee).val($(this).children("option:selected").data('price'));
                    });


                    calc_total();
                }
            });
        }


        function calc_total()
        {

            total=0;
            $('.total').each(function() {
                total += parseInt($(this).val());
            });
            $('#sub_total').val(total.toFixed(2));
            tax_sum=total/100*$('#tax').val();
            discount_sum=$('#discount').val();
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#grand_total').val((tax_sum+total-discount_sum).toFixed(2));
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/sales-invoice/sales-invoice.blade.php ENDPATH**/ ?>
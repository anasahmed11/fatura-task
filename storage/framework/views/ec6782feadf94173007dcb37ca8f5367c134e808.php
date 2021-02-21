

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Banks</b></h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#new-modal-article"><i class='fas fa-plus'></i> Add new</button><br><br>
                </div>
            </div>
            <form >
                <div class="row">

                    <div class="col-md-3">
                        <input type="text" name="bank_name" class="form-control" placeholder="bank">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                        <button class="btn btn-danger " ><a href="<?php echo e(route('banks')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
                    </div>

                </div>
            </form>
                <div class="row">
                    <div class="table-holder table-responsive">
                        <table class="article-table table table-striped  ">
                            <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>bank</th>
                                <th>account number</th>
                                <th>swift</th>
                                <th>iban </th>
                                <th>branch </th>
                                <th>balance </th>
                                <th>update</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="article-<?php echo e($row->id); ?>">
                                    <th scope="row"><?php echo e($row->id); ?></th>
                                    <td><?php echo e($row->bank); ?></td>
                                    <td><?php echo e($row->account_number); ?></td>
                                    <td><?php echo e($row->swift); ?></td>
                                    <td><?php echo e($row->iban); ?></td>
                                    <td><?php echo e($row->branch); ?></td>
                                    <td><?php echo e($row->balance); ?></td>
                                    <td><button class="edit-article btn btn-info"  data-toggle="modal" data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>" data-title="<?php echo e($row->bank); ?>" data-price="<?php echo e($row->account_number); ?>"  data-swift="<?php echo e($row->swift); ?>" data-iban="<?php echo e($row->iban); ?>" data-branch="<?php echo e($row->branch); ?>" data-balance="<?php echo e($row->balance); ?>"><i class='far fa-edit'></i> update</button></td>
                                    <td><button class="delete-article btn btn-danger" data-id="<?php echo e($row->id); ?>"><i class='far fa-trash-alt'></i>  delete</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($articles->links()); ?>

                            </tbody>
                        </table><br><br>
                    </div>
                </div>
                <!-- new-Modal -->
                <div class="modal fade" id="new-modal-article" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-auto" id="exampleModalLongTitle"> add</h5>
                            </div>
                            <div class="modal-body">
                                <?php echo e(Form::open(array('id'=>'add-article-form','enctype'=>'multipart/form-data'))); ?>

                                <?php echo e(Form::label('bank', 'bank ')); ?>

                                <?php echo e(Form::text('bank','',['class' => 'form-control'])); ?><br>
                                <?php echo e(Form::label('account_number', 'account_number ')); ?>

                                <?php echo e(Form::text('account_number','',['class' => 'form-control'])); ?><br>
                                <?php echo e(Form::label('swift', 'swift ')); ?>

                                <?php echo e(Form::text('swift','',['class' => 'form-control'])); ?><br>
                                <?php echo e(Form::label('iban', 'iban ')); ?>

                                <?php echo e(Form::text('iban','',['class' => 'form-control'])); ?><br>
                                <?php echo e(Form::label('branch', 'branch ')); ?>

                                <?php echo e(Form::text('branch','',['class' => 'form-control'])); ?><br>
                                 <?php echo e(Form::label('balance', 'balance ')); ?>

                                <?php echo e(Form::number('balance','',['class' => 'form-control','step'=>'0.01'])); ?><br><br>
                                <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-article'])); ?>

                                <?php echo e(Form::close()); ?>

                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- new-Modal -->
                <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit</h5>
                            </div>
                            <div class="modal-body">
                                <?php echo e(Form::open(array('id'=>'edit-article-form','enctype'=>'multipart/form-data'))); ?>

                                <?php echo e(Form::label('bank', 'bank ')); ?>

                                <?php echo e(Form::text('bank','',['class' => 'form-control','id'=>'title-edit'])); ?><br>
                                <?php echo e(Form::label('account_number', 'account_number ')); ?>

                                <?php echo e(Form::number('account_number','',['class' => 'form-control','id'=>'price-edit'])); ?><br>
                                <?php echo e(Form::label('swift', 'swift ')); ?>

                                <?php echo e(Form::text('swift','',['class' => 'form-control','id'=>'swift-edit'])); ?><br>
                                <?php echo e(Form::label('iban', 'iban ')); ?>

                                <?php echo e(Form::text('iban','',['class' => 'form-control','id'=>'iban-edit'])); ?><br>
                                <?php echo e(Form::label('branch', 'branch ')); ?>

                                <?php echo e(Form::text('branch','',['class' => 'form-control','id'=>'branch-edit'])); ?><br>
                                <?php echo e(Form::label('balance', 'balance ')); ?>

                                <?php echo e(Form::number('balance','',['class' => 'form-control','step'=>'0.01','id'=>'balance-edit'])); ?><br><br>
                                <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-article'])); ?>

                                <?php echo e(Form::close()); ?>

                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- couriers-details-Modal -->
            <div class="modal fade" id="show-couriers-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">couriers details</h5>
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
                                            <th>name</th>
                                            <th>phone</th>
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
            /* ------------------- new-article----------------- */
            $(document).on("click", "#add-article", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'banks',
                    data: new FormData($("#add-article-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        Swal.fire(
                            'done',
                            '',
                            'success'
                        );
                        $('#add-article-form').trigger("reset");
                        $(".article-table").prepend("<tr class='article-" + data.id + "'>" +
                            "<th scope='row'>" + data.id + "</th>" +
                            "<td>" + data.bank + "</td>" +
                            "<td>" + data.account_number + "</td>" +
                            "<td>" + data.swift + "</td>" +
                            "<td>" + data.iban + "</td>" +
                            "<td>" + data.branch + "</td>" +
                            "<td>" + data.balance + "</td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-title='" + data.bank + "' data-price='" + data.account_number + "' data-swift='" + data.swift + "' data-iban='" + data.iban + "' data-branch='" + data.branch + "' data-balance='" + data.balance + "' ><i class='far fa-edit'></i> update</button></td>" +
                            "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                            "</tr>");

                    },
                    error: function (data) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: value,
                            });
                        })
                    }
                });
                e.preventDefault();
            });
            /* ------------------- delete article----------------- */
            $(document).on('click', ".delete-article", function (e) {
                var article_id = $(this).data('id');
                Swal.fire({
                    title: 'are you sure ?',
                    text: "if you delete you cant return the date",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'cancel',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'yes delete it '
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'DELETE',
                            url: 'banks/' + article_id,
                            processData: false,
                            success: function (res) {
                                if ((res.errors)) {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'sorry try again',
                                        text: 'error',
                                    })
                                } else {

                                    if(res.message){
                                        Swal.fire({
                                            type: 'error',
                                            title: 'sorry',
                                            text: res.message,
                                        });
                                    }else{
                                        $(".article-" + article_id).remove();
                                        Swal.fire(
                                            'done',
                                            'successful',
                                            'success'
                                        )
                                    }

                                }
                            },
                            error: function (data) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'sorry',
                                    text: 'try again',
                                });
                            }
                        });
                    } else {
                        swal("sorry", "not deleted", "error");
                    }
                });
                e.preventDefault();
            });
            /* -------------------edit article----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-article-form').trigger("reset");
                $("#title-edit").val($(this).data('title'));
                $("#price-edit").val($(this).data('price'));
                $("#swift-edit").val($(this).data('swift'));
                $("#iban-edit").val($(this).data('iban'));
                $("#branch-edit").val($(this).data('branch'));
                $("#balance-edit").val($(this).data('balance'));
                articleId = $(this).data('id');
            });
            $(document).on('click', "#edit-article", function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'banks/' + articleId,
                    data: new FormData($("#edit-article-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if((data.errors)) {
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: 'try again',
                            });

                        }else {
                            Swal.fire(
                                'done',
                                'successful',
                                'success'
                            );
                            $(".article-"+articleId).replaceWith("<tr class='article-" + data.id + "'>" +
                                "<th scope='row'>" + data.id + "</th>" +
                                "<td>" + data.bank + "</td>" +
                                "<td>" + data.account_number + "</td>" +
                                "<td>" + data.swift + "</td>" +
                                "<td>" + data.iban + "</td>" +
                                "<td>" + data.branch + "</td>" +
                                "<td>" + data.balance + "</td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-title='" + data.bank + "' data-price='" + data.account_number + "' data-swift='" + data.swift + "' data-iban='" + data.iban + "' data-branch='" + data.branch + "' data-balance='" + data.balance + "' ><i class='far fa-edit'></i> update</button></td>" +
                                "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                                "</tr>");

                        }
                        $('#edit-article-form').trigger("reset");
                    },
                    error:function (data) {
                        $.each(data.responseJSON.errors, function (key, value) {
                            Swal.fire({
                                type: 'error',
                                title: 'sorry',
                                text: value,
                            });
                        })
                    }
                });
                e.preventDefault();
            });
            /* ------------- couriers-details --------------*/
            $(document).on('click',".details",function(e){
                var id=$(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: 'area-couriers/'+id,
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
                                    "<td>"+item.name +"</td>"+
                                    "<td>"+item.phone+"</td>"+
                                    "</tr>"
                                )
                            });
                        }
                    }
                });
                e.preventDefault();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\amwal-pos\resources\views/admin/pages/banks.blade.php ENDPATH**/ ?>
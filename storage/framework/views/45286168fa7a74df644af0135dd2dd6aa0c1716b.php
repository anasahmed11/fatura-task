<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Products</b></h1><br>
                </div>
            </div>
            <?php if(request()->route()->getName() === 'products'): ?>
                <div class="row">
                    <div class="col-md-3 ">
                        <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#new-modal-article"><i class="fas fa-plus"></i> Add new</button><br><br>
                    </div>
                </div>
            <?php endif; ?>
            <form >
            <div class="row">

                <div class="col-md-3">
                    <input type="text" name="product_name" class="form-control" placeholder="name">
                </div>
                <div class="col-md-3">
                    <input type="text" name="category" class="form-control" placeholder="category">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                    <button class="btn btn-danger " ><a href="<?php echo e(route('products')); ?>" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
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
                                <th>category name</th>
                                <th>photo</th>
                                <th>update</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="article-<?php echo e($row->id); ?>">
                                    <th scope="row"><?php echo e($row->id); ?></th>
                                    <td><?php echo e($row->name); ?></td>
                                    <td><?php echo e($row->category?$row->category->name:''); ?></td>
                                    <td><?php if( $row->image_url ): ?><img src="<?php echo e(url("/$row->image_url")); ?>" width="100px" ><?php endif; ?></td>
                                    <td><button class="edit-article btn btn-info"  data-toggle="modal" data-target="#edit-modal-article" data-id="<?php echo e($row->id); ?>" data-name="<?php echo e($row->name); ?>"   data-category="<?php echo e($row->category_id); ?>"  data-category-name="<?php echo e($row->category->name); ?>"><i class='far fa-edit'></i> update</button></td>
                                    <td><button class="delete-article btn btn-danger" data-id="<?php echo e($row->id); ?>"><i class='far fa-trash-alt'></i>  delete</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($articles->links()); ?>

                            </tbody>
                        </table><br><br>
                    </div>
                </div>
                <!-- new-product -->
                <div class="modal fade" id="new-modal-article" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-auto" id="exampleModalLongTitle"> add</h5>
                            </div>
                            <div class="modal-body">
                                <?php echo e(Form::open(array('id'=>'add-product-form','enctype'=>'multipart/form-data'))); ?>

                                <?php echo e(Form::label('name', 'name ')); ?>

                                <?php echo e(Form::text('name','',['class' => 'form-control'])); ?><br>
                                <?php echo e(Form::label('category_id', 'category')); ?>

                                <br>
                                <select class="form-control category_id" name="category_id" style="height: 200px ; width: 100% ;" >
                                </select><br>
                                <?php echo e(Form::label('photo', 'photo ')); ?>

                                <?php echo e(Form::file('photo',['class'=>'form-control-file'])); ?><br>
                                <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-product'])); ?>

                                <?php echo e(Form::close()); ?>

                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- edit-product -->
                <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit</h5>
                            </div>
                            <div class="modal-body">
                                <?php echo e(Form::open(array('id'=>'edit-product-form','enctype'=>'multipart/form-data'))); ?>

                                <?php echo e(Form::label('name', 'name ')); ?>

                                <?php echo e(Form::text('name','',['class' => 'form-control','id'=>'name-edit'])); ?><br>
                                <?php echo e(Form::label('category_id', 'category')); ?>

                                <br>
                                <select class="form-control category_id_edit" id="category_id_edit" name="category_id" style="height: 200px ; width: 100% ;" >

                                </select><br>
                                <?php echo e(Form::label('photo', 'photo ')); ?>

                                <?php echo e(Form::file('photo',['class'=>'form-control-file'])); ?><br><br>
                                <?php echo e(Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-product'])); ?>

                                <?php echo e(Form::close()); ?>

                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
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
            $('.category_id').select2({
                allowClear: true,
                width: "resolve",
                dropdownParent: $("#new-modal-article"),
                ajax: {
                    url: 'categories-select',
                    type:'GET',
                    dataType: 'json',
                    delay:250,
                    data: function(params) {
                        return {
                            name: params.term,
                            page: params.page || 1

                        }
                    },
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: $.map(data.data,function (val,i) {
                                return {id:val.id,text:val.name}

                            }),
                        }
                    }
                }
            });

            $('.category_id_edit').select2({
                allowClear: true,
                width: "resolve",
                dropdownParent: $("#edit-modal-article"),
                ajax: {
                    url: 'categories-select',
                    type:'GET',
                    dataType: 'json',
                    delay:250,
                    data: function(params) {
                        return {
                            name: params.term,
                            page: params.page || 1

                        }
                    },
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        return {
                            results: $.map(data.data,function (val,i) {
                                return {id:val.id,text:val.name}

                            }),
                        }
                    }
                }
            });
            /* ------------------- new-product----------------- */
            $(document).on("click", "#add-product", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'products',
                    data: new FormData($("#add-product-form")[0]),
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
                        $('#add-product-form').trigger("reset");
                        $(".article-table").prepend("<tr class='article-" + data.id + "'>" +
                            "<th scope='row'>" + data.id + "</th>" +
                            "<td>" + data.name + "</td>" +
                            "<td>" + data.category.name+ "</td>" +
                            "<td><img src='" + path +"/"+ data.image_url+ "' width='100px'></td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-name='" + data.name + "'  data-category='" + data.category_id + "' ><i class='far fa-edit'></i> update</button></td>" +
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
            /* ------------------- delete product----------------- */
            $(document).on('click', ".delete-article", function (e) {
                var product_id = $(this).data('id');
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
                            url: 'products/' + product_id,
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
                                        $(".article-" + product_id).remove();
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
            /* -------------------edit product----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-product-form').trigger("reset");
                $("#name-edit").val($(this).data('name'));
                $('#category_id_edit').val( $(this).data('category'));
                productId = $(this).data('id');
            });
            $(document).on('click', "#edit-product", function (e) {
                var path = <?php echo json_encode(url('/')); ?>;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'products/' + productId,
                    data: new FormData($("#edit-product-form")[0]),
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
                            $(".article-"+productId).replaceWith("<tr class='article-" + data.id + "'>" +
                                "<th scope='row'>" + data.id + "</th>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" + data.category.name+ "</td>" +
                                "<td><img src='" + path +"/"+ data.image_url+ "' width='100px'></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-name='" + data.name + "'  data-category='" + data.category_id + "' ><i class='far fa-edit'></i> update</button></td>" +
                                "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                                "</tr>"
                            )

                        }
                        $('#edit-product-form').trigger("reset");
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
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fatora-task\resources\views/admin/pages/products.blade.php ENDPATH**/ ?>
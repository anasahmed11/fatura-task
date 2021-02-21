@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Providers</b></h1><br>
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
                        <input type="text" name="area_name" class="form-control" placeholder="name">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                        <button class="btn btn-danger " ><a href="{{route('providers')}}" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
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
                                <th>products</th>
                                <th>update</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $row)
                                <tr class="article-{{$row->id}}">
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>
                                        <button class="add-product btn btn-outline-primary" style="margin-right: 5px" data-toggle="modal" data-target="#add-product-modal" data-id="{{$row->id}}"><i class='fas fa-plus'></i> add</button>
                                        <a href="{{route('provider-products',[$row->id])}}"><button class="details btn btn-success"  ><i class='far fa-eye'></i> show</button></a>
                                    </td>
                                    <td><button class="edit-article btn btn-info"  data-toggle="modal" data-target="#edit-modal-article" data-id="{{ $row->id }}" data-name="{{$row->name}}"  ><i class='far fa-edit'></i> update</button></td>
                                    <td><button class="delete-article btn btn-danger" data-id="{{$row->id}}"><i class='far fa-trash-alt'></i>  delete</button></td>
                                </tr>
                            @endforeach
                            {{ $articles->links() }}
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
                                {{Form::open(array('id'=>'add-provider-form','enctype'=>'multipart/form-data'))}}
                                {{Form::label('name', 'name ')}}
                                {{Form::text('name','',['class' => 'form-control'])}}<br><br>
                                {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-provider'])}}
                                {{ Form::close() }}
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
                                {{Form::open(array('id'=>'edit-provider-form','enctype'=>'multipart/form-data'))}}
                                {{Form::label('name', 'name ')}}
                                {{Form::text('name','',['class' => 'form-control','id'=>'name-edit'])}}<br><br>
                                {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-provider'])}}
                                {{ Form::close() }}
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- provider-product-Modal -->
            <div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title m-auto" id="exampleModalLongTitle"> add product</h5>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" id="add-product-form">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <table class="tab_logic table table-responsive table-bordered table-hover" id="">
                                            <thead>
                                            <tr>
                                                <th class="text-center"> # </th>
                                                <th class="text-center"> Product </th>
                                                <th class="text-center"> Price </th>
                                                <th class="text-center"> Available </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class='addr0'>
                                                <td>1</td>
                                                <td><select class="form-control product_id " style="height: 200px"   name="product_id[]">
                                                        <option value=""  >choose product</option>
                                                    </select><br></td>
                                                <td><input type="number" name='price[]' placeholder='Enter Price' class="form-control " step="0" min="0"/></td>
                                                <td>
                                                    <select class="form-control "   name="available[]">
                                                        <option value="1"  >available</option>
                                                        <option value="0"  >not available</option>
                                                    </select><br>
                                                </td>
                                            </tr>
                                            <tr class='addr1'></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <button id="" type="button" class="add_row btn btn-default pull-left">Add Row</button>
                                        <button id='' type="button" class="delete_row pull-right btn btn-default">Delete Row</button>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <button id="add-product" type="submit" class="btn btn-primary pull-left">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('.product_id').select2({
                allowClear: true,
                width: "resolve",
                dropdownParent: $("#add-product-modal"),
                ajax: {
                    url: 'products-select',
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

            var i=1;
            $(".add_row").on('click',function(){b=i-1;
                $('.addr'+i).html($('.addr'+b).html()).find('td:first-child').html(i+1);
                $('.tab_logic').append('<tr class="addr'+(i+1)+'"></tr>');
                $('.product_id').select2({
                    allowClear: true,
                    width: "resolve",
                    dropdownParent: $("#add-product-modal"),
                    ajax: {
                        url: 'products-select',
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
                $('.product_id').last().next().next().remove();
                i++;
            });

            $(".delete_row").on('click',function(){
                if(i>1){
                    $(".addr"+(i-1)).html('');
                    i--;
                }
            });
            /* ------------------- new-provider----------------- */
            $(document).on("click", "#add-provider", function (e) {
                var path = {!! json_encode(url('/')) !!};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'providers',
                    data: new FormData($("#add-provider-form")[0]),
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
                        $('#add-provider-form').trigger("reset");
                        $(".article-table").prepend("<tr class='article-" + data.id + "'>" +
                            "<th scope='row'>" + data.id + "</th>" +
                            "<td>" + data.name + "</td>" +
                            "<td>"+
                            "<button class='add-product btn btn-outline-primary' style='margin-right: 5px' data-toggle='modal' data-target='#add-product-modal '  data-id='" + data.id + "' ><i class='fas fa-plus'></i> add</button>" +
                            "<a href='"+path+"/provider/products/"+data.id+"'<button class='details btn btn-success'  ><i class='far fa-eye'></i>show</button></a>"+
                            "</td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-name='" + data.name + "'  ><i class='far fa-edit'></i> update</button></td>" +
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
                var provider_id = $(this).data('id');
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
                            url: 'providers/' + provider_id,
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
                                        $(".article-" + provider_id).remove();
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
                $("#name-edit").val($(this).data('name'));
                providerId = $(this).data('id');
            });
            $(document).on('click', "#edit-provider", function (e) {
                var path = {!! json_encode(url('/')) !!};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'providers/' + providerId,
                    data: new FormData($("#edit-provider-form")[0]),
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
                            $(".article-"+providerId).replaceWith("<tr class='article-" + data.id + "'>" +
                                "<th scope='row'>" + data.id + "</th>" +
                                "<td>" + data.name + "</td>" +
                                "<td>"+
                                "<button class='add-product btn btn-outline-primary' style='margin-right: 5px' data-toggle='modal' data-target='#add-product-modal '  data-id='" + data.id + "' ><i class='fas fa-plus'></i> add</button>" +
                                "<a href='"+path+"/provider/products/"+data.id+"'<button class='details btn btn-success'  ><i class='far fa-eye'></i>show</button></a>"+
                                "</td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-name='" + data.name + "'  ><i class='far fa-edit'></i> update</button></td>" +
                                "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                                "</tr>")

                        }
                        $('#edit-provider-form').trigger("reset");
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

            /*------------------------ pre-product -----------------------------*/
            $(document).on('click', ".add-product", function (e) {
                prviderId = $(this).data('id');
            });
            /* ------------------- new-pre-product ----------------- */
            $(document).on("click", "#add-product", function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'providers/product/'+prviderId,
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
        })
    </script>
@endsection

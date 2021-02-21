@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div >
        <div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><b>Categories</b></h1><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#new-modal-article"><i class="fas fa-plus"></i> Add new</button><br><br>
                </div>
            </div>
            <form >
                <div class="row">

                    <div class="col-md-3">
                        <input type="text" name="category_name" class="form-control" placeholder="category">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i> search </button>
                        <button class="btn btn-danger " ><a href="{{route('categories')}}" style="color: white"><i class="far fa-arrow-alt-circle-left"></i> back</a></button><br><br>
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
                                <th>parent</th>
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
                                    <td>{{$row->category?$row->category->name:' - '}}</td>
                                    <td><a href="{{route('category-products',[$row->id])}}"><button class="details btn btn-success"  ><i class='far fa-eye'></i> products</button></a></td>
                                    <td><button class="edit-article btn btn-info"  data-toggle="modal" data-target="#edit-modal-article" data-id="{{ $row->id }}" data-name="{{$row->name}}"  data-parent="{{$row->parent_id}}"><i class='far fa-edit'></i> update</button></td>
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
                                {{Form::open(array('id'=>'add-category-form','enctype'=>'multipart/form-data'))}}
                                {{Form::label('name', 'name ')}}
                                {{Form::text('name','',['class' => 'form-control'])}}<br>
                                {{Form::label('parent_id', 'parent')}}
                                <br>
                                <select class="form-control parent_id"  name="parent_id" style="height: 200px ; width: 100% ;" >
                                </select><br><br>
                                {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'add-category'])}}
                                {{ Form::close() }}
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- edit-Modal -->
                <div class="modal fade" id="edit-modal-article" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:800px;" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title m-auto" id="exampleModalLongTitle"> edit</h5>
                            </div>
                            <div class="modal-body">
                                {{Form::open(array('id'=>'edit-category-form','enctype'=>'multipart/form-data'))}}
                                {{Form::label('name', 'name ')}}
                                {{Form::text('name','',['class' => 'form-control','id'=>'name-edit'])}}<br>
                                <select class="form-control  parent_id_edit" id="parent_id_edit" name="parent_id" style="height: 200px ; width: 100% ;" >
                                </select><br><br>
                                {{Form::submit('save',['class' => 'btn btn-dark btn-lg btn-block','id'=>'edit-category'])}}
                                {{ Form::close() }}
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
@endsection
@section('script')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('.parent_id').select2({
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

            $('.parent_id_edit').select2({
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
            /* ------------------- new-category----------------- */
            $(document).on("click", "#add-category", function (e) {
                var path = {!! json_encode(url('/')) !!};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'categories',
                    data: new FormData($("#add-category-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Please Wait ..!',
                            text: ' Transaction Under processing Now .... ',
                            type: 'warning',
                            showConfirmButton: false
                        });
                    },
                    success: function (data) {
                        Swal.fire(
                            'done',
                            '',
                            'success'
                        );
                        $('#add-category-form').trigger("reset");
                        if (data.category){
                            var parent= data.category.name;
                        }else{
                            var parent="-";
                        }
                        $(".article-table").prepend("<tr class='article-" + data.id + "'>" +
                            "<th scope='row'>" + data.id + "</th>" +
                            "<td>" + data.name + "</td>" +
                            "<td>" + parent+ "</td>" +
                            "<td>"+"<a href='"+path+"/category-products/"+data.id+"' <button class='details btn btn-success'  ><i class='far fa-eye'></i>  products</button></a></td>" +
                            "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-name='" + data.name + "' data-parent='" + data.parent_id + "' ><i class='far fa-edit'></i> update</button></td>" +
                            "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                            "</tr>"
                        );

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
            /* ------------------- delete category----------------- */
            $(document).on('click', ".delete-article", function (e) {
                var category_id = $(this).data('id');
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
                            url: 'categories/' + category_id,
                            processData: false,
                            beforeSend: function(){
                                Swal.fire({
                                    title: 'Please Wait ..!',
                                    text: ' Transaction Under processing Now .... ',
                                    type: 'warning',
                                    showConfirmButton: false
                                });
                            },
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
                                        $(".article-" + category_id).remove();
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
            /* -------------------edit category----------------- */
            $(document).on('click', ".edit-article", function (e) {
                $('#edit-category-form').trigger("reset");
                $("#name-edit").val($(this).data('name'));
                $("#parent_id_edit").children("option:selected").data('category');
                categoryId = $(this).data('id');
            });

            $(document).on('click', "#edit-category", function (e) {
                var path = {!! json_encode(url('/')) !!};
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'categories/' + categoryId,
                    data: new FormData($("#edit-category-form")[0]),
                    dataType: 'json',
                    async: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Please Wait ..!',
                            text: ' Transaction Under processing Now .... ',
                            type: 'warning',
                            showConfirmButton: false
                        });
                    },
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
                            if (data.category){
                                var parent= data.category.name;
                            }else{
                                var parent="-";
                            }
                            $(".article-"+categoryId).replaceWith(
                                "<tr class='article-" + data.id + "'>" +
                                "<th scope='row'>" + data.id + "</th>" +
                                "<td>" + data.name + "</td>" +
                                "<td>" +parent + "</td>" +
                                "<td>"+"<a href='"+path+"/category-products/"+data.id+"' <button class='details btn btn-success'  ><i class='far fa-eye'></i>  products</button></a></td>" +
                                "<td><button class='edit-article btn btn-info'  data-toggle='modal' data-target='#edit-modal-article' data-id='" + data.id + "' data-name='" + data.name + "' data-parent='" + data.parent_id + "' ><i class='far fa-edit'></i> update</button></td>" +
                                "<td><button class='delete-article btn btn-danger'  data-id='" + data.id + "' ><i class='far fa-trash-alt'></i>  delete</button></td>" +
                                "</tr>");

                        }
                        $('#edit-category-form').trigger("reset");
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
@endsection

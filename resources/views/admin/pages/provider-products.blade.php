@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
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
                            @foreach($articles as $row)
                                <tr class="article-{{$row->id}}">
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->product?$row->product->name:''}}</td>
                                    <td>{{$row->product->category?$row->product->category->name:''}}</td>
                                    <td>
                                        @if($row->available==1)
                                            <button class="btn btn-success change change-{{$row->id}}" data-id="{{$row->id}}" data-active="{{$row->available}}" >
                                                available
                                            </button>

                                        @else
                                            <button class="btn btn-danger change change-{{$row->id}}" data-id="{{$row->id}}" data-active="{{$row->available}}" >
                                                not available
                                            </button>
                                        @endif

                                    </td>
                                    <td>{{$row->price}}</td>
                                    <td>@if( $row->product&&$row->product->image_url )<img src="{{ url("/".$row->product->image_url ) }}" width="100px" >@endif</td>
                                </tr>
                            @endforeach
                            {{ $articles->links() }}
                            </tbody>
                        </table><br><br>
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
@endsection

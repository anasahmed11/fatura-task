@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div >
        <div>
            <div class="row">
                @foreach($categories as $row)
                    <div class="col-md-4">
                        <div class="small-box {{$row->id%2==0?'bg-cyan-2':'bg-cyan'}} ">
                            <div class="inner ">
                                <h3>{{$row->id}}</h3><br>
                                <h2>{{$row->name}}</h2><br>
                            </div>
                            <div class="icon">
                                <i class="fas fa-caret-square-right"></i>
                            </div>
                            <a href="{{route('category-available-products',[$row->id])}}" class="small-box-footer">Products <i class="fa fa-arrow-circle-right"></i></a>
                        </div>

                    </div>

                @endforeach

            </div>
            {{ $categories->links() }}



        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script>
        $( document ).ready(function() {


        })
    </script>
@endsection

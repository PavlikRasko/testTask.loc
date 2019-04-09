@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h5>Category:</h5>
                       @foreach (\App\FilmCategory::all() as $item)
                            <form>
                                {{ csrf_field() }}
                                <input type="checkbox" class="form-check-label" id="{{$item->id}}" value="{{$item->id}}"> {{$item->category}}
                            </form>
                         @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-10">
            @foreach (\App\Films::all() as $item)
                @if(($item->category) == 2  )
            <div class="card">
            <div class="card-body row">
                <div class="col-md-3 justify-content-center">
                    <a href={{$item->url_to_trailer}}>
                        <img src={{$item->pictures}}></a>
                </div>
                    <div class="col-md-9">
                        <h3 class="font-italic" style="color: darkred; margin-bottom: 1px">{{$item->title}}</h3>
                        <small>{{$item->category}}</small>
                        <h6>{{$item->after_title}}</h6>
                        <h6>{{$item->content}}</h6>
                    </div>
            </div>
            </div>
                @endif
            @endforeach
        </div>

    </div>
</div>
@endsection
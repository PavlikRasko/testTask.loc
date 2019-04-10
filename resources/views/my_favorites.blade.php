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
                @foreach (\App\FavoritesFilms::all() as $item)

                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-3 justify-content-center">
                                    <a href=''>
                                        <img src=></a>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="font-italic" style="color: darkred; margin-bottom: 1px"></h3>
                                    <small></small>
                                    <h6>{{$item->title}}</h6>
                                    <h6>{{$item->content}}</h6>
                                </div>
                                <div class="col-md-1">
                                    <button name="{{$item->films_id}}" class="btn btn-outline-danger btn-sm" onclick="{{route('delete_my_favorites')}}">X</button>
                                </div>
                            </div>
                        </div>

                @endforeach
            </div>

        </div>
    </div>
@endsection
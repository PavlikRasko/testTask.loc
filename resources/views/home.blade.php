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
                                <input type="checkbox" class="form-check-label" value="{{$item->id}}"> {{$item->category}}
                            </form>
                         @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
            <div class="card-body">
                @foreach (\App\Films::all() as $item)
                    <form>
                        <input type="checkbox" class="form-check-label" value="{{$item->id}}"> {{$item->category}}
                    </form>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

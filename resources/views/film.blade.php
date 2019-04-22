@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card" onclick="{{route('profile')}}">
            <div class="card-body row">
                <div class="col-md-3 justify-content-center">
                    <img src="{{ $item->pictures }}" style="width: 100%;border: 1px solid #000; border-radius: 5px"/>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="font-italic" style="color: darkred; margin-bottom: 1px">
                                {{ $item->title }}
                            </h3>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <input id="addFav" name="addFav"
                                   style="cursor: pointer; text-underline: none"
                                   class="btn-sm btn-info" type="button" onclick="addFav({{ $item->id }})"
                                   value="Add to favorites"/>
                        </div>
                    </div>
                    <h6 style="margin-top: 15px">{{ $item->filmscategory->category }}</h6>
                    <h6>{{ $item->after_title }}</h6>
                    <h6>{{ $item->content }}</h6>
                    <p name="msg"></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class=" col-md-6">
                    <iframe style="border-radius: 5px" width="560" height="315" src="{{$item->url_to_trailer}}"
                            frameborder="1"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addFav(id) {
            $.ajax({
                url: "/favorite/add/" + id,
                type: "get",
                success: (res) => {
                    if (res == 1) {
                        alert("Added");
                    }else {
                        alert("This movie has already been added!");
                    }
                }
            });
        }
    </script>
@endsection

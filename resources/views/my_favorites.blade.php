@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <h5>Category:</h5>
                        @foreach ($category_list as $item)
                            <input onclick="getByCategory()" type="checkbox" name="category[]"
                                   {{ (isset($selected_categories) &&
                                        in_array($item->id, $selected_categories))? "checked" : "" }}
                                   class="form-check-label" id="category-{{ $item->id }}"
                                   value="{{ $item->id }}">
                            <label for="category-{{ $item->id }}">{{ $item->category }}</label>
                            <br/>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                @forelse ($film_list as $item)
                    <div class="card" id="block-{{ $item->id }}">
                        <div class="card-body row">
                            <div class="col-md-3 justify-content-center">
                                <a href="/film/{{ $item->id }}">
                                    <img style="width: 100%; border-radius: 5px" src={{$item->pictures}}></a>
                            </div>
                            <div class="col-md-8">
                                <a href="/film/{{ $item->id }}">
                                    <h3 class="font-italic"
                                        style="color: darkred; margin-bottom: 1px">{{$item->title}}</h3>
                                </a>
                                <small class="text-uppercase">{{$item->filmscategory->category}}</small>
                                <h6>{{$item->after_title}}</h6>
                                <h6>{{$item->content}}</h6>
                            </div>
                            <div class="col-md-1">
                                <button name="{{$item->films_id}}" class="btn btn-outline-danger btn-sm"
                                        onclick="deleteFavorite({{ $item->id }})">X
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body row">
                            <h3>Empty</h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <script type="text/javascript">

        function deleteFavorite(id) {
            $.ajax({
                url: "/favorite/remove/" + id,
                type: "get",
                success: (res) => {
                    if (res == 1) {
                        document.getElementById("block-" + id).remove();
                    }
                }
            });
        }

        function getByCategory() {
            var values = $("input[name='category[]']:checked")
                .map(function () {
                    return $(this).val();
                }).get();

            $.ajax({
                url: "/favorite/categories",
                type: "get",
                data: {
                    categories: values
                },
                success: (res) => {
                    document.body.innerHTML = res;
                }
            });
        }
    </script>
@endsection
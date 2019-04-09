@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-sm-start">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form>
                            {{csrf_field()}}
                            <link >Name</link><br>
                            <input class="input-group-text" name="name" value="{{App\User::where('id',Auth::id())->value('name')}}"><br>
                            <link>Telephone</link><br>
                            <input class="input-group-text" name="tel" value="{{App\User::where('id',Auth::id())->value('tel')}}"><br>
                            <link>Email</link><br>
                            <input class="input-group-text" name="email" value="{{App\User::where('id',Auth::id())->value('email')}}"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 justify-content-sm-end">
                <div class="card">
                    <div class="card-body ">
                        <div class="align-items-center">
                        <form>
                            {{csrf_field()}}
                            <link>Old Password</link><br>
                            <input type="password" class="input-group-text" name="old_password" /><br>
                            <link>New Password</link><br>
                            <input type="password" class="input-group-text" name="new_password"/><br>
                            <link>Confirm New Password</link><br>
                            <input type="password" class="input-group-text" name="confirm_new_password "/>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
            <div class="row justify-content-center">
                <div>
                    <form>
                        {{csrf_field()}}
                        <input name="change" class="btn-lg bg-info btn btn-info  justify-content-xl-center "  style="margin-top: 25pt" type="submit" value="Save"/>
                    </form>
                </div>
            </div>
    </div>

@endsection
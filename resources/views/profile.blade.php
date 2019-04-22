@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <link>
                                    Name</link><br>
                                    <input class="input-group-text" name="name"
                                           value="{{App\User::where('id',Auth::id())->value('name')}}"><br>
                                    <link>
                                    Telephone</link><br>
                                    <input class="input-group-text" name="tel"
                                           value="{{App\User::where('id',Auth::id())->value('tel')}}"><br>
                                    <link>
                                    Email</link><br>
                                    <input class="input-group-text" name="email"
                                           value="{{App\User::where('id',Auth::id())->value('email')}}"/>
                                </div>

                                <div class="col-md-6">
                                    <link>
                                    Old Password</link>
                                    <input type="password" class="input-group-text" name="old_password"/><br>
                                    <link>
                                    New Password</link><br>
                                    <input type="password" class="input-group-text" name="new_password"/><br>
                                    <link>
                                    Confirm New Password</link><br>
                                    <input type="password" class="input-group-text" name="confirm_new_password"/>

                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div>
                                    <input id="change" name="change"
                                           class="btn-lg bg-info btn btn-info  justify-content-xl-center "
                                           style="margin-top: 25pt"
                                           onclick="updateData()"
                                           type="button" value="Save"
                                    />
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateData() {
            var data = {
                name: $('input[name=name]').val(),
                email: $('input[name=email]').val(),
                tel: $('input[name=tel]').val(),
                old_password: $('input[name=old_password]').val(),
                new_password: $('input[name=new_password]').val(),
                confirm_new_password: $('input[name=confirm_new_password]').val(),
            };

            $.ajax({
                    type: "get",
                    url: "/profile/update",
                    data: data,
                    success: function (result) {
                        if (result == 1) {
                            if (data.new_password) {
                                if (data.old_password) {
                                    if (data.confirm_new_password) {
                                        alert("All updated!");
                                    }
                                }
                            } else {
                                alert('Updated!')
                            }
                        }
                    }
                }
            )
        }
    </script>
@endsection
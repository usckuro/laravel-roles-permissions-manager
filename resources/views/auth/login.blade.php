@extends('layouts.auth')

@section('content')
    <div class="form-group row">
        <div class="col-md-8 offset-md-2">
            <div class="panel ">
                <div class="card-header">{{ ucfirst(config('app.name')) }} Login</div>
                <div class="card-block">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-control">
                            <label class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input type="text"
                                       class="form-control"
                                       name="username"
                                       value="{{ old('username') }}">
                            </div>
                        </div>

                        <div class="form-control">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        <div class="form-control">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>
                            </div>
                        </div>


                        <div class="form-control">
                            <div class="col-md-6 offset-md-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-control">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="margin-right: 15px;">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
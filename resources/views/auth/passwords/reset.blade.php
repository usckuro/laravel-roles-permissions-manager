@extends('layouts.auth')

@section('content')
    <div class="form-group row">
        <div class="col-md-8 offset-md-2">
            <div class="panel ">
                <div class="card-header">Reset password</div>
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
                          action="{{ url('password/reset') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-control">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
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
                            <label class="col-md-4 control-label">Confirm password</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-control">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="margin-right: 15px;">
                                    Reset password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}

    <div class="panel ">
        <div class="card-header">
            @lang('global.app_edit')
        </div>

        <div class="card-block">
            <div class="form-group row">
                <div class="col-xs-12 form-control">
                    {!! Form::label('name', 'Username*', ['class' => 'form-control-label']) !!}
                    {!! Form::text('username', old('username'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 form-control">
                    {!! Form::label('email', 'Email*', ['class' => 'form-control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 form-control">
                    {!! Form::label('password', 'Password', ['class' => 'form-control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12 form-control">
                    {!! Form::label('roles', 'Roles*', ['class' => 'form-control-label']) !!}
                    {!! Form::select('roles[]', $roles,
                    old('roles') ? old('role') : $user->roles()->pluck('role', 'role'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


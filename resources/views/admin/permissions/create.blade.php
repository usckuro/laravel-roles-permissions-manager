@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.permissions.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.permissions.store']]) !!}

    <div class="panel ">
        <div class="card-header">
            @lang('global.app_create')
        </div>
        
        <div class="card-block">
            <div class="form-group row">
                <div class="col-xs-12 form-control">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


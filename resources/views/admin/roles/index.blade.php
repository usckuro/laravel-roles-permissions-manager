@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.roles.title')</h3>


    <div class="panel ">
        <div class="bd-example">

            @foreach($companies as $company)
                @if($loop->iteration == 1)
                    <div class="card-group">
                @endif
                        <div class="card">
                            <img class="card-img-top" height="320px" src="{{$company->logo_url}}" alt="Card image cap" max-width="100%">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <h3> {{$company->name}}</h3>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.roles.create', [$company->id]) }}" class="btn btn-success">@lang('global.app_add_new')</a>
                                        </td>
                                    </tr>

                                </table>
                                <ul class="list-group list-group-flush">
                                    @foreach($company->roles as $role)
                                        <li class="list-group-item">
                                            <table class="table">
                                                <tr>
                                                    <td>{{$role->role}}</td>
                                                    <td class="text-right">
                                                        <a href="{{route('admin.roles.edit', [$role->id, $company->id])}}" class="btn btn-sm btn-info text-white">Edit</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Created {{date($company->created_at)}}</small>
                            </div>

                        </div>
                @if($loop->iteration == $loop->count || ($loop->iteration % 5 == 0))
                    @if($loop->iteration == $loop->count)
                        </div>
                    @else
                        </div>
                        <div class="card-group">
                    @endif
                @endif
            @endforeach


            {{--<table class="table table-bordered table-striped {{ count($roles) > 0 ? 'datatable' : '' }} dt-select">--}}
                {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>--}}
                        {{--<th>@lang('global.roles.fields.name')</th>--}}
                        {{--<th>@lang('global.roles.fields.permission')</th>--}}
                        {{--<th>&nbsp;</th>--}}
                    {{--</tr>--}}
                {{--</thead>--}}
                {{----}}
                {{--<tbody>--}}
                    {{--@if (count($roles) > 0)--}}
                        {{--@foreach ($roles as $role)--}}
                            {{--<tr data-entry-id="{{ $role->id }}">--}}
                                {{--<td></td>--}}
                                {{--<td>{{ $role->name }}</td>--}}
                                {{--<td>--}}
                                    {{--@foreach ($role->permissions()->pluck('name') as $permission)--}}
                                        {{--<span class="label label-info label-many">{{ $permission }}</span>--}}
                                    {{--@endforeach--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                    {{--<a href="{{ route('admin.roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>--}}
                                    {{--{!! Form::open(array(--}}
                                        {{--'style' => 'display: inline-block;',--}}
                                        {{--'method' => 'DELETE',--}}
                                        {{--'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",--}}
                                        {{--'route' => ['admin.roles.destroy', $role->id])) !!}--}}
                                    {{--{!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                    {{--@else--}}
                        {{--<tr>--}}
                            {{--<td colspan="6">@lang('global.app_no_entries_in_table')</td>--}}
                        {{--</tr>--}}
                    {{--@endif--}}
                {{--</tbody>--}}
            {{--</table>--}}
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
    </script>
@endsection
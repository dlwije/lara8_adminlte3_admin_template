@extends('template.master')
@section('title','User Type View')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- Default box -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">View Permissions of {{$role->name}} Role</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
{{--                    <form role="form" id="form">--}}
                        <div class="card-body">
                            <table class="table">
                                <strong>Permissions:</strong>
                                @foreach($permission_head AS $ph)
                                    <tr>
                                        <td>{{$ph->permission_title}}</td>
                                        @if(!empty($rolePermissions))
                                            <td>
                                                @foreach($rolePermissions as $v)
                                                    @if($ph->permission_title == ucfirst(explode('-',$v->name)[0]))
                                                        <label class="label label-success">{{ $v->name }},</label>
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    <div class="card-footer">
                        <a href="{{ route('role.index') }}" class="btn btn-default">Go Back</a>
                    </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

@endsection

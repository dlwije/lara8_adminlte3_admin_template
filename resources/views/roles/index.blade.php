@extends('template.master')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@section('title','User Types')

@section('content')
    <!-- Main content -->
    <section class="content">

        @if(Session::has('info_message'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-warning margin-separator"></i> {{ Session::get('info_message') }}
            </div>
        @endif

        @if(Session::has('success_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-check margin-separator"></i> {{ Session::get('success_message') }}
            </div>
        @endif

    </section><!-- /.content -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Types</h3>
            <div class="card-tools">
                @can('role-create')
                    <a class="btn btn-sm btn-success no-shadow" href="{{ route('role.create') }}">  <i class="glyphicon glyphicon-plus myicon-right"></i> Add New</a>
                @endcan
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="user_role_tbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>User Type</th>
                    <th>Active State</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @push('scripts')
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script>
            $(function () {

                var table = $('#user_role_tbl').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('roles.list') }}",
                    columns: [
                        // {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        // {data: 'email', name: 'email'},
                        {data: 'updated_at', name: 'updated_at'},
                        // {data: 'phone', name: 'phone'},
                        // {data: 'dob', name: 'dob'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

            });
            function goToEdit(id){

                alert(id);
            }
        </script>
    @endpush
@endsection

@extends('layouts.app')
@section('title', 'Permissions')
@section('content')

<div class="row gx-3">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Permissions List</h5>
                <a href="{{ url('permission/create') }}" class="btn btn-primary btn-sm">+ Add Permission</a>
            </div>
            <div class="card-body row">

                <!-- ✅ Include message -->
                @include('layouts.message')

                <div class="table-responsive">
                    <table id="permissionsTable" class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Permission Name</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>

                <!-- ✅ Pagination -->

            </div>
        </div>
    </div>
</div>

@endsection

@push('css')

<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs5.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs5-custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/buttons/dataTables.bs5-custom.css') }}">


@endpush

@push('scripts')


<script src="{{ asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#permissionsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('permission.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>


@endpush
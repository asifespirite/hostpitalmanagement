@extends('layouts.app')
@section('title', 'Edit Permission')
@section('content')

<div class="row gx-3">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Permission</h5>
            </div>
            <div class="card-body">

                <!-- ✅ Include message file -->
                @include('layouts.message')

                <!-- Row starts -->
                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row gx-3">
                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">Permission Name</label>
                                <input type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="Enter Permission Name"
                                    value="{{ old('name', $permission->name) }}">

                                <!-- ✅ Validation error -->
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="radio"
                                            name="status"
                                            id="statusActive"
                                            value="1"
                                            {{ old('status', $permission->status ?? 1) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusActive">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="radio"
                                            name="status"
                                            id="statusInactive"
                                            value="0"
                                            {{ old('status', $permission->status ?? 1) == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusInactive">Inactive</label>
                                    </div>

                                    <!-- ✅ Validation error -->
                                    @error('status')
                                    <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="d-flex gap-2 justify-content-first">
                                <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Row ends -->

            </div>
        </div>
    </div>
</div>

@endsection
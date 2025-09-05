@extends('layouts.app')
@section('title', 'Permissions')
@section('content')

<div class="row gx-3">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Permission</h5>
            </div>
            <div class="card-body">

                <!-- ✅ Include message file -->
                @include('layouts.message')

                <!-- Row starts -->
                <form action="{{ url('permission/store') }}" method="POST">
                    @csrf
                    <div class="row gx-3">
                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="a1">Permissions Name</label>
                                <input type="text"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="a1"
                                    placeholder="Enter Permission Name"
                                    value="{{ old('name') }}">

                                <!-- ✅ Validation error -->
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-6 col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="inlineRadio1">Status</label>
                                <div class="m-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="radio"
                                            name="status"
                                            id="inlineRadio1"
                                            value="1"
                                            {{ old('status') == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="radio"
                                            name="status"
                                            id="inlineRadio2"
                                            value="0"
                                            {{ old('status') == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">Inactive</label>
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
                                <a href="{{ url('permissions') }}" class="btn btn-outline-secondary">
                                    Cancel
                                </a>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Submit
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
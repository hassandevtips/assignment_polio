@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">Manage Provices

<a href="{{ route('divisions.create') }}" class="btn btn-primary">Add New</a>

            </div>
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
    function confirmDelete() {
        if (window.confirm("Are you sure you want to delete this record?")) {
            // User confirmed, submit the form
            return true;
        }
        // User canceled, do nothing
        return false;
    }
</script>
@endpush

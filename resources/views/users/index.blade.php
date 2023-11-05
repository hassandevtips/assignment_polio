@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">Manage Polio Workers

<a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>

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
                <div class="row my-4">
                    <div class="col-md-4">
                        <label for="province_filter">Filter by Province:</label>
                            <select id="province_filter" class="form-control">
                                <option value="">All</option>
                             @foreach (\App\Models\Province::all() as $province)
                                <option value="{{ $province->name }}">{{ $province->name }}</option>
                             @endforeach
                            </select>
                    </div>
                     <div class="col-md-4">
                        <label for="division_filter">Filter by Division:</label>
                            <select id="division_filter" class="form-control">
                                  <option value="">All</option>
                                 @foreach (\App\Models\Division::all() as $division)
                                <option value="{{ $division->name }}">{{ $division->name }}</option>
                             @endforeach
                            </select>
                    </div>
                </div>

                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script type="module">
$(document).ready(function () {
    const table = window.LaravelDataTables['users-table']; // Access the DataTable instance

    $('#province_filter, #division_filter').on('change', function () {
        const provinceFilterValue = $('#province_filter').val();
        const divisionFilterValue = $('#division_filter').val();

        // Apply filters based on the selected values
        table
            .column(3) // Replace with the correct column index for "Province"
            .search(provinceFilterValue)
            .order('province.name')
            .draw();

        table
            .column(4) // Replace with the correct column index for "Division"
            .search(divisionFilterValue)
            .order('division.name')
            .draw();
    });
});
</script>
@endpush

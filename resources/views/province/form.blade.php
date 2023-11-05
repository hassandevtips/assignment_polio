@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($province) ? 'Edit Province' : 'Create Province' }}</h1>

        @if (isset($province))
            <form method="POST" action="{{ route('provinces.update', $province->id) }}">
            @method('PUT') {{-- Use PUT method for editing --}}
        @else
            <form method="POST" action="{{ route('provinces.store') }}">
        @endif
            @csrf

            <div class="form-group my-3">
                <label for="name">Province Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($province) ? $province->name : '' }}" required>
                @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                {{ isset($province) ? 'Update' : 'Create' }}
            </button>
        </form>
    </div>
@endsection

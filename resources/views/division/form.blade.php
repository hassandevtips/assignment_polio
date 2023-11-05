@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($division) ? 'Edit Division' : 'Create Division' }}</h1>

        @if (isset($division))
            <form method="POST" action="{{ route('divisions.update', $division->id) }}">
            @method('PUT') {{-- Use PUT method for editing --}}
        @else
            <form method="POST" action="{{ route('divisions.store') }}">
        @endif
            @csrf

            <div class="form-group my-3">
                <label for="name">Division Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($division) ? $division->name : '' }}" required>
                @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
            </div>


               <div class="form-group my-3">
                <label for="name">Provice:</label>
               <select name="province_id" id="province" class="form-control @error('province_id') is-invalid @enderror" required>
                <option value="">{{ __('Select Province') }}</option>
                    @foreach (\App\Models\Province::all() as $province)
                        <option @if(isset($division) && $division->province_id==$province->id) @selected(true) @endif value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
               </select>
                @error('province_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                {{ isset($division) ? 'Update' : 'Create' }}
            </button>
        </form>
    </div>
@endsection

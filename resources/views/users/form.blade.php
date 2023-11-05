@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>

        @if (isset($user))
            <form method="POST" action="{{ route('users.update', $user->id) }}">
            @method('PUT') {{-- Use PUT method for editing --}}
        @else
            <form method="POST" action="{{ route('users.store') }}">
        @endif
            @csrf
<input type="hidden" name="user_type" value="user">
            <div class="form-group my-3">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($user) ? $user->name : old('name') }}" required>
                @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
            </div>


                <div class="form-group my-3">
                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($user) ? $user->email : old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group my-3">
                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" @if(!isset($user)) required @endif autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group my-3">
                    <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" @if(!isset($user)) required @endif autocomplete="new-password">
                </div>



                           <div class="form-group my-3">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Province') }}</label>
                                <select id="provinceSelect" name="province_id" class="form-control @error('province_id') is-invalid @enderror" required>
                                    <option value="">{{ _('Select Province') }}</option>
                                    @foreach (\App\Models\Province::all() as $province)
                                    <option value="{{ $province->id }}" @if(isset($user) && $user->province_id==$province->id) @selected(true) @endif>{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                 @error('province_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        @push('js')
                        <script type="text/javascript">
                            $(document).ready(function () {
                                // Change event handler for province select
                                $('#provinceSelect').on('change', function () {
                                    var selectedProvinceId = $(this).val();
                                    var divisionSelect = $('#divisionSelect');

                                    // Make an AJAX request to fetch division data
                                    $.ajax({
                                        type: 'GET',
                                        url: '/getDivisions/' + selectedProvinceId, // Replace with your route URL
                                        success: function (data) {
                                            divisionSelect.empty();
                                            divisionSelect.append($('<option value="">Select Division</option>'));
                                            $.each(data, function (index, division) {
                                                divisionSelect.append($('<option value="' + division.id + '">' + division.name + '</option>'));
                                            });
                                        }
                                    });
                                });
                            });
                        </script>
                        @endpush

                           <div class="form-group my-3">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Division') }}</label>

                                <select id="divisionSelect" name="division_id" class="form-control @error('division_id') is-invalid @enderror" required>
                                    <option value="">{{ _('Select Division') }}</option>
                                    @isset($user)
                                    @foreach (\App\Models\Division::where('province_id',$user->province_id)->get() as $division)
                                    <option value="{{ $division->id }}" @if(isset($user) && $user->division_id==$division->id) @selected(true) @endif>{{ $division->name }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                                 @error('division_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


            <button type="submit" class="btn btn-primary">
                {{ isset($user) ? 'Update' : 'Create' }}
            </button>
        </form>
    </div>
@endsection

@extends('layouts.admin')
@section('title', 'Booking Edit')
@section('admin-content')
<main>
    <div class="container">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading">
                <i class="fas fa-home"></i>
                <a href="{{ route('admin.index') }}">Home</a> > Booking Edit
            </span>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-cogs"></i> Booking Edit
            </div>
            <div class="card-body table-card-body p-3 mytable-body">
                <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name', $booking->name) }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', $booking->email) }}"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $booking->phone) }}"
                                class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Address</label>
                            <input type="text" name="address" value="{{ old('address', $booking->address) }}"
                                class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Booking Type</label>
                            <input type="text" name="booking_type" value="{{ old('booking_type', $booking->booking_type) }}"
                                class="form-control @error('booking_type') is-invalid @enderror">
                            @error('booking_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Booking For</label>
                            <select name="booking_for" class="form-control @error('booking_for') is-invalid @enderror">
                                <option value="">Select Service Feature</option>
                                @foreach($features as $feature)
                                    <option value="{{ $feature->id }}" 
                                        {{ old('booking_for', $booking->booking_for) == $feature->id ? 'selected' : '' }}>
                                        {{ $feature->feature_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('booking_for')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Booking Date</label>
                            <input type="date" name="boking_date" value="{{ old('boking_date', $booking->boking_date) }}"
                                class="form-control @error('boking_date') is-invalid @enderror">
                            @error('boking_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label>Booking Time</label>
                            <input type="time" name="boking_time" value="{{ old('boking_time', $booking->boking_time) }}"
                                class="form-control @error('boking_time') is-invalid @enderror">
                            @error('boking_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Update Booking</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

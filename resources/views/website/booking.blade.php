@extends('layouts.website')
@section('title', 'Booking Now')

<style>
    .min-vh-100 {
        min-height: 100vh;
    }

    .shadow {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .feature-item.active {
        border: 2px solid #ff3e00;
        color: #ff3e00;
    }
    .list-group-item.active {
    background-color: transparent !important;
    border: 2px solid  #ff3e00 !important;
}

    .feature-item.active .feature-text {
        font-weight: bold;
        color: #ff3e00;
    }
</style>
@section('website-content')

    <!-- breadcrumb-section - start
                                                  ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">
        <div class="jarallax" style="background-image: url({{ asset('website/images/breadcrumb/0.breadcrumb-bg.jpg') }});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                            class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">booking Form</li>
                                </ul>
                            </div>
                            <!-- breadcrumb-list - end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-section - end
                                                  ================================================== -->

    <!-- booking-section - start
                                                  ================================================== -->
    <section id="booking-section" class="booking-section bg-gray-light sec-ptb-50 clearfix">
        <div class="container">
            <form action="{{ route('bookings.store') }}" method="POST"
                class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 p-5 bg-white shadow rounded">
                            <div class="text-center mb-4 border-bottom">
                                <h2 class="font-weight-bold"><strong>{{ $service->title }}</strong></h2>
                                @if (session('success'))
                                <div class="alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                             @endif
                            </div>

                            <div class="row">
                                <!-- Booking Content Wrapper -->
                                <div class="col-lg-6 mb-4 mb-lg-0">

                                    @csrf
                                
                                    <div class="form-group">
                                        <input type="text" name="booking_type" value="{{ $service->title }}" readonly
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Enter your name" required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Enter your phone number" required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Enter your email address" required
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" placeholder="Enter your address" required
                                            class="form-control">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input type="date" name="booking_date" required class="form-control">
                                        </div>
                                        <div class="col">
                                            <input type="time" name="booking_time" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="text" name="booking_person" placeholder="Enter booking person"
                                            required class="form-control">
                                    </div>
                                </div>

                                <!-- Sidebar Section -->
                                <div class="col-lg-6">

                                    <div class="rounded shadow-sm">
                                        <p class="font-weight-bold">Service Features</p>
                                        <ul class="list-group">
                                            @foreach ($service->features as $feature)
                                                <li class="list-group-item d-flex align-items-center feature-item"
                                                    style="cursor: pointer;">
                                                    <input type="radio" id="feature-{{ $feature->id }}"
                                                        name="booking_for" value="{{ $feature->id }}"
                                                        class="mr-3 feature-radio">
                                                    <label for="feature-{{ $feature->id }}"
                                                        class="d-flex align-items-center w-100 feature-label"
                                                        style="cursor: pointer;">
                                                        <img src="{{ asset($feature->feature_image) }}"
                                                            alt="Image_not_found" class="img-thumbnail"
                                                            style="width: 80px;">
                                                        <span class="ml-3 feature-text">{{ $feature->feature_name }}</span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-lg-12 mt-4 m-aito">
                                    <div class="text-center ">
                                        <button type="submit"
                                            class="custom-btn px-6 py-3 bg-blue-500 text-white shadow-lg hover:bg-blue-600 transition duration-300">
                                            Confirm Booking
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>


    {{-- <section id="booking-section" class="booking-section bg-gray-light sec-ptb-50 clearfix">
        <div class="container">
            <div class="row">

                <!-- booking-content-wrapper - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="booking-content-wrapper">
                        <!-- reg-info - start -->
                        <div class="reg-info mb-50">
                            <div class="section-title mb-30">
                                <h2 class="big-title">Booking <strong>information</strong></h2>
                            </div>
                            <!-- section-title - end -->
                            <!-- row - start -->
                            <form action="{{ route('bookings.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @if (session('success'))
                                        <div class="alert alert-success col-12">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="ticket-buying-form form-wrapper">
                                            <div class="form-item">
                                                <input type="text" name="booking_type" value="{{ $service->title }}"
                                                    readonly>
                                            </div>
                                            <div class="form-item">
                                                <input type="text" name="name" placeholder="Name" required>
                                            </div>
                                            <div class="form-item">
                                                <input type="text" name="phone" placeholder="Phone Number" required>
                                            </div>
                                            <div class="form-item">
                                                <input type="email" name="email" placeholder="Email Address" required>
                                            </div>
                                            <div class="form-item">
                                                <input type="text" name="address" placeholder="Address" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="payment-form form-wrapper">
                                            <div class="form-item">
                                                <select name="booking_for" class="cradit-card-select" required>
                                                    <option value="">--Select Feature--</option>
                                                    @foreach ($service->features as $feature)
                                                        <option value="{{ $feature->id }}">{{ $feature->feature_name }}</option>
                                                    @endforeach
                                                </select>                                                
                                            </div>

                                            <div class="form-item">
                                                <input type="date" name="booking_date" required>
                                            </div>
                                            <div class="form-item">
                                                <input type="time" name="booking_time" required>
                                            </div>
                                            <div class="form-item">
                                                <input type="text" name="booking_person" placeholder="Booking Person"
                                                    required>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="custom-btn">Book Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- row - end -->
                        </div>
                        <!-- reg-info - end -->
                    </div>
                </div>
                <!-- booking-content-wrapper - end -->

                <!-- sidebar-section - start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar-section">

                        <!-- section-title - start -->
                        <div class="section-title mb-30">
                            <h2 class="big-title">Service <strong>info</strong></h2>
                        </div>
                        <!-- section-title - end -->

                        <!-- location-wrapper - start -->
                        <div class="location-wrapper bg-white">

                            <div class="title-wrapper">

                                <div class="title-content">
                                    <h3>{{ $service->title }}</h3>
                                </div>
                            </div>
                            <div class="location-info-list ul-li-block clearfix">
                                <span class="area-name">Service Feature </span>
                                <ul>

                                    @foreach ($service->features as $feature)
                                        <li><span class="image">
                                                <img style="width: 80px;padding-right:15px"
                                                    src="{{ asset($feature->feature_image) }}" alt="Image_not_found">
                                            </span>{{ $feature->feature_name }}</li>
                                    @endforeach
                                </ul>
                            </div>


                        </div>
                        <!-- location-wrapper - end -->

                    </div>
                </div>
                <!-- sidebar-section - end -->

            </div>
        </div>
    </section> --}}
    <!-- booking-section - end
                                                  ================================================== -->
    <script>
        document.querySelectorAll('.feature-radio').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.feature-item').forEach(item => item.classList.remove('active'));
                if (radio.checked) {
                    radio.closest('.feature-item').classList.add('active');
                }
            });
        });
    </script>

@endsection

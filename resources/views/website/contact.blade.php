@extends('layouts.website')
@section('title', 'Contact Us')
@section('website-content')

    <!-- breadcrumb-section - start
      ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">
        <div class="jarallax" style="background-image: url({{ asset('website/images/breadcrumb/0.breadcrumb-bg.jpg') }});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12 col-sm-12">

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
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


    <!-- contact-section - start
      ================================================== -->
    <section id="contact-section" class="contact-section sec-ptb-100 clearfix">
        <div class="container">

            <!-- section-title - start -->
            <div class="section-title mb-50">
                <h2 class="big-title"><strong>contact us</strong></h2>
            </div>
            <!-- section-title - end -->

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- contact-form - start -->
            <div class="contact-form form-wrapper text-center">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-item">
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-item">
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-item">
                                <input type="tel" name="phone" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-item">
                                <input type="text" name="subject" placeholder="Your Subject" required>
                            </div>
                        </div>

                      

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <textarea placeholder="Your Message" name="message" required></textarea>
                            <button type="submit" class="custom-btn">send mail</button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- contact-form - end -->

        </div>
    </section>
    <!-- contact-section - end
      ================================================== -->


    <!-- google map - start
      ================================================== -->
    <section id="map-section" class="map-section clearfix">
       
        <iframe src="{{ $content->map }}" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- <div id="google-map">
        </div> --}}
    </section>
    <!-- google map - end
      ================================================== -->

    <!-- Map -->
    <div class="map">
        {{-- <div id="gmap"></div> --}}
    </div>
    <!-- End map -->

@endsection

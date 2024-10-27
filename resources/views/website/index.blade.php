@extends('layouts.website')
@section('title', 'Home')

@section('website-content')

    <!-- slide-section - start
                                          ================================================== -->

    <section id="slide-section" class="slide-section clearfix">
        <div id="main-carousel1" class="main-carousel1 owl-carousel owl-theme">
            @foreach ($banners as $item)
                <div class="item" style="background-image: url({{ asset($item->image) }});">
                    <div class="overlay-black">
                        <div class="container">
                            <div class="slider-item-content">

                                <span class="medium-text">{{ $item->title }}</span>
                                <h1 class="big-text">{{ $item->short_details }}</h1>
                                {{-- <small class="small-text">every event sould be perfect</small> --}}

                                <div class="link-groups">
                                    <a href="{{ route('contact.us') }}" class="about-btn custom-btn">Contact us</a>
                                    <a href="{{ $item->offer_link }}" class="start-btn">Booking Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    <!-- slide-section - end
                                          ================================================== -->

    <!-- about-section - start
                              ================================================== -->
    <section id="about-section" class="about-section sec-ptb-50 clearfix">
        <div class="container">
            <div class="row">

                <!-- section-title - start -->
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="section-title text-left mb-30">
                        <span class="line-style"></span>
                        <small class="sub-title">why choose us</small>
                        <h2 class="big-title"> {{ $content->welcome_title }}</h2>
                        <p class="black-color mb-50">
                            {!! $content->welcome_note !!}
                        </p>
                        <a href="{{ route('aboutUs') }}" class="custom-btn">
                            about us
                        </a>
                    </div>
                </div>
                <!-- section-title - end -->

                <!-- about-item-wrapper - start -->
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="about-item-wrapper ul-li">
                        <ul>

                            <li>
                                <a href="#!" class="about-item">
                                    <span class="icon">
                                        <i class="flaticon-handshake"></i>
                                    </span>
                                    <strong class="title">
                                        Hotel Booking
                                    </strong>

                                </a>
                            </li>
                            <li>
                                <a href="#!" class="about-item">
                                    <span class="icon">
                                        <i class="flaticon-two-balloons"></i>
                                    </span>
                                    <strong class="title">
                                        Pedicab booking
                                    </strong>

                                </a>
                            </li>
                            <li>
                                <a href="#!" class="about-item">
                                    <span class="icon">
                                        <i class="flaticon-cheers"></i>
                                    </span>
                                    <strong class="title">
                                        Theatre ticket booking
                                    </strong>

                                </a>
                            </li>

                            <li>
                                <a href="#!" class="about-item">
                                    <span class="icon">
                                        <i class="flaticon-clown-hat"></i>
                                    </span>
                                    <strong class="title">
                                        Event management
                                    </strong>

                                </a>
                            </li>

                            <li>
                                <a href="#!" class="about-item">
                                    <span class="icon">
                                        <i class="flaticon-light-bulb"></i>
                                    </span>
                                    <strong class="title">
                                        Day tours on historical places
                                    </strong>

                                </a>
                            </li>
                            <li>
                                <a href="#!" class="about-item">
                                    <span class="icon">
                                        <i class="flaticon-speech-bubble"></i>
                                    </span>
                                    <strong class="title">
                                        24/7 Hours Support
                                    </strong>

                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- about-item-wrapper - end -->

            </div>
        </div>
    </section>
    <!-- about-section - end
                              ================================================== -->


    <!-- conference-section - start
                              ================================================== -->
    @foreach ($services as $index => $service)
        @if ($index % 2 == 0)
            <!-- Layout for Even Items -->
            <section id="conference-section" class="conference-section clearfix">
                <div class="jarallax" style="background-image: url({{asset('website/images/conference/pexels-photo-262669.jpg')}});">
                    <div class="overlay-black sec-ptb-50">
                        <div class="mb-50">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="section-title text-left">
                                            <span class="line-style"></span>
                                            <h2 class="big-title"> <strong>{{ $service->title }}</strong></h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="conference-location ul-li clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-wrapper">
                            <div class="container">
                                <div class="row justify-content-lg-start">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="tab-menu">
                                            <ul class="nav tab-nav mb-50">
                                                @foreach ($service->features as $feature)
                                                    <li class="nav-item">
                                                        <a class="nav-link active" style="display: flex;align-items: center" id="nav-one-tab" data-toggle="tab"
                                                            href="#nav-one">
                                                            <span class="image">
                                                                <img src="{{ asset($feature->feature_image) }}"
                                                                    alt="Image_not_found">
                                                            </span>
                                                            <span class="title">
                                                                <strong
                                                                    class="yellow-color">{{ $feature->feature_name }}</strong>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="more-btn">
                                                <a href="{{ route('service.details', $service->slug) }}">
                                                    <strong class="yellow-color">VIEW DETAILS</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="nav-one">
                                    <div class="image">
                                        <img src="{{ asset($service->image) }}" alt="Image_not_found">
                                        <a href="{{ route('booking.now', $service->slug) }}" class="custom-btn">Booking
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            <!-- Layout for Odd Items -->
            <section id="conference-section" class="conference-section clearfix">
                <div class="jarallax" style="background-image: url({{asset('website/images/conference/pexels-photo-262669.jpg')}});">
                    <div class="overlay-black sec-ptb-50">
                        <div class="mb-30">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="conference-location ul-li clearfix"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="section-title text-left">
                                            <span class="line-style"></span>
                                            <h2 class="big-title"> <strong>{{ $service->title }}</strong></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-wrapper">
                            <div class="tab-content tab-content2">
                                <div class="tab-pane fade active show" id="nav-one">
                                    <div class="image">
                                        <img src="{{ asset($service->image) }}" alt="Image_not_found">
                                        <a href="{{ route('booking.now', $service->slug) }}" class="custom-btn">Booking
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row justify-content-end">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <div class="tab-menu">
                                            <ul class="nav tab-nav mb-30">
                                                @foreach ($service->features as $feature)
                                                    <li class="nav-item">
                                                        <a class="nav-link active" style="display: flex;align-items: center" id="nav-one-tab" data-toggle="tab"
                                                            href="#nav-one">
                                                            <span class="image">
                                                                <img src="{{ asset($feature->feature_image) }}"
                                                                alt="Image_not_found">
                                                            </span>
                                                            <span class="title" >
                                                                
                                                                <strong
                                                                    class="yellow-color">{{ $feature->feature_name }}</strong>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="more-btn">
                                                <a href="{{ route('service.details', $service->slug) }}">
                                                    <strong class="yellow-color">VIEW DETAILS</strong>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <!-- conference-section - end
                              ================================================== -->


    <!-- event-section - start
                                  ================================================== -->
    <section id="event-section" class="event-section bg-gray-light sec-ptb-50 clearfix" style="background-color:#e5e5e5">
        <div class="container">
            <div class="section-title text-center mb-50">
                <small class="sub-title"> News & Event</small>
                <h2 class="big-title">News <strong> And Event</strong></h2>
            </div>
            <div class="row justify-content-center">
                <!-- - start -->
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="tab-content">
                        <div id="grid-style" class="tab-pane fade in active show">
                            <div class="row justify-content-center">
                                @foreach ($events as $item)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="event-grid-item">
                                            <div class="event-image">
                                                <div class="post-date">
                                                    {{ $item->formattedDate->format('D') }}
                                                    <span class="date">{{ $item->formattedDate->format('d') }}</span>
                                                    <small class="month">{{ $item->formattedDate->format('M') }}</small>
                                                </div>
                                                <img src="{{ $item->image }}" alt="Image_not_found">
                                            </div>
                                            <div class="event-content">
                                                <div class="event-title mb-20">
                                                    <h3 class="title">{{ $item->title }}</h3>
                                                </div>
                                                <div style="display: flex; justify-content:center">
                                                    <a href="{{ route('newsEventDetails', $item->id) }}"
                                                        class="tickets-details-btn">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
                <!-- - end -->
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('newsEvent') }}" class="custom-btn">view News and Event</a>
        </div>
    </section>
    <!-- event-section - end
                                  ================================================== -->

    <!-- event-gallery-section - start
                                          ================================================== -->
    <section id="event-gallery-section" class="event-gallery-section sec-ptb-50 clearfix">
        <!-- section-title - start -->
        <div class="section-title text-center mb-30">
            <h2 class="big-title">Our & <strong>Gallery</strong></h2>
        </div>
        <!-- section-title - end -->
        <div class="grid zoom-gallery clearfix mb-30"
            data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
            @foreach ($galleris as $item)
                <div class="grid-item photo-gallery " data-category="photo-gallery">
                    <a class="popup-link" href="{{ $item->image }}">
                        <img src="{{ $item->image }}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>{{ $item->title }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('gallery') }}" class="custom-btn">view all gallery</a>
        </div>
    </section>
    <!-- event-gallery-section - end
                                          ================================================== -->

@endsection

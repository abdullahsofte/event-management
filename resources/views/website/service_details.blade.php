@extends('layouts.website')
@section('title', 'Service Details')
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
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"
                                            class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Service</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
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

    <!-- event-details-section - start
      ================================================== -->

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
                <div class="container">

                    <p class="white-color mb-30">{{ $service->short_details }}</p>
                    <div style="text-align:center;color:#fff">
                        {!! $service->description !!}
                    </div>
                </div>

              
            </div>
        </div>
    </section>



    {{-- <section id="event-details-section" class="event-details-section sec-ptb-50 clearfix">
        <div class="container">
            <div class="row">

                <!-- col - event-details - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- event-details - start -->
                    <div class="event-details mb-50">

                        <div class="event-title mb-30">
                         
                            <h2 class="event-title"> <strong>{{ $service->title }}</strong></h2>
                        </div>

                        <div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">
                            <div class="item">
                                <img src="{{ asset($service->image) }}" alt="Image_not_found">
                            </div>

                        </div>

                        <div class="event-info-list ul-li clearfix mb-50">
                            <ul>

                                @foreach ($service->features as $feature)
                                    <li><i class="fas fa-arrow-circle-right"></i> {{ $feature->feature_name }}</li>
                                @endforeach

                            </ul>
                        </div>

                        <p class="black-color mb-30">{{ $service->short_details }}</p>
                        <div style="text-align:center">
                            {!! $service->description !!}
                        </div>


                    </div>
                    <!-- event-details - end -->

                </div>
                <!-- col - event-details - end -->

                <!-- sidebar-section - start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar-section">

                        <!-- Add to Calendar - start -->


                        <!-- location-wrapper - start -->
                        <div class="location-wrapper mb-30">
                            <div class="title-wrapper">

								<div class="location-info-list ul-li-block clearfix">
									<span class="area-name">Service Feature </span>
									<ul>
	
										@foreach ($service->features as $feature)
											<li>
												<span class="image">
													<img style="width: 80px;padding-right:15px"
														src="{{ asset($feature->feature_image) }}" alt="Image_not_found">
												</span>{{ $feature->feature_name }}</li>
										@endforeach
									</ul>
								</div>
                            </div>
                            <div class="text-center">

                                <a href="{{ route('booking.now', $service->slug) }}" class="custom-btn">Booking Now</a>
                            </div>



                        </div>
                        <!-- location-wrapper - end -->


                    </div>
                </div>
                <!-- sidebar-section - end -->

            </div>
        </div>
    </section> --}}
    <!-- event-details-section - end
      ================================================== -->


@endsection

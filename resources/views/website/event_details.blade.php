@extends('layouts.website')
@section('title', 'News And Event')
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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">News And Event</a></li>
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
    <section id="event-details-section" class="event-details-section sec-ptb-30 clearfix">
        <div class="container">
            <div class="row">

                <!-- col - event-details - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- event-details - start -->
                    <div class="event-details mb-50">

                        <div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">
                            <div class="item">
                                <img src="{{ asset($event->image) }}" alt="Image_not_found">
                            </div>

                        </div>
                        <div class="event-title mb-20">
                            
                            <h2 class="event-title"> <strong>{{ $event->title }}</strong></h2>
                        </div>

                        <div class="event-info-list ul-li clearfix mb-10">
                            <ul>
                                <li>
                                    <span class="icon">
                                        <i class="far fa-calendar"></i>
                                    </span>
                                    <div class="event-content">
                                        <small class="event-title">Event Date</small>
                                        <h3 class="event-date">{{$event->date}}</h3>
                                    </div>
                                </li>
                              

                            </ul>
                        </div>

                        <div style="text-align:justify">
                            {!! $event->description !!}
                        </div>

                    </div>
                    <!-- event-details - end -->

                </div>
                <!-- col - event-details - end -->

                <!-- sidebar-section - start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar-section">
                        <!-- location-wrapper - start -->
                        <div class="location-wrapper mb-30">
                            <div class="title-wrapper">

                                <div class="location-info-list ul-li-block clearfix">
                                    <span class="area-name">News And Event </span>
                                    <ul>
                                        @foreach ($events as $item)
                                            <li>
                                                <a href="{{ route('newsEventDetails', $item->id) }}" style="display: flex;" class="image">
                                                <img style="width: 100px;padding-right:15px"
                                                    src="{{ asset($item->image) }}" alt="Image_not_found">
                                                    <div>
                                                        <p style="margin-bottom: 0px">{{ $item->title }} </p>
                                                        <p style="color:#ffbe30">{{$item->date}}</p>

                                                    </div>

                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- location-wrapper - end -->
                    </div>
                </div>
                <!-- sidebar-section - end -->

            </div>
        </div>
    </section>
    <!-- event-details-section - end
      ================================================== -->

@endsection

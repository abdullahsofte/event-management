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
                                    <li class="breadcrumb-item active" aria-current="page">News And Event</li>
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


    <!-- about-section - start
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
                                                            <a href="{{ route('newsEventDetails', $item->id) }}" class="tickets-details-btn">View More</a>
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
                
            </section>
    <!-- about-section - end
                  ================================================== -->

@endsection

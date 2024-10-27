@extends('layouts.website')
@section('title', 'Photo Gallery')
@section('website-content')

    <!-- breadcrumb-section - start
      ================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">
        <div class="jarallax" style="background-image: url({{asset('website/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12 col-sm-12">

                        
                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Photo gallery</li>
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

    <!-- event-gallery-section - start
      ================================================== -->
    <section id="event-gallery-section" class="event-gallery-section sec-ptb-50 clearfix">
        <div class="container">
            <div class="section-title text-center mb-30">
                <h2 class="big-title">Our  <strong>Photo Gallery</strong></h2>
            </div>

            <div class="grid zoom-gallery clearfix mb-30"
                data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
                @foreach ($galleris as $item)
                    <div class="grid-item photo-gallery " data-category="photo-gallery">
                        <a class="popup-link" href="{{ asset($item->image) }}">
                            <img src="{{ asset($item->image) }}" alt="Image_not_found">
                        </a>
                        <div class="item-content">
                            <h3>{{ $item->title }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- event-gallery-section - end
      ================================================== -->

@endsection

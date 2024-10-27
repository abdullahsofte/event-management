@extends('layouts.website')
@section('title', 'Photo Gallery')
@section('website-content')


    <!-- Inner-Intro -->
    <div class="banner banner-static">
        <div class="container">
            <div class="content row">
                <div class="imagebg">
                    <img src="{{asset($content->company_image)}}" alt="">
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- Gallery -->

    <!-- Project Section -->
    <div class="section section-projects section-pad">
        <div class="container">
            <div class="content row">

                <div class="wide-sm text-center">
                    <h1>Video Gallery</h1>
                </div>
                <!-- Project Gallery - Filter Menu -->
                <div class="clear"></div>
                <!-- Gallery -->
                <div class="feature-row feature-service-row row feature-s5">
                    @foreach ($videos as $video)
                        <div class="col-sm-4 col-xs-12 even">
                            <!-- Feature box -->
                            <div class="feature boxed">

                                <iframe width="100%" height="315" src="{{ $video->youtube_link }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                                <h3 class="title center">{{ $video->title }}</h3>

                            </div>
                            <!-- End Feature box -->
                        </div>
                    @endforeach


                </div>
                <!-- Project Gallery #end -->

            </div>
        </div>
    </div>
    <!-- End Project section -->
@endsection

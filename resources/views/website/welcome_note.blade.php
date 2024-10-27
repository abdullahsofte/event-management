@extends('layouts.website')
@section('title', 'Welcome Note')
@section('website-content')


    <!-- Inner-Intro -->
    <div id="inner_header">
        {{-- <div class="container">
    	<div class="inner_intro">
			<nav class="breadcrumb">
              <ul>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Welcome Note</li>
              </ul>
            </nav>
            <h1>{{ $content->welcome_title}}</h1>
        </div>
    </div> --}}
    </div>
    <!-- /Inner-Intro -->




    <!-- About-us -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-12">
                    <div class="about_img">
                        <img src="{{ asset($content->welcome_image) }}" alt="image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_company">
                        <h3>{{ $content->welcome_title }}</h3>
                        <div>
                            {!! $content->welcome_note !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /About-us -->


@endsection

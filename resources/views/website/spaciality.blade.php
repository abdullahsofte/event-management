@extends('layouts.website')
@section('title', 'Our Speciality')
@section('website-content')


    <!-- Inner-Intro -->
<div id="inner_header">
	<div class="container">
    	<div class="inner_intro">
			<nav class="breadcrumb">
              <ul>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Our Speciality</li>
              </ul>
            </nav>
            <h1>Our Speciality</h1>
        </div>
    </div>
</div>
<!-- /Inner-Intro -->



<!-- About-us -->
<div class="section-padding">
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
            	<div class="about_company">
                	<h3> {{ $content->refund_title}}</h3>
                   <div style="text-align: justify">
                    {!! $content->refund_details !!}
                   </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /About-us -->


@endsection

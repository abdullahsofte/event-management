@extends('layouts.website')
@section('title', 'Company Information')
@section('website-content')


    <!-- Inner-Intro -->
<div id="inner_header">
	<div class="container">
    	<div class="inner_intro">
			<nav class="breadcrumb">
              <ul>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Company Information</li>
              </ul>
            </nav>
            <h1>Company Information</h1>
        </div>
    </div>
</div>
<!-- /Inner-Intro -->




<!-- About-us -->
<div class="section-padding">
	<div class="container">
    	<div class="row">
        	<div class="col-md-6 order-md-12">
            	<div class="about_img">
					<img src="{{asset($content->company_image)}}" alt="image">
                </div>
            </div>
            <div class="col-md-6">
            	<div class="about_company">
                	<h3>{{ $content->company_title}}</h3>
                  <div style="text-align: justify">
                    {!! $content->company_description!!}
                  </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /About-us -->


@endsection

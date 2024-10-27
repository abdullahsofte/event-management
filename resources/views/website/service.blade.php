@extends('layouts.website')
@section('title', 'Service')
@section('website-content')
	
    
    <!-- Banner -->
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
<!-- Service Section -->
<div class="section section-services section-pad">
    <div class="container">
        <div class="content row">
            
            <div class="wide-md center">
                <h2 class="heading-section">Our Services</h2>
           </div>
            <!-- Feature Row  -->
            <div class="feature-row feature-service-row row">
                @foreach ($services as $item )
                    
                <div class="col-md-4 col-sm-6">
                    <!-- feature box -->
                    <div class="feature boxed">
                        <a href="{{route('service.details', $item->id)}}">
                            <div class="fbox-photo">
                                <img src="{{$item->image}}" alt="">
                            </div>
                        </a>
                        <div class="fbox-content">
                            <h3><a href="{{route('service.details', $item->id)}}">{{$item->title}}</a></h3>
                            <p>{{$item->short_details}}</p>
                            <p><a href="{{route('service.details', $item->id)}}" class="btn-link">Learn More</a></p>
                        </div>
                    </div>
                    <!-- End Feature box -->
                </div>
                @endforeach
             
            </div>
            <!-- Feture Row  #end -->

        </div>
    </div>
</div>
<!-- End Section -->

@endsection
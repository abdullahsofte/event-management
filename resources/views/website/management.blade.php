@extends('layouts.website')
@section('title', 'Management')
@section('website-content')


   <!-- Inner-Intro -->
<div id="inner_header">
	<div class="container">
    	<div class="inner_intro">
			<nav class="breadcrumb">
              <ul>
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Management</li>
              </ul>
            </nav>
            <h1>Our Management</h1>
        </div>
    </div>
</div>
<!-- /Inner-Intro -->

<!-- Team -->
<div class="section-padding">
	<div class="container">
    	<div class="row">
            @foreach ($management as $item)
                
        	<div class="col-lg-3 col-sm-6">
            	<div class="team_wp">
                	<div class="team_img">
                    	<img src="{{asset($item->image)}}" alt="image">
                        <div class="hover_wp">
                        </div>
                    </div>
                    <h6>{{$item->name}}</h6>
                    <p class="member_post">{{ $item->designation }}</p>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
</div>
<!-- /Team -->

@endsection

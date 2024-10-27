@extends('layouts.website')
@section('title', 'Client List')
@section('website-content')


    <!-- Inner-Intro -->
<div id="inner_header">
	<div class="container">
    	<div class="inner_intro">
			<nav class="breadcrumb">
              <ul>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Client List</li>
              </ul>
            </nav>
            <h1>Client List</h1>
        </div>
    </div>
</div>
<!-- /Inner-Intro -->


<!-- gallery -->
<div class="section-padding">
    <div class="container">
        <div class="row">
            @foreach ($client as $item)
                
            <div class="col-md-2">
                <div class="portfolio_wp" style="border: 1px solid;padding:5px">
                    <div class="portfolio_img">
                        <a  href="#">
                            <img src="{{asset($item->image)}}" alt="{{$item->name}}" style="width: 100%; height:120px"/>
                          </a>
                          <h4 class="client-title">{{$item->name}}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
</div>
<!-- /gallery -->

@endsection

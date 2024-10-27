@extends('layouts.website')
@section('title', 'Retune Policy')
@section('website-content')
  <!-- Start of Page Header -->
  <div class="page-header" style="height: 180px; " >
    <div class="container">
        <h1 class="page-title mb-0">Return Policy</h1>
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a> ></li>
            <li>Return Policy</li>
        </ul>
    </div>
</div>
<!-- End of Page Header -->

 <!-- aboutus-sectio start-->
 <section>
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-title">
                    <h4> Returns & Exchanges Policy</h4>
                </div>
                <div class="about-us">
                    {!!$content->return_policy!!}
                    
                </div>
             
            </div>
        </div>
    </div>
</section>
<!--aboutus-sectio end-->


@endsection
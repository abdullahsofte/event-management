@extends('layouts.website')
@section('title', 'Product Details')

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
	<!-- Content -->
	<div class="section section-contents section-products single-product section-pad">
	    <div class="container">
	        <div class="content row">

	        	<div class="products-details row">
	        		<div class="col-md-7 res-m-bttm">
                    
                    <p><img alt="" src="{{asset($product->image)}}" style="width:100%"></p>
                   
					
					</div>

					<!-- Sidebar -->
					<div class="col-md-5">
						<div class="sidebar-right">

							<div class="wgs-box wgs-menus">
                        <h1>{{$product->name}}</h1>
                        <p><Strong>Code : </Strong>{{$product->code}}</p>
                        <p><Strong>Price : </Strong> &#2547 {{$product->price}}</p>
                        <p><Strong>Category : </Strong> {{$product->category->name}}</p>
                        <div style="text-align: justify">

                           {!! $product->short_details!!}
                        </div>
                       
							</div>
							

						</div>
					</div>
					<!-- Sidebar #end -->
	        	</div>
	        	<div class="products-details row">
	        		<div class="col-md-12 res-m-bttm" style="text-align: justify;margin-top:20px">
                    {!! $product->description!!}
					</div>

					
	        	</div>

	        </div>
	    </div>
	</div>
	<!-- End Content -->
@endsection



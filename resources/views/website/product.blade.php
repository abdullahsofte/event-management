@extends('layouts.website')
@section('title', 'Products')
<style>
	.product-title {
		height: 40px;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2; 
		-webkit-box-orient: vertical;
		white-space: normal;
		margin-bottom: 15px;
	}
	
	</style>
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
	<div class="section section-contents section-products section-pad">
	    <div class="container">
	        <div class="content row">
				
		        	<div class="wide-md center">
						<h1>Our Products</h1>
					</div>
					<div class="gallery gallery-products with-caption hover-fade center mgfix">
						<ul class="photos-list col-x4">
                     @foreach ($product as $item )
                        
							<li>
								<div class="photo">
									<img src="{{asset($item->image)}}" alt="">
									<div class="photo-link">
										<span class="links">
											<a class="btn more-link" href="{{route('product.detail', $item->slug)}}">View Product</a>
										</span>
									</div>
								</div>
								<div class="photo-caption" style="text-align: left">
									<a href="{{route('product.detail', $item->slug)}}">
										<h4 class="product-title">{{$item->name}}</h4>
										<p><Strong>&#2547 {{$item->price}}</Strong></p>
									</a>
								</div>
							</li>
                     @endforeach
						
						</ul>
					</div>
					<!-- End Products -->
	        </div>
	    </div>
	</div>
	<!-- End Content -->

@endsection
     
       
    
   
        
            
       

       
       
        
            
                
                    
              
            
        
    
    
       
        
       

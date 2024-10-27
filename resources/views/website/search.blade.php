@extends('layouts.website')
@section('title', 'Search Result')
@section('website-content')

     <!-- Subheader -->
     <div id="inner_header">
        <div class="container">
           <div class="inner_intro">
              <nav class="breadcrumb">
                 <ul>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Search Result</li>
                 </ul>
              </nav>
              <h1>Search Result</h1>
           </div>
        </div>
     </div>
     <!-- /Subheader -->
     <!-- Blog -->
     <div class="section-padding pb-0">
        <div class="container">
           <div class="row">
              <div class="col-12">
                
                @if (count($product) > 0)
                <div class="row">

                    @foreach ($product as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                       <div class="sigma_product style-6">
                          <div class="sigma_product-thumb">
                             <a href="{{ route('product.detail', $item->slug) }}">
                             <img src="{{asset($item->image)}}" alt="img" style="height:220px">
                             </a>
                             {{-- <div class="sigma_product-badge">
                                <span class="sale">Sale</span>
                               
                             </div> --}}
                          </div>
                          <div class="sigma_product-body">
                             <h5 class="sigma_product-title">
                                <a href="{{ route('product.detail', $item->slug) }}">{{ $item->name}}</a>
                             </h5>
                             <div class="sigma_product-price">
                              <a href="{{ route('product.detail', $item->slug) }}" class="btn view-btn ">View</a>
                             </div>
                          </div>
                       </div>
                    </div>
                    @endforeach
                     
                   </div>
                @else
                    <h3 style="text-align: center;color:red">Nothing Found</h3>
                @endif
               
             
              </div>
           </div>
        </div>
     </div>
     <!-- /Blog -->

@endsection
     
       
    
   
        
            
       

       
       
        
            
                
                    
              
            
        
    
    
       
        
       

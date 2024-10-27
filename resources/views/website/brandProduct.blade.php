@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/product.css">
@endpush
@section('website-content')
 <!-- Start of Page Header -->

 <div class="bn-top ">
    <div class="container_img_bread no-img ">
        <p><img class="img-responsive" src="{{asset('website/images/bn-top.jpg')}}"
                alt="" /></p>

        <nav data-depth="1" class="breadcrumb hidden-sm-down">
            <ol itemscope itemtype="">

                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="{{route('home')}}">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope itemtype="">
                    <a itemprop="item" href="">
                        <span itemprop="name">Products</span>
                    </a>
                    <meta itemprop="position" content="1">
                </li>

            </ol>

        </nav>

    </div>
</div>

<aside id="notifications">
    <div class="container">
    </div>
</aside>
<section id="wrapper" class="active_grid">
    <h2 style="display:none !important">.</h2>

    <div class="container">
        <div class="row">
           

            <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-12">

                <section id="main">
                    <h2 class="h2">Brand products</h2>
                    <section id="products">
                        <div id="" class="hidden-sm-down">
                        </div>
                        <div id="">

                            <div id="js-product-list-top" class="products-selection">
                                <div class="click-product-list-grid">
                                    <div class="click-product-grid"><i class="fa fa-th"></i></div>
                                    <div class="click-product-list"><i class="fa fa-align-justify"></i></div>
                                </div>
                             
                                {{-- <div class="box-sort-by">

                                    <span class="sort-by">Sort by:</span>
                                    <div class="products-sort-order dropdown">
                                        <div class="sorting-price">
                                            <select name="sort" id="sorting-select" class="sort-form" >
                                                <option value="1">Price:High to Low</option>
                                                <option value="2">Price:Low to High</option>
                                            </select>
                                        </div>
                                    </div>

                                </div> --}}
                            </div>

                        </div>

                        <div id="">
                            <div id="js-product-list">
                                <div class="products horizontal_mode">
                                    <div id="box-product-grid">
                                        <div class="row">

                                           @foreach ($brand_product as $item)
                                           <div class="item col-xs-12 col-sm-6 col-md-3">
                                            <div class="item-inner">
                                                <div class="product-miniature js-product-miniature"
                                                    data-id-product="12" data-id-product-attribute="78"
                                                    itemscope itemtype="">
                                                    <div class="left-product">
                                                        <a href="{{route('single.product', $item->slug)}}"
                                                            class="thumbnail product-thumbnail hover15">
                                                            <span class="cover_image">
                                                                <img src="{{asset($item->image)}}"
                                                                    data-full-size-image-url="{{asset($item->image)}}"
                                                                    alt="" width="270" height="270">
                                                            </span>
                                                       
                                                        </a>
                                                        <div class="button-container">
                                                            <div class="button-action">
                                                                <div class="bottom_cart">
                                                                    <form action=""
                                                                        method="post">
                                                                        <input type="hidden" name="token"
                                                                            value="220aa176c8a6aede490f7874c4e9d51b">
                                                                        <input type="hidden"
                                                                            name="id_product" value="12">
                                                                        <button class="add-to-cart"
                                                                            data-button-action="add-to-cart" onclick="addCartAjax({{$item->id}})"
                                                                            type="submit">
                                                                            add to cart
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                             
                                                            
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="right-product">
                                                        <div class="product-description">

                                                            <div class="product_name"><a href="{{route('product.detail', $item->slug)}}">{{$item->name}}</a></div>
                                                            <div class="product-price-and-shipping">
                                                                <span class="price">৳ {{$item->price}}</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                           @endforeach


                                        </div>
                                    </div>
                                    <div id="box-product-list">
                                      @foreach ($brand_product as $item)
                                      <div class="item-product-list">
                                        <div class="js-product-miniature" data-id-product="12"
                                            data-id-product-attribute="78" itemscope
                                            itemtype="">
                                            <div class="left-product">
                                                <a href="{{route('single.product', $item->slug)}}"
                                                    class="thumbnail product-thumbnail hover15">
                                                    <span class="cover_image">
                                                        <img class="img-responsive"
                                                            src="{{asset($item->image)}}"
                                                            data-full-size-image-url="{{asset($item->image)}}"
                                                            alt="" width="530" height="530">
                                                    </span>
                                                

                                                </a>
                                            </div>
                                            <div class="right-product">
                                                <div class="description-product">
                                                    <div class="product_name"><a
                                                            href="{{route('single.product', $item->slug)}}">{{$item->name}}</a></div>
                                                    <div class="product-price-and-shipping">

                                                        <span class="price">{{$item->price}}</span>

                                                    </div>
                                                </div>
                                                <div class="decriptions-short">
                                                    <p>{!!$item->short_details!!}</p>
                                                </div>
                                              
                                                <div class="button-action">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="token"  value="220aa176c8a6aede490f7874c4e9d51b">
                                                        <input type="hidden" name="id_product" value="12">
                                                        <button class="add-to-cart" data-button-action="add-to-cart" onclick="addCartAjax({{$item->id}})"  type="submit">
                                                            Add to cart

                                                        </button>
                                                    </form>

                                              
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                      @endforeach
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".click-product-grid").click(function (e) {
                                            $("#wrapper").removeClass("active_list");
                                            $("#wrapper").addClass("active_grid");
                                            setCookie('status_list_product', 'active_grid', 1);
                                        });
                                        $(".click-product-list").click(function (e) {
                                            $("#wrapper").removeClass("active_grid");
                                            $("#wrapper").addClass("active_list");
                                            setCookie('status_list_product', 'active_list', 1);
                                        });
                                        if (getCookie('status_list_product') !== "" && getCookie('status_list_product') !== "active_grid") {
                                            $("#wrapper").removeClass("active_grid");
                                            $("#wrapper").addClass("active_list");
                                        }
                                    });

                                    function setCookie(cname, cvalue, exdays) {
                                        var d = new Date();
                                        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                                        var expires = "expires=" + d.toUTCString();
                                        document.cookie = cname + "=" + cvalue + "; " + expires;
                                    }
                                    function getCookie(cname) {
                                        var name = cname + "=";
                                        var ca = document.cookie.split(';');
                                        for (var i = 0; i < ca.length; i++) {
                                            var c = ca[i];
                                            while (c.charAt(0) == ' ') c = c.substring(1);
                                            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
                                        }
                                        return "";
                                    }
                                </script>
                            </div>
                        </div>
                        <div id="js-product-list-bottom">
                            <div id="js-product-list-bottom"></div>

                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
</section>

    @push('website-js')

        <script>
              $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $(document).ready(function() {
                $('.sort').on('click', function() {
                    $('.product-single-part').removeClass('col-md-3 col-12 height');
                    $('.product-single-part').addClass('col-md-9 col-12 product-unsort w-100');
                    $('.product-part-middle').addClass('m-auto py-3');
                    $('.product-part-right').removeClass('position-absolute');
                })
                $('.unsort').on('click', function() {
                    $('.product-single-part').removeClass('col-md-9 col-12  product-unsort w-100 py-3');
                    $('.product-single-part').addClass('col-md-3 col-12 height');
                    $('.product-part-middle').removeClass('m-auto py-3');
                    $('.product-part-right').addClass('position-absolute');
                })
            });
        </script>

    {{-- <script>
        $(document).on('change','#sorting-select',function(e){
            e.preventDefault();
            $(this).val();
            var url = '/product-short-price/'+$(this).val();
                $.ajax({
                    url:url,
                    method:'get',
                    success: function(res){
                    }
                });
        })
    </script> --}}
    <script>
        $(document).ready(function(){
            $(".filter-form").on("change", ".sort-form", function(e){
                e.preventDefault();
                var data = $('.filter-form').serialize();
                var url = '{{route('product.sort')}}';
                // console.log(data);
                $.ajax({
                    url:url,
                    method:'get',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        $('#product-hide').hide();
                        var data = "";
                        $.each(res,function(key,value){
                            var route = '/product-details/'+value.slug;
                            // console.log(value.features);
                            data = data + '<div class="col-md-3 col-12 product-single-part height">'
                            data = data + ' <div class="single-part-left text-center mx-5 mt-3">'
                            data = data + '<a href="'+route+'"><img src="/'+value.image+'" alt=""></a>'
                            data = data + '</div>'
                            data = data + '<div class="product-part-middle ms-0">'
                            data = data + '<a href="'+route+'" class="text-decoration-none text-black">'
                            data = data + ' <h5 class="text-center">'+value.name+'</h5>'
                            data = data + ' </a>'
                            data = data + '<p> '+value.model+'</p>'
                            data = data + '<p class="key">Key Features</p>'
                            data = data + ' <div class="product-part-key_feature">'
                            data = data + '<ul>'
                                $.each(value.features,function(key2,value2){
                                    data = data + '<li>'+value2.name+' </li>'
                                })
                           
                            data = data + ' </ul>'
                            data = data + ' </div> </div>'
                            data = data + '<div class="product-part-right text-center ms-auto position-absolute bottom-0">'
                            data = data + ' <h5> ৳ '+value.price+'</h5>'
                           
                            data = data + ' <a href="javascript:void();" class="btn btn-buy"  onclick="addCartAjax('+value.id+')">Add Cart</a>'
                            
                            
                           
                            data = data + ' <p class="text-center"><i class="fas fa-check"></i> in stock</p>'
                            data = data + ' </div></div>'
                        });
                        $('#main-product').html(data);
                        }
                });
                
            });
        });

    </script>
 
   

  
    @endpush
@endsection
     
       
    
   
        
            
       

       
       
        
            
                
                    
              
            
        
    
    
       
        
       

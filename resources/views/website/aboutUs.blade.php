@extends('layouts.website')
@section('title', 'About Us')
@section('website-content')

  	<!-- breadcrumb-section - start
		================================================== -->
		<section id="breadcrumb-section" class="breadcrumb-section clearfix">
			<div class="jarallax" style="background-image: url({{asset('website/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
				<div class="overlay-black">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-6 col-md-12 col-sm-12">

								<!-- breadcrumb-list - start -->
								<div class="breadcrumb-list">
									<ul>
										<li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">About us</li>
									</ul>
								</div>
								<!-- breadcrumb-list - end -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- breadcrumb-section - end
		================================================== -->


 <!-- about-section - start
          ================================================== -->
          <section id="about-section" class="about-section sec-ptb-50 clearfix">
            <div class="container">
                <div class="row">
                    <!-- section-title - start -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="section-title text-left mb-30">
                            <span class="line-style"></span>
                            <h2 class="big-title"> {{$content->about_title}}</h2>
                          
                            <div>
                                {!!$content->about_description!!}
                            </div>
                        </div>
                    </div>
                    <!-- section-title - end -->
                    <!-- about-item-wrapper - start -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-item-wrapper ul-li">
                           <img src="{{asset($content->about_image)}}" alt="">
                        </div>
                    </div>
                    <!-- about-item-wrapper - end -->

                </div>
            </div>
        </section>
        <!-- about-section - end
              ================================================== -->


@endsection

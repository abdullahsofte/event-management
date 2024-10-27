@extends('layouts.website')
@section('title', 'Product Details')
@section('website-content')
 
  <!-- Subheader -->
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
	<div class="section section-projects single-project section-pad">
		<div class="container">
			<div class="content row">

				<div class="project-info">
				
					<h1>OSAGE Bio Energy Plants</h1>
					<div class="row">
						<div class="col-md-6 col-sm-12 res-m-bttm">
							<p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit. Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt, pharetra eros nec, posuere odio. Nullam eget bibendum sem venenatis lacinia justom omnium urbanitas.</p>
							<p><strong>Consectetur ipsum</strong> dolor sit amet consectetur adipiscing elit. Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt pharetra eros nec posuere odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt, pharetra eros nec, posuere odio. Nullam eget bibendum sem, venenatis lacinia justo.</p>
							<p>Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Integer vel lorem tincidunt pharetra eros nec posuere odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pretium orci sit amet mi ullamcorper egestas. Sed non mattis metus. Nullam eget bibendum sem, venenatis lacinia justo.</p>
						</div>
						<div class="col-md-5 col-sm-12 col-md-offset-1">
							<h3>At a Glance</h3>
							<div class="table-responsive">
								<table class="table table-striped bdr-bottom">
									<tbody>
										<tr>
											<td><strong>Finish Date</strong></td>
											<td>15/12/2016</td>
										</tr>
										<tr>
											<td><strong>Clients</strong></td>
											<td>RJK Group Ltd</td>
										</tr>
										<tr>
											<td><strong>Architect</strong></td>
											<td>MJ Associates Architects</td>
										</tr>
										<tr>
											<td><strong>Location</strong></td>
											<td>Chesterfield County, VA</td>
										</tr>
										<tr>
											<td><strong>Surface Area</strong></td>
											<td>400 M2</td>
										</tr>
										<tr>
											<td><strong>Services Rendered</strong></td>
											<td>Environmental Services<br>
											Landscape Architecture<br>
											Site Selection &amp; Planning</td>
										</tr>
										<tr>
											<td><strong>Project Cost</strong></td>
											<td>$150,000</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="gaps size-md"></div>
					<div class="row">
						<div class="col-md-6 col-sm-12 res-m-bttm">
							<h3>Project Summary</h3>
							<p>Lorem ipsum dolor sit amet, mea cu omnium urbanitas, labitur volumus id eum. Ius ignota offendit similique et, sea dolorum vituperata ullamcorper et, justo insolens omittantur sit ne. Aliquip pertinax vix ad, ea eos euismod officiis. Utamur minimum repudiare quiex ignota.</p>
						</div>
						<div class="col-md-5 col-sm-12 col-md-offset-1">
							<h3>Final Results</h3>
							<p>Lorem ipsum dolor sit amet, mea cu omnium urbanitas labitur volumus eum. Ius ignota offendit similique et sea dolorum vituperata ullamcorper et, justo insolens omittantur sit ne. Aliquip pertinax vix ad, ea eos euismod officiis.</p>
						</div>
					</div>
				</div>
				<hr>
				
			</div>
		</div>
	</div>
	<!-- End Content -->

	<!-- Project Section @Related -->
	<div class="section section-projects recent-project section-pad bg-light">
	    <div class="container">
	        <div class="content row">

				<h3 class="heading-section">Related Projects</h3>
	        	<!-- Projects/Feature Row  -->
				<div class="feature-row feature-project-row mgfix">
					<div class="owl-carousel loop has-carousel" data-items="4" data-navs="true">
						<div class="even">
							<!-- featured box  -->
							<div class="feature feature-project boxed">
								<a href="project-single.html">
									<div class="fbox-photo">
										<img src="{{asset('website/image/work-sm-a.jpg')}}" alt="">
									</div>
								</a>
								<div class="fbox-content">
									<h3><a href="project-single.html">Altria Warehouse Complex</a></h3>
								</div>
							</div>
							<!-- End -->
						</div>
						<div class="odd">
							<!-- featured box -->
							<div class="feature feature-project boxed">
								<a href="project-single.html">
									<div class="fbox-photo">
										<img src="{{asset('website/image/work-sm-c.jpg')}}" alt="">
									</div>
								</a>
								<div class="fbox-content">
									<h3><a href="project-single.html">Apollo Hill Project</a></h3>
								</div>
							</div>
							<!-- End -->
						</div>
						<div class="even">
							<!-- featured box -->
							<div class="feature feature-project boxed">
								<a href="project-single.html">
									<div class="fbox-photo">
										<img src="{{asset('website/image/work-sm-b.jpg')}}" alt="">
									</div>
								</a>
								<div class="fbox-content">
									<h3><a href="project-single.html">Balko Wind Power</a></h3>
								</div>
							</div>
							<!-- End -->
						</div>
						<div class="odd">
							<!-- featured box -->
							<div class="feature feature-project boxed">
								<a href="project-single.html">
									<div class="fbox-photo">
										<img src="{{asset('website/image/work-sm-e.jpg')}}" alt="">
									</div>
								</a>
								<div class="fbox-content">
									<h3><a href="project-single.html">Rocky Forge Refinary</a></h3>
								</div>
							</div>
							<!-- End -->
						</div>
						<div class="odd">
							<!-- featured box -->
							<div class="feature feature-project boxed">
								<a href="project-single.html">
									<div class="fbox-photo">
										<img src="{{asset('website/image/work-sm-f.jpg')}}" alt="">
									</div>
								</a>
								<div class="fbox-content">
									<h3><a href="project-single.html">Mingo Village Mining</a></h3>
								</div>
							</div>
							<!-- End -->
						</div>
					</div>
				</div>
				<!-- Projects/Feature Row  #end -->

	        </div>
	    </div>
	</div>
@endsection

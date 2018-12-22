@extends('customer.layout')


@section('customer')

	<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	

											@foreach ($p as $p)											
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>
														<p><a href="{{route('customer.product_details', [$p->pro_det_id])}}"><img src="{{ asset($p->picture) }}" style="max-height: 100px; max-width: 150px;"  alt="picture not available" /></a></p>
														<a href="{{route('customer.product_details', [$p->pro_det_id])}}" class="title">{{$p->product_name}}</a><br/>
														<a href="{{route('customer.product_details', [$p->pro_det_id])}}" class="category">{{$p->writing}}</a>
														<p class="price">{{$p->price}}</p>
													</div>
												</li>
											@endforeach
												
																																													
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-2" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">												
												@foreach ($pl as $pl)											
													<li class="span3">
														<div class="product-box">
															<span class="sale_tag"></span>
															<p><a href="{{route('customer.product_details', [$pl->pro_det_id])}}"><img src="{{ asset($pl->picture) }}" style="max-height: 100px; max-width: 150px;"  alt="picture not available" /></a></p>
															<a href="{{route('customer.product_details', [$pl->pro_det_id])}}" class="title">{{$pl->product_name}}</a><br/>
															<a href="{{route('customer.product_details', [$pl->pro_det_id])}}" class="category">{{$pl->writing}}</a>
															<p class="price">{{$pl->price}}</p>
														</div>
													</li>
												@endforeach
												
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
																																											
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="themes/images/feature_img_2.png" alt="" />
										<h4>MODERN <strong>DESIGN</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="themes/images/feature_img_1.png" alt="" />
										<h4>FREE <strong>SHIPPING</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="themes/images/feature_img_3.png" alt="" />
										<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
			</section> 

			


			@endsection




@section('topbar')

	<section class="navbar main-menu">
				<div class="navbar-inner main-menu" >				
					<a href="{{route('customer.index')}}" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul class="dd">
							@foreach($c as $c)
							<li class="ss"><a class="{{$c->id}}" id="s" href="{{route('products.view', [$c->id])}}">{{$c->cat_name}}</a></li>																
							@endforeach
						</ul>
					</nav>
				</div>
	</section>

			

	@endsection
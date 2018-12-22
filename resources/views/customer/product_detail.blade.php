@extends('customer.layout')


@section('customer')
		<div id="wrapper" class="container">
			
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Product Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<link href="{{ asset($pd[0]->picture) }}" class="thumbnail" data-fancybox-group="group1" title="Description 1" rel="stylesheet"/>
								<a href="{{ asset($pd[0]->picture) }}"" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{{ asset($pd[0]->picture) }}"></a>												
								<ul class="thumbnails small">								
									<li class="span1">
										<a href="themes/images/ladies/2.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="themes/images/ladies/2.jpg" alt=""></a>
									</li>								
									<li class="span1">
										<a href="themes/images/ladies/3.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="themes/images/ladies/3.jpg" alt=""></a>
									</li>													
									<li class="span1">
										<a href="themes/images/ladies/4.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="themes/images/ladies/4.jpg" alt=""></a>
									</li>
									<li class="span1">
										<a href="themes/images/ladies/5.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="themes/images/ladies/5.jpg" alt=""></a>
									</li>
								</ul>
							</div>
							<form class="form-inline" method="post" name="buy">

								<input type="hidden" value="{{$pd[0]->pro_det_id}}" name="pro_det_id">

								{{csrf_field()}}
							<div class="span5">
								<address>
									<strong>Brand:</strong> <span>{{$pd[0]->man_name}}</span><br>
									<strong>Made In:</strong> <span>{{$pd[0]->made_in}}</span><br>
									<strong>Discount:</strong> <span>{{$pd[0]->discount}} %</span><br>
									@if( $pd[0]->quantity>0)
									<strong>Availability:</strong> <span>Available</span><br>
									@elseif ($pd[0]->quantity <= 0)	
									<strong>Availability:</strong> <span>Unavailable</span><br>
									@endif							
								</address>									
								<h4><strong>Price: {{$pd[0]->price-($pd[0]->price*($pd[0]->discount/100))}}$</strong> after {{$pd[0]->discount}}% discount</h4>
								<input type="hidden" value="{{$pd[0]->price-($pd[0]->price*($pd[0]->discount/100))}}" name="price">
								<input type="hidden" value="{{$pd[0]->picture }}" name="picture">
							</div>
							<div class="span5">
								
									
									<p>&nbsp;</p>
									<label>Qty:</label>
									<input type="number" name="quantity" class="span1" value=1 placeholder="1" min="1" max="{{$pd[0]->quantity}}">
									@if(Session::has('loggedCustomer'))
										<button class="btn btn-inverse" type="submit">Add to cart</button>
									@else
										<h3>Please log in to buy</h3>

									@endif
									
									
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home">{{$pd[0]->writing}}</div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Size</th>
													<td>Large, Medium, Small, X-Large</td>
												</tr>		
												<tr class="alt">
													<th>Colour</th>
													<td>Orange, Yellow</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>						
							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails listing-products">
												@foreach($relp as $r)
												<li class="span3">
													
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="{{ asset($r->picture) }}"></a><br/>
														<a href="product_detail.html" class="title">{{$r->pro_name}}</a><br/>
												
														<p class="price">{{$r->price}}</p>
													</div>
													
												</li>
												@endforeach
											      
																								
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails listing-products">
												
												<li class="span3">
													@foreach($relp as $r)
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="{{ asset($r->picture) }}"></a><br/>
														<a href="product_detail.html" class="title">{{$r->pro_name}}</a><br/>
												
														<p class="price">{{$r->price}}</p>
													</div>
													@endforeach
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">SUB CATEGORIES</li>
								@foreach($sc as $sc)
								<li><a href="#">{{$sc->sub_cat_name}}</a></li>
								@endforeach
							</ul>
							<br/>
							<ul class="nav nav-list below">
								<li class="nav-header">MANUFACTURES</li>
								@foreach($man as $man)
								<li><a href="#">{{$man->man_name}}</a></li>
								@endforeach
							</ul>
						</div>
						
						</div>
						
					</div>
				
			</section>			
@endsection
@extends('customer.layout')


@section('customer')


<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Products with <strong>Catagory</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	

											@if(count($pd)>0)

											@foreach ($pd as $p)											
												<li class="span3">
													<div class="product-box">
														<p>Sub Catagory: <b>{{$p->sub_cat_name}}</b></p><br/>
														<span class="sale_tag"></span>
														<p><a href="{{route('customer.product_details', [$p->pro_det_id])}}"><img src="{{ asset($p->picture) }}" style="max-height: 100px; max-width: 150px;"  alt="picture not available" /></a></p>
														<a href="{{route('customer.product_details', [$p->pro_det_id])}}" class="title">{{$p->product_name}}</a><br/>

														<a href="{{route('customer.product_details', [$p->pro_det_id])}}" class="category">{{$p->writing}}</a>
														<p class="price">{{$p->price}}</p>
													</div>
												</li>
											@endforeach
											
											@else	
											<h2>&nbsp;&nbsp; No Products available in this catagory</h2><br>
											@endif	

											
												
																																													
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
					</div>
						<br/>





@endsection
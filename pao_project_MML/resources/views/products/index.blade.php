@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
	<div class="container">
        <div class="bs-docs-section">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-9">
                    <div class="form-group">
						<div class="search">
							<input id="search_bar" style="width: 65%;" name="search_bar" placeholder="Search term">
							
							<button type="submit" id="search_icon">
								<i class="fa fa-search"></i>
							</button>
							
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div id="all_products">
		@foreach($products as $product)
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<div class="db-wrapper">
					<div class="db-pricing-eleven db-bk-color-one">
					
						<div class="price">
							<sup>€</sup>{{$product->price}}
						</div>
						
						<div class="type">
							{{$product->name}}
						</div>
						
						<ul>
							<li><i class="fa">&#xf2b4;</i>{{$product->brand}}</li>
							<li><i class="material-icons">&#xe23a;</i>{{$product->color}}</li>
							
							@if (!Auth::guest())
								@if (Auth::user()->rank >= 1)
									<li><a href="product/edit/{{$product->id}}" class="glyphicon glyphicon-pencil"></a></li>
								@endif
								
								@if (Auth::user()->rank >= 2)
									<li>
										<form action="delete/product/{{$product->id}}" method="post">
											{{method_field('DELETE')}}
											{{csrf_field()}}
										
											<button type="submit" class="btn btn-danger">
												X
											</button>
										</form>
									</li>
								@endif
							@endif
						</ul>
						
						<div class="pricing-footer">
							<a href="product/get/{{$product->id}}" class="btn btn-primary"><i class="material-icons">&#xe8cc;</i> <b>CART</b></a>
						</div>
						
						<div class="cards">
							<i style="font-size:24px" class="fa">&#xf1f3;</i> 
							<i style="font-size:24px" class="fa">&#xf1f2;</i> 
							<i style="font-size:24px" class="fa">&#xf1f4;</i> 
							<i style="font-size:24px" class="fa">&#xf1f0;</i>
						</div>
					</div>
				</div>
			</div>
		
		@endforeach
		</div>
		
	</div>
	
	@if (!Auth::guest())
		@if (Auth::user()->rank >= 1)
			<div class="form-group">
				<div class="col-md-8 col-md-offset-0">
					<a href="product/new">
						<button type="submit" class="btn btn-primary">
							Toevoegen
						</button>
					</a>
				</div>
			</div>
		@endif
	@endif
	
	<div class="col-lg-4 col-lg-offset-5">
		<a href="{{$products->previousPageUrl()}}">
			<button><i style="font-size:24px" class="fa fa-arrow-left"></i></button>
		</a>
		
		<a href="{{$products->nextPageUrl()}}">
			<button><i style="font-size:24px" class="fa fa-arrow-right"></i></button>
		</a>
	</div>
	
</div>

<script>
$(document).ready(function()
{
	$("#search_icon").click(function()
	{
		$.ajax
		({
			type: "GET",
			url: 'product_search',
			data: {'search': $('#search_bar').val()},
			
			success: function (result)
			{
				$('#all_products').empty();
				
				$.each(result, function()
				{
					$('#all_products').append(
						$('<div>').attr('class', "col-xs-12 col-sm-3 col-md-3 col-lg-3").append(
							$('<div>').attr('class', "db-wrapper").append(
								$('<div>').attr('class', "db-pricing-eleven db-bk-color-one").append(
								
									$('<div>').attr('class', "price").append(
										$('<sup>').html('€' + this.price)
									),
									
									$('<div>').attr('class', "type").append(
										$('<span>').html(this.name)
									),
									
									$('<ul>').append(
										$('<li>').append(
											$('<i>').attr('class', "fa").html('&#xf2b4;'),
											$('<span>').html(this.brand)
										),
										
										$('<li>').append(
											$('<i>').attr('class', "material-icons").html('&#xe23a;'),
											$('<span>').html(this.color)
										)
									),
									
									$('<div>').attr('class', "pricing-footer").append(
										$('<a>').attr('href', "product/get/" + this.id).attr('class', "btn btn-primary").append(
											$('<i>').attr('class', "material-icons").html('&#xe8cc;'),
											
											$('<b>').html("CART")
										)
									),
									
									$('<div>').attr('class', "cards").append(
										$('<i>').attr('class', "fa").css({"font-size": '24px', "padding-right": '7px'}).html('&#xf1f3;'),
										$('<i>').attr('class', "fa").css({"font-size": '24px', "padding-right": '7px'}).html('&#xf1f2;'),
										$('<i>').attr('class', "fa").css({"font-size": '24px', "padding-right": '7px'}).html('&#xf1f4;'),
										$('<i>').attr('class', "fa").css({"font-size": '24px', "padding-right": '7px'}).html('&#xf1f0;')
									)
									
									
								)
							)
						)
					);
				});
			},
		});
	});
	
	$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
});
</script>
@endsection

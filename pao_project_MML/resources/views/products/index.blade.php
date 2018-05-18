@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
</div>
@endsection

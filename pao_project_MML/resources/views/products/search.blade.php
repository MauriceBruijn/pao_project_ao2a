@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
	<div class="container">
        <div class="bs-docs-section">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-9">
                    <div class="form-group">
						<div class="search">
							<span class="fa fa-search"></span>
							<input id="search_bar" name="search_bar" placeholder="Search term">
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</div>


@endsection

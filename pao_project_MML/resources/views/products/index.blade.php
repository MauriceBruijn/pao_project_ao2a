@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    
					<div class="products">
						@foreach($products as $product)
							<div class="product">
								<div class="products_title">
									<div><a href="product/get/{{$product->id}}">{{$product->name}}</a></div>
								</div>

								<div class="product_image">
									<img src="https://sloanreview.mit.edu/content/uploads/2017/08/MAG-FR-Oestreicher-Singer-Product-Recommendation-Viral-Marketing-Social-Media-Network-Ecommerce-1200-1200x627.jpg" alt="Mountain View" width="200" height="200">
								</div>

								<div class="product_info">
									<div class="product_code">Product nr. {{$product->id}}</div>
									<hr/>
									<div class="product_details">{{$product->brand}}</div>
								</div>

								<div class="product_price">
									€ {{$product->price}}
								</div>
							</div>
							
							<div>
								@if (Auth::user()->rank >= 1)
									<span class="col-md-0 col-md-offset-10">
										<a href="product/edit/{{$product->id}}" style="top:30px;" class="glyphicon glyphicon-pencil"></a>
									</span>
								@endif
								@if (Auth::user()->rank >= 2)
									<form action="delete/product/{{$product->id}}" method="post">
										{{method_field('DELETE')}}
										{{csrf_field()}}
										
										<div class="col-md-0 col-md-offset-11">
											<button type="submit" class="btn btn-danger">
												X
											</button>
										</div>
									</form>
								@endif
							</div>
							
							<hr/>
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
			</div>
		</div>
	</div>
</div>
@endsection

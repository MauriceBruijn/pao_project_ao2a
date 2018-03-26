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
									
									<div class="product_image">
										<img src="{{$product->img}}" alt="Mountain View" width="200" height="200"/>
									</div>
									
									<table class="table table-reflow table_product_details">
										<tr>
											<th>ID</th>
											<th>NAAM</th>
											<th>MERK</th>
											<th>€</th>
										</tr>
										
										<tr>
											<td>{{$product->id}}</td>
											<td>{{$product->name}}</td>
											<td>{{$product->brand}}</td>
											<td>{{$product->price}}</td>
										</tr>
									</table>
									
									<div class="form-group">
										<div class="col-md-8 col-md-offset-10">
											<a href="product/get/{{$product->id}}">
												<button type="submit" class="btn btn-primary">
													BEKIJKEN
												</button>
											</a>
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

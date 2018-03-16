@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="box_products">
						<div class="products_title"><i>PRODUCTEN</i></div>
						
						<table class="table table-reflow">
						<tr>
							<th>ID</th>
							<th>NAAM</th>
							<th>MERK</th>
							<th>KLEUR</th>
							<th>PRIJS</th>
							<th></th>
						</tr>
						@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td><a href="product/get/{{$product->id}}">{{$product->name}}</a></td>
							<td>{{$product->brand}}</td>
							<td>{{$product->color}}</td>
							<td>{{$product->price}}</td>
							
							<td>
								<form action="delete/product/{{$product->id}}" method="post">
								{{method_field('DELETE')}}
								{{csrf_field()}}
								
									<button type="submit" class="btn btn-danger">
										X
									</button>
								</form>
							</td>
							
						</tr>
						@endforeach
						</table>
						
					</div>
					
					<div class="form-group">
						<div class="col-md-8 col-md-offset-0">
							<a href="product/new">
								<button type="submit" class="btn btn-primary">
									Toevoegen
								</button>
							</a>
						</div>
					</div>
							
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

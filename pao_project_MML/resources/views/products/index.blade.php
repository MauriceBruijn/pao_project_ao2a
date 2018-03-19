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
							
							@if (Auth::user()->rank >= 1)
								<th></th>
								<th></th>
							@endif
						</tr>
						@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td><a href="product/get/{{$product->id}}">{{$product->name}}</a></td>
							<td>{{$product->brand}}</td>
							<td>{{$product->color}}</td>
							<td>{{$product->price}}</td>
						
						@if (Auth::user()->rank >= 1)
							<td>
								<a href="product/edit/{{$product->id}}" class="glyphicon glyphicon-pencil"></a>
							</td>
						@endif
							
						@if (Auth::user()->rank >= 2)
							<td>
								<form action="delete/product/{{$product->id}}" method="post">
								{{method_field('DELETE')}}
								{{csrf_field()}}
								
									<button type="submit" class="btn btn-danger">
										X
									</button>
								</form>
							</td>
						@endif
							
						</tr>
						@endforeach
						</table>
						
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="box_products">
						<div class="products_title"><i>PRODUCTEN</i><a href="product/add" class="glyphicon glyphicon-plus"></a></div>
						
						<table class="table table-reflow">
						<tr>
							<th>ID</th>
							<th>NAAM</th>
							<th>MERK</th>
							<th>KLEUR</th>
							<th>PRIJS</th>
						</tr>
						@foreach($products as $product)
						<tr>
							<td>{{$product->id}}</td>
							<td><a href="products/{{$product->id}}">{{$product->name}}</a></td>
							<td>{{$product->brand}}</td>
							<td>{{$product->color}}</td>
							<td>{{$product->price}}</td>
						</tr>
						@endforeach
						</table>
						
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div>
					@foreach($product as $value)
						<div class="product_title"><i>{{$value->name}}</i></div>
					@endforeach
						<table class="table table-reflow">
							<tr>
								<th>ID</th>
								<th>MERK</th>
								<th>KLEUR</th>
								<th>PRIJS</th>
							</tr>
						@foreach($product as $value)
							<tr>
								<td>{{$value->id}}</td>
								<td>{{$value->brand}}</td>
								<td>{{$value->color}}</td>
								<td>{{$value->price}}</td>
							</tr>
						</table>
							
							<ul class="list-group">
								<div class="product_title"><i>PRODUCT BESCHRIJVING</i></div>
								<li class="list-group-item">{{$value->description}}</li>
							</ul>
						@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><center>Product toevoegen</center></div>

                    <div class="panel-body">

                        <div class="box_products">

                            @foreach($products as $value)


                            <form method="post" action="{{url('/edit/'.$value->id)}}" class="form-horizontal">
                                {{method_field('PATCH')}}
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">NAAM</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" id="name" value="{{$value->name}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="brand" class="col-md-4 control-label">MERK</label>
                                    <div class="col-md-6">
                                        <input type="text" name="brand" class="form-control" id="brand" value="{{$value->brand}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="color" class="col-md-4 control-label">KLEUR</label>
                                    <div class="col-md-6">
                                        <input type="text" name="color" class="form-control" id="color" value="{{$value->color}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="col-md-4 control-label">PRIJS</label>
                                    <div class="col-md-6">
                                        <input type="text" name="price" class="form-control" id="price" value="{{$value->price}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="img" class="col-md-4 control-label">AFBEELDING</label>
                                    <div class="col-md-6">
                                        <input type="text" name="img" class="form-control" id="img" value="{{$value->img}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description" class="col-md-4 control-label">BESCHRIJVING</label>
                                    <div class="col-md-6">
                                        <input type="text" name="description" class="form-control" id="description" value="{{$value->description}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>

                            </form>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
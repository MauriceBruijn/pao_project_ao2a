@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading"><center><a href="{{url('/aPanel')}}" style="float:left;" class="glyphicon glyphicon-arrow-left"></a>Edit User</center></div>
				<div class="panel-body">
					<!-- Cars table -->
					<div>
					@foreach($user as $value)
						<form class="form-horizontal" action="{{url('/users/'.$value->id)}}" method="post">
							{{method_field('PATCH')}}
							{{csrf_field()}}
							
							
							<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name" class="col-md-4 control-label">Name</label>
								
									<div class="col-md-6">
										<input id="name" name="name" class="form-control" value="{{ $value->name }}" required autofocus>
										
										@if ($errors->has('name'))
											<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
							</div>
							
							@if (Auth::user()->rank >= 2)
							<div class="form-group {{ $errors->has('rank') ? ' has-error' : '' }}">
								<label for="rank" class="col-md-4 control-label">Rank</label>
									
									<div class="col-md-6">
										<input id="rank" name="rank" class="form-control" value="{{ $value->rank }}" required autofocus>
										
										@if ($errors->has('rank'))
											<span class="help-block">
												<strong>{{ $errors->first('rank') }}</strong>
											</span>
										@endif
									</div>
							</div>
							@endif
							
							<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-md-4 control-label">E-mail</label>
									
									<div class="col-md-6">
										<input id="email" name="email" class="form-control" value="{{ $value->email }}" required autofocus>
										
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
							</div>
							
							@if (Auth::user()->rank >= 2)
							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									
									<button type="submit" class="btn btn-primary">
											Update
									</button>
								</div>
							</div>
							@endif
						</form>
						
						@if (Auth::user()->rank == 2)
						<form action="{{url('/users/'.$value->id)}}" method="post">
							{{method_field('DELETE')}}
							{{csrf_field()}}
								
							<div class="form-group">
								<div class="col-md-4 col-md-offset-4">
									<button type="submit" class="btn btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
										
									</button>
								</div>
							</div>
								
						</form>
						@endif
						
						@endforeach
					</div>
					
                </div>	
            </div>
        </div>
    </div>
</div>
@endsection

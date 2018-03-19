@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading"><center>users</center></div>
				
				<div class="panel-body">
					
					<!-- Admin table -->
					<div class="box_users">
						
						<table class="table table-reflow">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>E-mail</th>
							<th>Created</th>
							<th></th>
							
						</tr>
						@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->created_at}}</td>
							<td><a href="users/{{$user->id}}" class="glyphicon glyphicon-pencil"></a></td>
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

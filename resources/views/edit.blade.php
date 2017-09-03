@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
@if ($profile->user_id != Auth::user()->id)
	redirect('/');
@else
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b>Update profile information</b>
				</div>
				<div class="panel-body">
					{!! Form::open(['action' => ['ProfileController@update', $profile->user_id], 'method' => 'post']) !!}
		                <table class="table table-striped">
		                    <tr class="form-group">
		                        <td><label for="name">Name</label> </td>
		                        <td>:</td>
		                        <td><input type="text" class="form-control" value="{{auth()->user()->name}}" readonly="true"></td>
		                    </tr>
		                    <tr class="form-group">
		                        <td><label for="id">Faculty Id</label></td>
		                        <td>:</td>
		                        <td><input type="text" class="form-control" value="{{$profile->teacher_id}}" readonly="true"></td>
		                    </tr>
		                    <tr class="form-group">
		                        <td>{{Form::label('designation', 'Designation')}}</td>
		                        <td>:</td>
		                        <td> {{Form::text('designation','',['class' => 'form-control', 'placeholder' => 'e.g Professor'])}}</td>
		                    </tr>
		                    <tr class="form-group">
		                        <td>{{Form::label('dept', 'Department')}}</td>
		                        <td>:</td>
		                        <td>{{Form::text('dept','',['class' => 'form-control', 'placeholder' => 'e.g CSE'])}}</td>
		                    </tr>
		                    <tr class="form-group">
		                        <td>{{Form::label('college', 'College')}}</td>
		                        <td>:</td>
		                        <td>{{Form::text('college','',['class' => 'form-control', 'placeholder' => 'e.g GHRCE'])}}</td>
		                    </tr>
		                    <tr class="form-group">
		                        <td><label for="email">Email Id</label></td>
		                        <td>:</td>
		                        <td><input type="text" class="form-control" value="{{auth()->user()->email}}" readonly="true"></td>
		                    </tr>
		                    <tr class="form-group">
		                        <td>{{Form::label('contact_number', 'Contact Number')}}</td>
		                        <td>:</td>
		                        <td>{{Form::text('contact_number','',['class' => 'form-control', 'placeholder' => 'e.g 9028370105'])}}</td>
		                    </tr>
		                    <tr class="form-group">
		                        <td>{{Form::label('add', 'Address')}}</td>
		                        <td>:</td>
		                        <td>{{Form::text('add','',['class' => 'form-control', 'placeholder' => 'e.g Nagpur'])}}</td>
		                    </tr>
		                    <tr class="form-group">
		                        <td>{{Form::label('pswd', 'Enter Password')}}</td>
		                        <td>:</td>
		                        <td>{{Form::password('pswd', ['class' => 'form-control'])}}</td>
		                    </tr>
		                </table>

	                	{{Form::hidden('_method', 'PUT')}}
	                    <div class="modal-footer">
	                        <button type="reset" class="btn btn-danger">Clear</button>
	                        <button type="submit" class="btn btn-primary color-bg">Save changes</button>
	                    </div>
                	{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<b>Update profile image</b>
				</div>
				<div class="panel-body">
					{!! Form::open(['action' => ['ProfileController@update', $profile->user_id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

						<table class="table table-striped">
							<tr class="form-group">
								<td>{{Form::label('profile_pic', 'Upload file')}}</td>
								<td>{{Form::file('profile_pic', ['class' => 'form-control'])}}</td>
							</tr>
							<tr class="form-group">
		                        <td>{{Form::label('pswd', 'Enter Password')}}</td>
		                        <td>{{Form::password('pswd', ['class' => 'form-control'])}}</td>
							</tr>
						</table>
						{{Form::hidden('_method', 'PUT')}}
	                    <div class="modal-footer">
	                        <button type="reset" class="btn btn-danger">Clear</button>
	                        <button type="submit" class="btn btn-primary color-bg">Save changes</button>
	                    </div>
                	{!! Form::close() !!}
                	<p><b><i>
                		*Image size should not be greater than 1999kb
                		<br>
                		*To remove profile pic just enter password and click on save changes!
                		</i></b>
                	</p>	
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@endsection
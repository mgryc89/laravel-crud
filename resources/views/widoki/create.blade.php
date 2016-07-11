@extends('master')
@section('srodek')

<div class="naglowek">
	<h2>create</h2>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
		@if ($errors)
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		@endif

			{!! Form::open(array('action' => 'CrudController@store')) !!}
			    {{ Form::label('name', 'Imie: ')}}
			    {{ Form::text('name', null, ['class'=>'form-control']) }}

			    {{ Form::label('sername', 'Nazwisko: ')}}
			    {{ Form::text('sername', null, ['class'=>'form-control']) }}

			    {{ Form::label('slug', 'slug: ')}}
			    {{ Form::text('slug', null, ['class'=>'form-control']) }}


			    {{ Form::submit('Stworz wpis', ['class'=>'btn btn-primary  btn-block', 'style'=>'margin-top:15px;'])}}
			{!! Form::close() !!}


			<h2>file</h2>
			{!! Form::open(['action'=>'CrudController@file', 'method'=>'POST', 'files'=>true]) !!}
				{{ Form::file('image[]', ['multiple'])}}
				{{ Form::submit('wyslij')}}
			{!! Form::close() !!}
{{-- 
			<form action="{{ url('/file') }}" enctype="multipart/form_data">
				<input type="file" name="file[]" multiple>
				<input type="submit" value="wyslij">
			</form> --}}
		</div>
	</div>
</div>





@stop
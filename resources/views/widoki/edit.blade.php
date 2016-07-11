@extends('master')
@section('srodek')

<h2>edit</h2>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		
		@if ($errors)
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		@endif

			{!! Form::model($dane, ['route' => ['crud.update', $dane->id], 'method' => 'PUT'] ) !!}
			    {{ Form::label('name', 'Imie: ')}}
			    {{ Form::text('name', null, ['class'=>'form-control']) }}

			    {{ Form::label('sername', 'Nazwisko: ')}}
			    {{ Form::text('sername', null, ['class'=>'form-control']) }}

			    {{ Form::label('slug', 'slug: ')}}
			    {{ Form::text('slug', null, ['class'=>'form-control']) }}

			    {{ Form::label('category_id', 'Categoria:') }}
			    {{ Form::select('category_id', $cats, null, ['class'=>'form-control']) }}

			    {{ Form::submit('Edytuj wpis', ['class'=>'btn btn-primary  btn-block', 'style'=>'margin-top:15px;'])}}
			{!! Form::close() !!}
		</div>
	</div>
</div>





@stop
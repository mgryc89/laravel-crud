@extends('master')

@section('srodek')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>{{ $dane->name }}</h2>
			<h3>{{ $dane->sername }}</h3>
			<hr>
			@if ( !isset($dane->category->name) )
				<p>kategoria: brak</p>
			@else
				<p>kategoria: {{ $dane->category->name }}</p>
			@endif
			{{-- {{ $dane->tags }} --}}
			<p>Tagi: 
			@foreach ($dane->tags as $value)
				{{ $value->name }},
			@endforeach
			</p>
			
		</div>
	</div>

@stop
@extends('master')
@section('srodek')

<div class="row">
	<div class="col-md-12">
		<h1>blog</h1>
	</div>
</div>


@foreach ($dane as $item)
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4>Name: {{ $item->name }}</h4>
			<h4>Nazwisko: {{ $item->sername }}</h4>
			<a href="{{ route('blog.single', $item->slug) }}">Czytaj wiecej</a>
			<hr>
		</div>
	</div>

@endforeach

{{ $dane->links()}}

@stop
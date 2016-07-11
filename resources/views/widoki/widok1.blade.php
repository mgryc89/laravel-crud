@extends('master')
@section('srodek')

<h2>widok pierwszy</h2>

<a href="{{ route('crud.create') }}" class="btn btn-primary btn-sm">Dodaj nowe dane</a>
<hr>

@foreach ($dane as $item)
	<li>imie i nazwisko: <b> {{$item->name}}   {{ $item->sername }}</b></li>
	<a href="{{ route('crud.edit', $item->id) }}" class="btn btn-xs btn-warning">Edycja</a>
	<a href="{{ route('crud.show', $item->id) }}" class ='btn btn-xs btn-info'>View</a>
	{{-- <hr> --}}
@endforeach

<div class="text-left">
	{!! $dane->links() !!}
</div>

@stop
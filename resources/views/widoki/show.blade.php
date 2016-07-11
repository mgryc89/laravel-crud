@extends('master')
@section('srodek')


<h2>show</h2>

@if ($spr == false)
	<b>brak uzytkownika o danym id</b>
@else
	<b>Imie </b>{{ $dane->name }}
	<br />
	<b>Nazwisko </b>{{ $dane->sername }}
	<br />
	<b>Czas stworzenia </b>{{ $dane->created_at  }} 
	<br />
	<b>url slug </b><a href="{{ url( 'blog/'.$dane->slug )  }}">{{ url( 'blog/'.$dane->slug )  }}</a>
	<br /><br />

	{{-- <a href="/crud/{{$dane->id}}/edit" class="btn btn-sm btn-warning">Edycja</a> --}}
	<a href="{{ route('crud.edit', $dane->id) }}" class="btn btn-sm btn-warning">Edycja</a>

	{!! Form::open(['route'=>['crud.destroy', $dane->id], 'method'=>'DELETE' ]) !!}
		{{ Form::submit('Usun', ['class'=>'btn btn-sm btn-danger']) }}
	{!! Form::close() !!}

	{{-- {!! Html::linkRoute('crud.destroy', 'Usuń', array($dane->id), array('class'=>'btn btn-sm btn-danger') ) !!} --}}

	
@endif


@stop
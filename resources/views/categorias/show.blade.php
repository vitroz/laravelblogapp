@extends('layout')


@section('content')


	<h1>{{ $categoria->nome }}</h1>

	<div>
		
		@foreach ($post->categorias as $categoria)

			<li>{{ $categoria->nome }}</li>

		@endforeach

	</div>


@endsection
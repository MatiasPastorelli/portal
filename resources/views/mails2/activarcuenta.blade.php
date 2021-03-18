@extends('layout.mails.app')

@section('title', 'Activar cuenta')

@section('textoTituloPrincipal', 'Activar cuenta')

@section('textoTituloSecundario', '¡Estás solo a un paso!')

@section('textoParrafoUno', '')

@section('bodyDetalles')
	<p align="center" style="font-size: 16px;">Para activar tu cuenta, debes hacer clic en el siguiente enlace:<br><br>
	<a class="button" href="{{ asset('/api/activarCuenta?t=') }}{{ $data->token }}" target="_blank">ACTIVAR CUENTA</a></p>
@endsection

@section('bodyCita')

@endsection

@section('bodyAlPie')

@endsection
@extends('layout.mails.app')

@section('title', 'isbast.com - La evolución del corretaje')

@section('textoTituloPrincipal', 'Recuperación de acceso')

@section('textoTituloSecundario', 'Notificación')

@section('textoParrafoUno', 'Compra o vende tu vivienda directamente y sin comisiones de corredor')

@section('bodyDetalles')
	<p style="font-size: 12px; line-height: 28px; text-align: left; margin: 0;">
		<span style="font-size: 16px;">
			 Hola {{ $data->receiver }},
            <br>
            Los datos de su cuenta isbast:
            <div>
                <p><b>RUT: </b>&nbsp;{{ $data->rut }}</p>
                <p><b>Correo: </b>&nbsp;{{ $data->correo }}</p>
                <a class="button" href="{{ asset('/olvidoClave-api?t=') }}{{ $data->token }}" target="_blank">Reestablecer Contraseña</a></p>
                <br/>
            </div>
		</span>
	</p>
@endsection

@section('bodyCita')

@endsection

@section('bodyAlPie')

@endsection

@section('bodyTestimonios')

@endsection

@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
    <thead>
        <tr>
        	<th>ID</th>
        	<th>Funcionario</th>
			<th>Eleccion</th>
			<th>Casilla</th>
			<th>Imei</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($imeiautorizados as $imeiautorizado)
		
			<tr>
				<td>{{$imeiautorizado->id}}</td>
				<td>{{$imei->funcionario}}</td>
				<td>{{$imei->eleccion}}</td>
				<td>{{$imei->casilla}}</td>
				<td>{{$imei->imei}}</td>

				<td><a href="{{ route('imeiautorizado.edit', $imeiautorizado->id)}}"
					class="btn btn-primary">Edit</a></td>
				<td>

					<form action="{{ route('imeiautorizado.destroy', $imeiautorizado->id)}}"
					method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" type="submit"
						onclick="return confirm('Esta seguro de borrar el imei {{$imei->eleccion}} con la casilla {{$imei->casilla}')" >Del</button>
					</form>
				</td>
			</tr>
		@endforeach

	</tbody>
	</table>
<div>
@endsection
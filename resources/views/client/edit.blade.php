@extends('layout.application')
@section('content')
  <h1>Editar Cliente</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {{ Form::model($client, ['method' => 'put', 'route' => ['clients.update', $client->id]]) }}
        @include('client._form')
    {!! Form::close() !!}
  </div>
@stop

@extends('layout.application')
@section('content')
  <h1>Novo contrato</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {{ Form::model($contract, ['method' => 'put', 'route' => ['contracts.update', $contract->id]]) }}
        @include('contract._form')
    {!! Form::close() !!}
  </div>
@stop

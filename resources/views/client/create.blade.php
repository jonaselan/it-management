@extends('layout.application')
@section('content')
  <h1>Novo cliente</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['url'=>"clients", 'method'=>'post', 'files' => true])!!}
        @include('client._form')
    {!! Form::close() !!}
  </div>
@stop

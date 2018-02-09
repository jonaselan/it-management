@extends('layout.application')
@section('content')
    @if($contracts)
        <div class="row">
            <div class="col-md-6">
                <h1>Meus Contratos</h1>
            </div>
            {{--<div class="col-md-3">
              <a href="{{route('new_evaluation')}}">Criar avaliação</a>
            </div>--}}
            <div class="col-md-3">
                <a href="{{ action('ContractController@create')}}">Criar contrato</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Objeto</th>
                <th>Vigência</th>
                <th>Valor</th>
                <th>Cliente</th>
                <th>Opções</th>
            </tr>
            @foreach($contracts as $c)
                <tr>
                    <td>{{ $c->object or 'nenhum informado'}} </td>
                    <td>{{ $c->validity }} </td>
                    <td>{{ $c->value }}</td>
                    <td>{{ \itmanagement\Client::find($c->id)->name }}</td>
                    <td>
                        <a href="{{action('ContractController@show', $c->id)}}">
                            <span class="glyphicon glyphicon-search icon-option" aria-hidden="true"></span>
                        </a>
                        <a href="{{action('ContractController@edit', $c->id)}}">
                            <span class="glyphicon glyphicon-pencil icon-option"></span>
                        </a>
                        <a href="{{action('ContractController@destroy', $c->id)}}">
                            <span class="glyphicon glyphicon-trash icon-option"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $contracts->links() }}
        {{--<h4>
          <span class="label label-danger pull-right">
            Um ou menos itens no estoque
          </span>
        </h4>--}}
    @else
        <h2> Você não tem contratos </h2>
    @endif
@stop

@extends('layout.application')
@section('content')
    @if($clients)
        <div class="row">
            <div class="col-md-9">
                <h1>Todos os clientes</h1>
            </div>
            <div class="col-md-3">
                <a href="{{ action('SystemController@create')}}">Criar cliente</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Endereço</th>
                <th>Fone</th>
                {{--<th>Opções</th>--}}
            </tr>
            @foreach($clients as $c)
                <tr>
                    <td>{{ $c->name }} </td>
                    <td>{{ $c->cnpj }} </td>
                    <td>{{ $c->address }} </td>
                    <td>{{ $c->phone }} </td>
                    {{--<td>--}}
                        {{--<a href="{{action('SystemController@show', $c->id)}}">--}}
                            {{--<span class="glyphicon glyphicon-search icon-option" aria-hidden="true"></span>--}}
                        {{--</a>--}}
                        {{--<a href="{{action('SystemController@edit', $c->id)}}">--}}
                            {{--<span class="glyphicon glyphicon-pencil icon-option"></span>--}}
                        {{--</a>--}}
                        {{--<a href="{{action('SystemController@destroy', $c->id)}}" onclick="return confirm('Tem certeza?');">--}}
                            {{--<span class="glyphicon glyphicon-trash icon-option"></span>--}}
                        {{--</a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
        </table>
        {{ $clients->links() }}
    @else
        <h2> Não há clientes </h2>
    @endif
@stop

@extends('layout.application')
@section('content')
    @if($projects)
        <div class="row">
            <div class="col-md-6">
                <h1>Meus Projetos</h1>
            </div>
            <div class="col-md-3">
              <a href="{{route('new_evaluation')}}">Criar avaliação</a>
            </div>
            <div class="col-md-3">
                <a href="{{ action('ProjectController@create')}}">Criar projeto</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Nome</th>
                <th>Data de início</th>
                <th>Cliente</th>
                <th>Opções</th>
            </tr>
            @foreach($projects as $p)
                <tr>
                    <td>{{ $p->name }} </td>
                    <td>{{ $p->created_at_ptbr() }} </td>
                    <td>{{ \itmanagement\Client::find($p->client_id)->name }}</td>
                    <td>
                        {{--<a href="{{action('ProjectController@show', $p->id)}}">--}}
                            {{--<span class="glyphicon glyphicon-search icon-option" aria-hidden="true"></span>--}}
                        {{--</a>--}}
                        <a href="{{action('ProjectController@edit', $p->id)}}">
                            <span class="glyphicon glyphicon-pencil icon-option"></span>
                        </a>
                        <a href="{{action('ProjectController@destroy', $p->id)}}" onclick="return confirm('Tem certeza?');">
                            <span class="glyphicon glyphicon-trash icon-option"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $projects->links() }}
    @else
        <h2> Você não tem projetos </h2>
    @endif
@stop

@extends('layout.application')
@section('content')
    @if($systems)
        <div class="row">
            <div class="col-md-6">
                <h1>Meus Sistemas</h1>
            </div>
            {{--<div class="col-md-3">
              <a href="{{route('new_evaluation')}}">Criar avaliação</a>
            </div>--}}
            <div class="col-md-3">
                <a href="{{ action('SystemController@create')}}">Criar sistema</a>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Projeto</th>
                <th>Opções</th>
            </tr>
            @foreach($systems as $s)
                <tr>
                    <td>{{ $s->name }} </td>
                    <td>{{ $s->type }} </td>
                    <td>{{ \itmanagement\Project::find($s->project_id)->name }}</td>
                    <td>
                        {{--<a href="{{action('SystemController@show', $s->id)}}">--}}
                            {{--<span class="glyphicon glyphicon-search icon-option" aria-hidden="true"></span>--}}
                        {{--</a>--}}
                        <a href="{{action('SystemController@edit', $s->id)}}">
                            <span class="glyphicon glyphicon-pencil icon-option"></span>
                        </a>
                        <a href="{{action('SystemController@destroy', $s->id)}}" onclick="return confirm('Tem certeza?');">
                            <span class="glyphicon glyphicon-trash icon-option"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $systems->links() }}
    @else
        <h2> Você não tem sistemas criados </h2>
    @endif
@stop

<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descrição:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'Tipo:') !!}
    {!! Form::text('type', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('project_id', 'Projeto:') !!}
    {!! Form::select('project_id', $projects_options, $system->product_id, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Finalizar', ['class'=>'btn btn-primary']) !!}
</div>
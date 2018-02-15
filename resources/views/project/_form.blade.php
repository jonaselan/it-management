<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::number('client_id', Auth::user()->client_id, ['class'=>'hidden']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Finalizar', ['class'=>'btn btn-primary']) !!}
</div>
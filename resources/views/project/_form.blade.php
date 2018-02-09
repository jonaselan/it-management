<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {{-- TODO: use client_id from logged user --}}
    {!! Form::label('client_id', 'Cliente:') !!}
    {!! Form::number('client_id', 1, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Finalizar', ['class'=>'btn btn-primary']) !!}
</div>
<div class="form-group">
    {!! Form::label('object', 'Objeto:') !!}
    {!! Form::text('object', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('validity', 'Vigência:') !!}
    {!! Form::date('validity', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('value', 'Valor:') !!}
    {!! Form::number('value', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('payment', 'Pagamento:') !!}
    {!! Form::number('payment', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {{-- TODO: use client_id from logged user --}}
    {!! Form::label('client_id', 'Cliente:') !!}
    {!! Form::number('client_id', 1, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Finalizar', ['class'=>'btn btn-primary']) !!}
</div>
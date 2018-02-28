<div class="form-group">
    {!! Form::label('name', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cnpj', 'CNPJ:') !!}
    {!! Form::text('cnpj', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', 'Telefone:') !!}
    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('address', 'Endereço:') !!}
    {!! Form::text('address', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::label('logo', 'Logo:') !!}
    <div class="logo-content">
       @if($logo)
          <img class="logo" src="{!! url($logo) !!}" />
       @endif
    </div>
    {!! Form::file('logo') !!}
</div>

<div class="form-group">
    {!! Form::submit('Finalizar', ['class'=>'btn btn-primary']) !!}
</div>
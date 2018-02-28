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
    <div class="radio">
        <label>{!! Form::radio('type', 'web') !!}Web</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('type', 'desktop') !!}Desktop</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio('type', 'mobile') !!}Mobile</label>
    </div>
</div>
<div class="form-group">
    {!! Form::label('project_id', 'Projeto:') !!}
    {!! Form::select('project_id',
                    $projects_options,
                    isset($system) ? $system->product_id : null,
                    array('class' => 'form-control')) !!}
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
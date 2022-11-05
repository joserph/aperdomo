<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    
    @isset($services)
        {{ Form::hidden('user_update', Auth::user()->id) }}
    @else
        {{ Form::hidden('user_id', Auth::user()->id) }}
        {{ Form::hidden('user_update', Auth::user()->id) }}
    @endisset
    
</div>

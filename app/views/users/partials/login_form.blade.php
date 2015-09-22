

    <div class="form-group @if($errors->has('email')) has-error @endif">
        {{ Form::text('email', null, ['class' => 'form-control','placeholder' =>'email'])}}
    </div>

    <div class="form-group @if($errors->has('password')) has-error @endif">
        {{ Form::password('password', ['class' => 'form-control','placeholder' =>'password'])}}
    </div>

    

    

    <div>
			<div class="form-group @if($errors->has('first_name')) has-error @endif">
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', null, ['class' => 'form-control'])}}
            </div>
            
            <div class="form-group @if($errors->has('last_name')) has-error @endif">
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', null, ['class' => 'form-control'])}}
            </div>

			<div class="form-group @if($errors->has('email')) has-error @endif">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, ['class' => 'form-control'])}}
            </div>

			<div class="form-group @if($errors->has('password')) has-error @endif">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['class' => 'form-control'])}}
            </div>
			
            <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                {{ Form::label('password_confirmation', 'Re-enter Password') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control'])}}
            </div>

			<button class="btn btn-lrg btn-primary btn-block">Submit</button>
	</div>
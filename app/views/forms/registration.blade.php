{{ Form::open(array('url' => '/registration', 'method' => 'POST')) }}
	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-name', 'Имя')}}
		{{ Form::text('user-create-name')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-surname', 'Фамилия')}}
		{{ Form::text('user-create-surname')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-login', 'Логин')}}
		{{ Form::text('user-create-login')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-password', 'Пароль')}}
		{{ Form::password('user-create-password')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::submit('user-create', 'Зарегистрироваться')}}
	{{ Form::closeFormGroup() }}
{{ Form::close() }}
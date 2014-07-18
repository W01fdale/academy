{{ Form::open(array('url' => '/registration', 'method' => 'POST')) }}
	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-name', 'Имя')}}
		{{ Form::text('post-create-title')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-surname', 'Фамилия')}}
		{{ Form::text('post-create-text')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-login', 'Логин')}}
		{{ Form::text('post-create-text')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('user-create-password', 'Пароль')}}
		{{ Form::password('post-create-text')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::submit('user-create', array('value' => 'Зарегистрироваться'))}}
	{{ Form::closeFormGroup() }}
{{ Form::close() }}
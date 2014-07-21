{{ Form::macro('openInputWrapper', function($id = '') {return '<div class="input-wrapper"' . (empty($id) ? '' : ' id="\$id"') . '>'; }) }}
{{ Form::macro('closeWrapper', function() {return '</div>'; }) }}

{{ Form::open(['url' => 'users/create', 'method' => 'POST']) }}
	{{ Form::openInputWrapper() }}
		{{ Form::text('login', null, ['placeholder' => 'Логин']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::password('password', ['placeholder' => 'Пароль']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::text('first_name', null, ['placeholder' => 'Имя']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::text('last_name', null, ['placeholder' => 'Фамилия']) }}
	{{ Form::closeWrapper() }}

	{{ Form::submit('Зарегистрировать') }}
{{ Form::close() }}
{{ Form::macro('openInputWrapper', function($style = '') {return '<div class="input-wrapper"' . (empty($style) ? '' : ' style="' . $style . '"') . '>'; }) }}
{{ Form::macro('closeWrapper', function() {return '</div>'; }) }}

{{ Form::open(['method' => 'POST', 'url' => '/users/signin']) }}
	{{ Form::openInputWrapper() }}
		{{ Form::text('login', '', ['placeholder' => 'Логин']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::password('password', ['placeholder' => 'Пароль']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::submit('Войти', ['id' => 'user-login']) }}
	{{ Form::closeWrapper() }}
		{{ Form::button('Зарегистрироваться', ['id' => 'user-register', 'action' => '/users/register', 'onclick' => 'location.href="/users/register"']) }}

{{ Form::close() }}
		
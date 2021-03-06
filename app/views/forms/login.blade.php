{{ Form::macro('openInputWrapper', function() {return '<div class="input-wrapper">'; }) }}
{{ Form::macro('closeWrapper', function() {return '</div>'; }) }}

{{ Form::open(['method' => 'POST', 'url' => '/users/signin']) }}
	{{ Form::openInputWrapper() }}
		{{ Form::text('login', '', ['placeholder' => 'Логин']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::password('password', ['placeholder' => 'Пароль']) }}
	{{ Form::closeWrapper() }}

	{{ Form::openInputWrapper() }}
		{{ Form::submit('Войти') }}
		{{ Form::button('Регистрация', ['onclick' => 'location.href="/users/register"'])}}
	{{ Form::closeWrapper() }}
{{ Form::close() }}
		
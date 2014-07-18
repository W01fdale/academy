{{ Form::open(array('url' => '/post/create', 'method' => 'POST')) }}
	{{ Form::openFormGroup() }}
		{{ Form::label('post-create-title', 'Заголовок')}}
		{{ Form::text('post-create-title')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::label('post-create-text', 'Текст')}}
		{{ Form::text('post-create-text')}
	{{ Form::closeFormGroup() }}

	{{ Form::openFormGroup() }}
		{{ Form::submit('post-create', array('value' => 'Отправить'))}}
	{{ Form::closeFormGroup() }}
{{ Form::close() }}
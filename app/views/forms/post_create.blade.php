{{ Form::macro('openInputWrapper', function($id = '') {return '<div class="input-wrapper"' . (empty($id) ? '' : ' id="\$id"') . '>'; }) }}
{{ Form::macro('closeWrapper', function() {return '</div>'; }) }}

<div id="post-create-wrapper">
    {{ Form::open(['url' => 'posts', 'method' => 'POST']) }}

    	{{ Form::openInputWrapper() }}
            {{ Form::text('title', null, ['placeholder' => 'Заголовок']) }}
		{{ Form::closeWrapper() }}

		{{ Form::openInputWrapper() }}
            {{ Form::textarea('content', '', ['id' => 'content', 'placeholder' => 'Содержание поста']) }}
		{{ Form::closeWrapper() }}

		{{ Form::submit('Создать', ['id' => 'post-create'])}}

	{{ Form::close() }}
</div>
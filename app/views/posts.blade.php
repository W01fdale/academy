{{ Form::button('Создать пост', ['onclick' => 'location.href="/posts/create"']) }}

<div id="feed">	
    @foreach ($posts as $post)
        @include('post', $post);
    @endforeach       
</div>
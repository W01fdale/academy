<div class="post">
	<div class="post-head">
        <span class="post-title">{{ $post->title }}</span>
        <span class="username">{{ $post->user->login }}</span>
    </div>

    <div class="post-body">
        <p class="post-text">
            {{ $post->content }}
        </p>
    </div>
    
    <div class="post-footer">
        <a href="/posts/{{ $post->id }}/edit">Редактировать</a>
        
        {{ Form::open(['url' => 'posts/' . $post->id, 'method' => 'DELETE']) }}     
        	<a href="#" onclick="$(this).closest('form').submit()">[X]</a>
        {{ Form::close() }}
    </div>
</div>
{{ Form::button('Создать пост', ['onclick' => 'location.href="/posts/create"']) }}

<div id="feed">	
    @foreach ($posts as $post)
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
        </div>
    @endforeach       
</div>
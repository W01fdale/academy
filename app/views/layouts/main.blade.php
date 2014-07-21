<!DOCTYPE html>
<html>
    <head>
        <title>Useless Talks</title>
        <meta charset="UTF-8">
        
        {{ HTML::style("/public/styles/common.css") }}
        {{ HTML::style("/public/styles/" . $page_name . ".css") }}
        {{ HTML::script("http://code.jquery.com/jquery-2.1.1.js", ['async' => 'async'])}}
        
        <script defer>          
            $.each($('.message'), function(i, el){
                $(el).css({'opacity':0});
                
                setTimeout(function(){
                   $(el).animate({
                    'opacity': 0.7
                   }, 450);
                }, 500 + ( i * 500 ));
                
                setTimeout(function() {}, 3000);
                
                setTimeout(function(){
                   $(el).animate({
                    'opacity': 0
                   }, 450);
                },500 + ( i * 500 ));

            });
        </script>
    </head>
    
    <body>       
        @if(Session::has('message'))
        	<div class="message info">{{ Session::get('message') }}</div>
        @endif           
        
        @if($errors->has())
  			@foreach ($errors->all() as $error)
      			<div class="message error">{{ $error }}</div>
  			@endforeach
    	@endif
        
        <div id="logo">
        	Useless Talks
        </div>
        
        <div id="page-info">
            {{ $page_info }}
        </div>
        
        <div id="wrapper">            
            {{ $content }}
        </div>		
                
        @if($page_name !== 'login')
            @if(Auth::check())
                {{ Form::button('Выйти', ['id' => 'logout', 'onclick' => 'location.href="/users/logout"']) }}
            @else
                {{ Form::button('Войти', ['id' => 'login', 'onclick' => 'location.href="/users/login"']) }}
            @endif
        @endif
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Useless Talks</title>
        <meta charset="UTF-8">
        
        {{ HTML::style("/public/styles/common.css") }}
        {{ HTML::style("/public/styles/" . $page_name . ".css") }} 
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

        @if($page_name != 'login')
            @if(Auth::check())
        		{{ Form::button('Свои посты', ['id' => 'own', 'onclick' => 'location.href="/posts/own"']) }}
        		{{ Form::button('Профиль', ['id' => 'profile', 'onclick' => 'location.href="/users/profile"']) }}
                {{ Form::button('Выйти', ['id' => 'logout', 'onclick' => 'location.href="/users/logout"']) }}
            @else
                {{ Form::button('Войти', ['id' => 'login', 'onclick' => 'location.href="/users/login"']) }}
            @endif
        @endif
    </body>

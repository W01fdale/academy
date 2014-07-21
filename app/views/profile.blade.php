<div class="user-info">
    Логин: {{ $login }}
</div>
<div class="user-info">
    Имя:&nbsp;
    
    @if(empty($first_name))
    	Не известно
    @else
    	{{ $first_name }}
    @endif
</div>
<div class="user-info">
    Фамилия:&nbsp;
    
    @if(empty($last_name))
    	Не известна
    @else
    	{{ $last_name }}
    @endif
</div>
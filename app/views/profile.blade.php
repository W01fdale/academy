<div class="info">
    Логин: {{ $login }}
</div>
<div class="info">
    Имя:&nbsp;
    
    @if(empty($first_name))
    	Не известно
    @else
    	{{ $first_name }}
</div>
<div class="info">
    Фамилия:&nbsp;
    
    @if(empty($last_name))
    	Не известна
    @else
    	{{ $last_name }}
</div>
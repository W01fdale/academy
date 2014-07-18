<!DOCTYPE html>
<html>
    <head>
        <title>Useless Talks</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./styles/common.css">
		<link rel="stylesheet" href="./styles/{{ $page_name }}.css">
        
        <script src="http://code.jquery.com/jquery-2.1.1.js" async></script>
        <script defer>
        	
            
        </script>
    </head>
    
    <body>
        <div id="logo">
        	Useless Talks
        </div>
        
        <div id="page-name">
            {{ $page_name }}
        </div>
        
        <div id="wrapper">           
			@yield('content');
        </div>
    </body>
</html>
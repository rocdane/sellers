<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head />
    </head>
    <body class="body-wrapper">
        
        <x-navs.guest />

        <main>
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            
            {{$slot}}
        </main>
       
        <x-partials.footer />
    </body>
</html>

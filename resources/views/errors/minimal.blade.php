<x-layout title="{{isset($title) ? $title : $exception->getStatusCode()}}">

    <div class="container">
        <div class="content text-center">
            <h3 style="font-size: 3rem">@yield('code') - @yield('title')</h3>
            <p>@yield('message')</p>
        </div>
    </div>
</x-layout>    

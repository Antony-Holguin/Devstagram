<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DebugTalk @yield('title')</title>
        @stack('styles')
        @vite('resources/css/app.css')

        @vite('resources/js/app.js')

        @livewireStyles()


    </head>
    <body class="antialiased bg-white-100" >

        <header class="p-5 border-b bg-white shadow">
           <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}" class="text-3xl font-black">
                    DebugTalk
                </a>

                @auth
                   {{--
                    <div class="flex">
                        <input type="search" id="search" name="search" class="border p-3 w-80 rounded-lg" placeholder="Search">

                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </div>

                    </div>
                   --}}
                   <div class="flex justify-end gap-3 items-center">
                        <div>
                            <a class="flex items-center gap-2 border bg-white p-2  text-gray-600 rounded-lg text-sm font-bold uppercase" href="{{route('posts.create')}}">
                                Create
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                  </svg>

                            </a>
                        </div>
                        <div>
                            <span class="font-normal text-gray-600 text-sm">Hello:</span>
                            <a class="font-bold" href="{{route('posts.index', auth()->user()->username)}}">{{auth()->user()->username}}</a>
                        </div>

                        <div>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <input class="font-bold cursor-pointer text-red-600" type="submit" value="Sign out">
                            </form>
                        </div>
                   </div>
                @endauth

                @guest
                    <nav class="flex gap-2">
                        <a class="font-bold uppercase text-gray-600" href="{{route('login')}}">Login</a>
                        <a class="font-bold uppercase text-gray-600" href="{{route('register.index')}}">Create account</a>

                    </nav>
                @endguest
           </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
            @yield('content')
        </main>

        <footer class="text-center text-gray-500 p-5 font-bold uppercase mt-10">
            DebugTalk - {{now()->year}}
        </footer>
    </body>

    @livewireScripts()
    <script src="{{asset('/scripts/helpers.js')}}"></script>
    {{-- <script type="text/javascript"> document.onkeydown = function(){return false}</script>; --}}
</html>

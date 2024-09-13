<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>@yield('title') - YourAppName</title>
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <header> 
        @include('layouts.header')
    </header>

    <div class="bg-gray-50 flex flex-col flex-grow justify-center py-2 sm:px-6 lg:px-8 px-6"> 
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            @if(isset($show_image) && $show_image)
                <img class="mx-auto h-10 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
            @endif
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                @yield('heading')
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-blue-500 max-w">
                @yield('subheading')
            </p>
        </div>

        <div class="mx-auto w-full mt-2" style="max-width: 400px;">
            <div class="bg-white py-6 px-4 shadow-lg sm:rounded-lg sm:px-8">
                @yield('content')
            </div>
        </div>
    </div>

    <footer> 
        @include('layouts.footer')
    </footer>
</body>
</html>
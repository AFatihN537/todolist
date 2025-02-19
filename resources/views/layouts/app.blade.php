<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List App')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/513ccddf44.js" crossorigin="anonymous"></script>
    <style>
        @font-face{
            font-family: 'FOT-NewRodinPro';
            src: url('{{ asset('fonts/FOT-NewRodin Pro DB.otf') }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face{
            font-family: 'FOT-NewRodinPro';
            src: url('{{ asset('fonts/FOT-NewRodin Pro EB.otf') }}') format('opentype');
            font-weight: bold;
            font-style: normal;
        }
        body{
            font-family: 'FOT-NewRodinPro', sans-serif;
        }
    </style>
</head>
<body>
    <div class="bg-gradient-to-br from-purple-400 via-pink-300 to-blue-300 min-h-screen flex justify-center items-center">
        <div class="w-full max-w-4xl bg-[#f4f7ff] p-8 rounded-lg shadow-xl">
            <h2 class="text-center text-3xl font-bold mb-4">@yield('header')</h2>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded my-2">{{ session('success') }}</div>
                
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded my-2">{{ session('error') }}</div>
                
            @endif
            @yield('content')
            <footer class="mt-5 text-center">
                <hr>
                <p class="text-gray-600">&copy; {{ date('Y') }} To-Do List App - Made with Laravel</p>
            </footer>
        </div>
    </div>
</body>
</html>
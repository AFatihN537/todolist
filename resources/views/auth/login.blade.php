<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="flex min-h-full flex-col px-6 py-12 lg:px-8 justify-center">
        <div class="sm:mx-auto h-10 w-auto">
            <h2 class="text-center mt-10 text-2xl/9 font-bold tracking-tight text-gray-900">Form Login</h2>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-indigo-600">Login</button>
                </div>
                
            </form>
            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Belum punya akun? <a href="/register" class="font-semibold text-indigo-600 hover:text-indigo-500">Daftar</a>
            </p>
        </div>
    </div>
</body>
</html>
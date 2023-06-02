<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Авторизация</title>
</head>
<body>
<div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Вход</h1>

        <form method="post" action="{{route('login_process')}}" class="space-y-5 mt-5">
            @csrf

            <input name="email" type="text"
                   class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-500 @enderror"
                   placeholder="Email"
            />
            @error('email')
            <p class="text-red-500">{{$message}}</p>
            @enderror

            <input name="password" type="password"
                   class="w-full h-12 border border-gray-800 rounded px-3 @error('password') border-red-500 @enderror"
                   placeholder="Пароль"
            />
            @error('password')
            <p class="text-red-500">{{$message}}</p>
            @enderror
            <button type="submit"
                    class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium"
            >
                Войти
            </button>
        </form>
    </div>
</div>

</body>
</html>

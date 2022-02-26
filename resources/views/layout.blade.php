<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>SignoWeb</title>
</head>

<body class='bg-gray-200 h-screen'>
    <header class="p-5 text-center">
        <img src="https://site.signoweb.com.br/assets/images/logo-signo.svg" alt="Signo Logo" class="mx-auto h-32 mt-4">
        <h1 class="text-6xl">@yield('title')</h1>
    </header>
    <main class='mx-4 md:mx-40'>
        @yield('content')
    </main>
    <footer class="p-5 text-center">
        Victor Hugo <span class="inline-block" style='transform: rotate(180deg);'>&copy;</span> <a
            class='hover:underline' href="https://www.gnu.org/licenses/gpl-3.0.en.html">GPL V3</a>
    </footer>
    @if(!empty($message))
    <div
        class="absolute top-5 right-5 rounded-full bg-<?php echo $message->color; ?>-300 text-center px-5 py-3 text-gray-700">
        {{$message->text}}
    </div>
    @endif
    @if($errors->any())
    <div class="absolute top-5 right-5 rounded-full bg-red-300 px-16 py-3 text-gray-700">
        <ul class="list-disc">
            @foreach ($errors->all() as $err)
            <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5592293c7c.js" crossorigin="anonymous"></script>


   
    @livewireStyles
</head>
<body class="bg-white">

    <div class="p-5 flex justify-center text-center">
        <h1 class="font-bold text-gray-600 text-7xl">
            FORM
            <i class="fa-brands fa-laravel text-6xl mx-5 text-gray-700"></i>
            PROJECT LIST</h1>
    </div>

    <a href="login">Login</a>
    <a href="logout">Logout</a>

    <div>
        @livewire('project-form')
    </div>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>
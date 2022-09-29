<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/5592293c7c.js" crossorigin="anonymous"></script>

    @livewireStyles
</head>
<body class="bg-gray-600">

    <div class="p-5 flex justify-center">
        <h1 class="font-bold text-white text-7xl">FORM & PROJECT LIST</h1>
    </div>

    <div>
        @livewire('project-form')
    </div>

    @livewireScripts
</body>
</html>
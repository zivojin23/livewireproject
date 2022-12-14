<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>receiver</title>

    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
</head>
<body>


    <div class="p-5 flex justify-center text-center">
        <h1 class="font-bold text-gray-600 text-4xl">
            Receiver</h1>
    </div>

    <div>
        @livewire('receiver-comp')
    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>
    
    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
</head>
<body>

    
    <div class="p-5 flex justify-center text-center">
        <h1 class="font-bold text-gray-600 text-4xl">Dashboard</h1>
    </div>

<div class="container mx-auto flex flex-wrap pt-4 pb-12">


        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/material" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Materials (db)</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    Define material, edit, delete, search</p>
            </a>
        </div>



        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/receiver" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Receiver</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    Specific request for </p>
            </a>
        </div>


        <div class="w-1/4 p-6 flex flex-col hover:transition hover:duration-250 hover:ease-in-out hover:scale-105">
            <a href="/supplier" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-blue-100">        
                <h5 class="mb-2 text-2xl font-bold text-gray-700">Supplier</h5>
                <p class="w-full font-normal text-gray-700 pt-4">
                    Li...</p>
            </a>
        </div>

        {{-- <div>
            @livewire('receiver')
        </div> --}}
    

</div>


{{-- <div class="w-1/4 p-6">
    <div class="block max-w-sm p-6  bg-gray-100 border border-gray-200 rounded-lg shadow-md">        
        <h5 class="mb-2 px-6 text-2xl font-bold text-gray-700">Personal info</h5>
        <div class="flex">
    
            <div class="flex flex-col">
                <div class="p-3 text-base">
                    <p class="py-2 ml-3">User ID</p>
                    <p class="py-2 ml-3">First Name</p>
                    <p class="py-2 ml-3">Last Name</p>
                    <p class="py-2 ml-3">Email</p>
                    <p class="py-2 ml-3">Role</p>
                </div>
            </div>
    
            <div class="flex flex-col">
                <div class="p-3 text-base">
                    <p class="py-2 ml-3">{{ $user->id }}</p>
                    <p class="py-2 ml-3">{{ $user->first_name }}</p>
                    <p class="py-2 ml-3">{{ $user->last_name }}</p>
                    <p class="py-2 ml-3">{{ $user->email }}</p>
                    <p class="py-2 ml-3">{{ $user->role->role_name }}</p>      
                </div>
            </div>
    
        </div>
    </div>
</div> --}}


    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    @livewireScripts
</body>
</html>
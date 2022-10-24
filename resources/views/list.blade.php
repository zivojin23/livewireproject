<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Projects</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5592293c7c.js" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="bg-white border-gray-200 px-2 md:px-4 py-2.5">
        <div class="flex flex-wrap justify-end items-center mx-auto">

            <div class="flex items-center md:order-2">

                @auth
                <div class="flex items-center md:order-2 ">
                    <button type="button" class="flex mr-3 text-sm bg-blue-200 rounded-lg md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <div class="py-2.5 px-5">{{ $user->first_name }}</div>
                    </button>
                
                    <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow" id="user-dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 9.77778px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
                        
                        <div class="py-3 px-4">
                            <span class="block text-sm text-gray-900">{{ $user->first_name }}</span>
                            <span class="block text-sm font-medium text-gray-500 truncate">{{ $user->email }}</span>
                        </div>
                
                        <ul class="py-1" aria-labelledby="user-menu-button">
                            <li>
                                <a href="logout" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            </li>
                        </ul>
                
                    </div>
                </div>

                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                        <li>
                            <a href="/" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="/myprojects" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">My Projects</a>
                        </li>
                    </ul>
                </div>

                @else
                    <a href="login" class="text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Login</a>
                    <a href="register" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sign up</a>
                @endauth
                
            </div>

        </div>
    </nav>




    <div>
        <div class="p-5 flex justify-center text-center">
            <h1 class="font-bold text-gray-600 text-2xl">
                    Hello, {{ auth()->user()->first_name }} !
            </h1>
        </div>

        @foreach (Auth::user()->forms as $form)
            <h2>
                <div class="w-1/2 mx-auto p-5 font-light border border-b-0 border-gray-200">
                    <div class="sm:grid sm:grid-cols-4 flex">
        
                        <div class="flex flex-col">
                            <div class="p-3 text-base">
                                <p class="py-2 ml-3">First Name</p>
                                <p class="py-2 ml-3">Last Name</p>
                                <p class="py-2 ml-3">Email</p>
                                <p class="py-2 ml-3">Project Name</p>
                                <p class="py-2 ml-3">Project Priority</p>
                                <p class="py-2 ml-3">Project Status</p>
                                <p class="py-2 ml-3">Project Person</p>
                                <p class="py-2 ml-3">Attachment</p>
                            </div>
                        </div>
        
                        <div class="sm:pl-10 grid col-span-2">
                            <div class="p-3 text-base">
                                <p class="py-2 ml-3">{{ $form->first_name }}</p>
                                <p class="py-2 ml-3">{{ $form->last_name }}</p>
                                <p class="py-2 ml-3">{{ $form->email }}</p>
                                <p class="py-2 ml-3">{{ $form->project_name }}</p>
                                <p class="py-2 ml-3">{{ $form->project_priority }}</p>
                                <p class="py-2 ml-3">{{ $form->project_status }}</p>
                                <p class="py-2 ml-3">{{ $form->project_person }}</p>
                                <a class="flex items-center py-2 ml-3 hover:text-blue-600 hover:underline" target="_blank" href="{{ Storage::Url($form->attachment) }}">View</a>               
                            </div>
                        </div>
        
                        <div class="px-4 py-2 flex flex-col justify-between">
                            <div>  
                                <p class="text-sm italic flex justify-end">{{ $form->updated_at }}</p>
                            </div>

                            <div class="flex flex-row justify-between">
                                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                                <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>
                            </div>   
        
                        </div>
                    </div>
                </div>
            </h2>
        @endforeach
    </div>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
    <link href="/css/app.css" rel="stylesheet">

</head>
<body>


    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
        <div class="container flex justify-between items-center mx-auto bg-gray-100">
        
                <a href="#" class="flex items-center">
                    <i class="fa-brands fa-laravel text-7xl mx-5 text-gray-700"></i>
                </a>
                @auth
                <div class="flex items-center md:order-2 ">
                    <button type="button" class="flex mr-3 text-sm bg-blue-200 rounded-lg md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <div class="py-2.5 px-5">{{ Auth::user()->first_name }}</div>
                    </button>
        
                    <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow" id="user-dropdown" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 9.77778px, 0px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
                        
                        <div class="py-3 px-4">
                            <span class="block text-sm text-gray-900">{{ Auth::user()->first_name }}</span>
                            <span class="block text-sm font-medium text-gray-500 truncate">{{ Auth::user()->email }}</span>
                        </div>
        
                        <ul class="py-1" aria-labelledby="user-menu-button">
                            <li>
                                <a href="logout" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                            </li>
                        </ul>
        
                    </div>
                </div>
                @endauth

    
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                    <li>
                        <a href="/" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="/list" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">My Projects</a>
                    </li>
                </ul>
            </div>
    
        </div>
    </nav>



        
   
    @foreach ($forms as $form)

    <div id="accordion-collapse" data-accordion="collapse">
        <h2 id="accordion-collapse-heading-{{ $form->id }}">
          <button type="button" class="w-4/5 mx-auto flex items-center justify-between p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-{{ $form->id }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $form->id }}">
            <span class="flex items-center">{{ $form->project_name }}</span>
                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </button>
        </h2>
        <div id="accordion-collapse-body-{{ $form->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $form->id }}">
          <div class="w-4/5 mx-auto p-5 font-light border border-b-0 border-gray-200">
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



                    <div class="p-3 flex flex-col">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 mb-8 border border-gray-400 rounded-lg shadow" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                        <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>
                    </div>  

                </div>
            </div>
          </div>
        </div>
      
  @endforeach

</div>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</body>
</html>
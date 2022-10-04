<div class="sm:grid sm:grid-cols-2 flex flex-col">
    <div>
        {{-- FORM --}}
        <div class="bg-white sm:w-3/5 w-4/5 mx-auto rounded-lg">
    
            @if (session()->has('submitted'))
            <div class="bg-green-100 p-4 flex justify-center rounded-lg w-full mx-auto">
                <div class="font-bold text-xl text-green-700">
                    {{ session()->get('submitted') }}
                    <i class="fa-solid fa-thumbs-up ml-5"></i>
                </div>    
            </div>
            @endif

            @if (session()->has('deleted'))
            <div class="bg-green-100 p-4 flex justify-center rounded-lg w-full mx-auto">
                <div class="font-bold text-xl text-green-700">
                    {{ session()->get('deleted') }}
                    <i class="fa-solid fa-check ml-5"></i>
                </div>
            </div>   
            @endif

            @if (session()->has('updated'))
            <div class="bg-green-100 p-4 flex justify-center rounded-lg w-full mx-auto">
                <div class="font-bold text-xl text-green-700">
                    {{ session()->get('updated') }}
                    <i class="fa-solid fa-check ml-5"></i>
                </div>
            </div>                
            @endif

            @if ($updateForm)
                @include('livewire.update')
            @else     
                @include('livewire.create')
            @endif

        </div>
        {{-- FORM --}}
    </div>

    {{-- PROJECT LIST --}}
    <div class="flex flex-col py-8">

        {{-- <h2 class="font-bold text-2xl text-white p-4 flex justify-center">PROJECT LIST - VIEW</h2> --}}

        @foreach ($forms as $form)

        

        <div class="bg-blue-800 text-white mb-10 rounded-lg ">
            <div class="flex flex-col">
             

              
                <div class="p-5 flex justify-between items-center bg-blue-900 rounded-t-lg">
                    <div>
                        <h2 class="text-3xl font-semibold ml-4">Project details</h2>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-end">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4 text-black" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                        <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow text-black" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>

                    </div> 
                </div>


                <div class="sm:grid sm:grid-cols-4 flex">

                    <div class="flex flex-col">
                        <div class="p-5 text-base">
                            <p class="py-2 px-4 ml-3">First Name</p>
                            <p class="py-2 px-4 ml-3">Last Name</p>
                            <p class="py-2 px-4 ml-3">Email</p>
                            <p class="py-2 px-4 ml-3">Project Name</p>
                            <p class="py-2 px-4 ml-3">Project Priority</p>
                            <p class="py-2 px-4 ml-3">Project Status</p>
                            <p class="py-2 px-4 ml-3">Project Person</p>
                            <p class="py-2 px-4 ml-3">Attachment</p>
                        </div>
                    </div>

                   

                    <div class="sm:pl-10  grid col-span-2">
                        <div class="flex flex-col">
                            <div class="py-5">
                                <p class="py-2  ml-3">{{ $form->first_name }}</p>
                                <p class="py-2  ml-3">{{ $form->last_name }}</p>
                                <p class="py-2  ml-3">{{ $form->email }}</p>
                                <p class="py-2  ml-3">{{ $form->project_name }}</p>
                                <p class="py-2  ml-3">{{ $form->project_priority }}</p>
                                <p class="py-2  ml-3">{{ $form->project_status }}</p>
                                <p class="py-2  ml-3">{{ $form->project_person }}</p>
                                <a class="bg-white hover:bg-blue-200 font-semibold py-2 px-4 ml-3 border border-gray-400 rounded-lg shadow mr-4 text-black" target="_blank" href="{{ Storage::Url($form->attachment) }}">View</a>
                            </div>
                        </div>
                    </div>


                    <div class="hidden sm:block p-4">
                        <p class="text-sm italic flex justify-end">{{ $form->created_at }}</p>
                    </div>


                </div>
            </div>
    
        </div>

        
        {{-- <div class="rounded-lg bg-white mb-8">
     
            <div class="p-4 flex justify-start">
                <ul class="text-base font-medium rounded-lg">
                    
                    <li class="py-2 px-4 ml-3">First Name: <b>{{ $form->first_name }}</b></li>
                    <li class="py-2 px-4 ml-3">Last Name: <b>{{ $form->last_name }}</b></li>
                    <li class="py-2 px-4 ml-3">Email: <b>{{ $form->email }}</b></li>
                    <li class="py-2 px-4 ml-3">Project Name: <b>{{ $form->project_name }}</b></li>
                    <li class="py-2 px-4 ml-3">Project Priority: <b>{{ $form->project_priority }}</b></li>
                    <li class="py-2 px-4 ml-3">Project Status: <b>{{ $form->project_status }}</b></li>
                    <li class="py-2 px-4 ml-3">Project Person: <b>{{ $form->project_person }}</b></li>
                    

                    <div>
                    <li class="py-2 px-4 ml-3">Attachment: 

                        <a class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" href="{{ Storage::Url($form->attachment) }}">View</a>
                        <img class="mt-5" src="{{ Storage::Url($form->attachment) }}" alt="">

                    </li>
                    </div>

                </ul>
            </div>

            
            <img src="" alt="">

            <div class="hidden sm:block p-5 flex justify-end">
                <p class="py-2 px-4 text-sm italic">{{ $form->created_at }}</p>
            </div>



            <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>
            </div>
        </div> --}}
        @endforeach








    </div>
    {{-- PROJECT LIST --}}



</div>
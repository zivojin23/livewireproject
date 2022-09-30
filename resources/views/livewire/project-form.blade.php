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


    <div class="flex flex-col sm:w-3/5 w-4/5 mx-auto my-8">

        {{-- <h2 class="font-bold text-2xl text-white p-4 flex justify-center">PROJECT LIST - VIEW</h2> --}}

        @foreach ($forms as $form)

        <div class="rounded-lg bg-white mb-8">
            <div class="p-4 flex justify-start">
                <ul class="text-base font-medium rounded-lg">
                    <li class="py-2 px-4">First Name: <b>{{ $form->first_name }}</b></li>
                    <li class="py-2 px-4">Last Name: <b>{{ $form->last_name }}</b></li>
                    <li class="py-2 px-4">Email: <b>{{ $form->email }}</b></li>
                    <li class="py-2 px-4">Project Name: <b>{{ $form->project_name }}</b></li>
                    <li class="py-2 px-4">Project Priority: <b>{{ $form->project_priority }}</b></li>
                    <li class="py-2 px-4">Project Status: <b>{{ $form->project_status }}</b></li>
                    <li class="py-2 px-4">Project Person: <b>{{ $form->project_person }}</b></li>
                </ul>
            </div>

            <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>
            </div>
        </div>
        @endforeach

    </div>
    {{-- PROJECT LIST --}}
</div>


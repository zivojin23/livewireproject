<div class="grid grid-cols-2">

        {{-- FORM --}}
        <div class="">
            <div class="">

                @if (session()->has('submitted'))
                    <div class="p-6 bg-green-300 text-3xl">
                        {{ session()->get('submitted') }}
                    </div>                
                @endif

                @if (session()->has('deleted'))
                    <div class="p-6 bg-green-300 text-3xl">
                        {{ session()->get('deleted') }}
                    </div>   
                @endif
                @if (session()->has('updated'))
                    <div class="p-6 bg-green-300 text-3xl">
                        {{ session()->get('updated') }}
                    </div>                
                @endif
                @if ($updateForm)
                    @include('livewire.update')
                @else     
                    @include('livewire.create')
                @endif

            </div>
        </div>
        {{-- FORM --}}


        {{-- PROJECT LIST --}}
        <div class="">

            <h2 class="font-bold text-2xl p-4">
                PROJECT LIST - VIEW
            </h2>

            @foreach ($forms as $form)






            {{-- <div class="w-4/5 mx-auto">
                <div class="bg-white pt-10 rounded-lg drop-shadow-2xl sm:basis-3/4 basis-full sm:mr-8 pb-10 sm:pb-0">
                    <div class="w-11/12 mx-auto pb-10">

                        <h2 class="text-gray-900 text-2xl font-bold pt-6 pb-0 sm:pt-0 hover:text-gray-700 transition-all">

                            <p class="text-gray-900 text-lg py-8 w-full break-words">
                                {{ $form->first_name }}
                            </p>
                        </h2>
    
                        <p class="text-gray-900 text-lg py-8 w-full break-words">
                            {{ $form->last_name }}
                        </p>

                        <p class="text-gray-900 text-lg py-8 w-full break-words">
                            {{ $form->email}}
                        </p>
    
                        <span class="text-gray-500 text-sm sm:text-base">
                        Made by:
                            <p class="text-green-500 italic hover:text-green-400 pb-3">
                                Zivojin
                            </p>
                        13-07-2022
                    </span>
                    </div>
                </div>
            </div> --}}





                <div class="p-4">
                    <p class="py-2 px-4 font-bold">First Name: {{ $form->first_name }}</p>
                    <p class="py-2 px-4 font-bold">Last Name: {{ $form->last_name }}</p>
                    <p class="py-2 px-4 font-bold">Email: {{ $form->email }}</p>
                    <p class="py-2 px-4 font-bold">Project Name: {{ $form->project_name }}</p>
                    <p class="py-2 px-4 font-bold">Project Priority: {{ $form->project_priority }}</p>
                    <p class="py-2 px-4 font-bold">Project Status: {{ $form->project_status }}</p>
                    <p class="py-2 px-4 font-bold">Project Person: {{ $form->project_person }}</p>
                </div>

                <div class="p-4">
                    <button class="p-3 rounded-full font-bold border border-black bg-blue-300 hover:bg-blue-500" wire:click="edit({{ $form->id }})">EDIT</button>
                    <button class="p-3 rounded-full font-bold border border-black bg-red-300 hover:bg-red-500" wire:click="delete({{ $form->id }})">DELETE</button>
                </div>
            @endforeach

        </div>
        {{-- PROJECT LIST --}}

</div>

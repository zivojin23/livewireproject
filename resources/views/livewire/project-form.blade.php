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

        <div wire:loading.delay>
            <div class="flex justify-center items-center bg-blue-300 
                        fixed top-0 left-0 w-full h-full opacity-50">
                <x-loader />
            </div>
        </div>
            
        </div>
        {{-- FORM --}}
    </div>

    <div class="flex flex-col py-8 mt-8">

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


                    {{-- @if (Auth::user())
                    <div class="p-3 flex flex-col">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 mb-8 border border-gray-400 rounded-lg shadow" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                        <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>
                    </div>   
                    @endif --}}
                    
                    
                   

                    



                </div>
            </div>
          </div>
        </div>
      
  @endforeach

</div>

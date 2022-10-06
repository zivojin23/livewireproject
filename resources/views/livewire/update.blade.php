{{-- <form action="">

    <input wire:model="form_id" type="hidden"> --}}

{{-- <div class="mt-5">
    



    
    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="project_priority" class="mb-2 text-sm font-medium">Project Priority</label>
        <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_priority" id="project_priority">
            <option value="" disabled>Please select one</option>
            <option value="LOW">Low</option>
            <option value="MEDIUM">Medium</option>
            <option value="HIGH">High</option>
        </select>
        
        @error('project_priority')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="project_status" class="mb-2 text-sm font-medium">Project Status</label>        
        <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_status" id="project_status">
            <option value="" disabled>Please select one</option>
            <option value="Design">Design</option>
            <option value="Ready">Ready</option>
            <option value="In Progress">In Progress</option>
            <option value="On Hold">On Hold</option>
            <option value="Completed">Completed</option>
        </select>

        @error('project_status')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="project_person" class="mb-2 text-sm font-medium">Project Person</label>
        <input wire:model="project_person" class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="project_person" type="email">
        
        @error('project_person')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

    <div class="p-5 flex justify-end">
        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click.prevent="update()">Save<i class="fa-solid fa-check ml-5"></i></button>
        <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click.prevent="cancel()">Cancel<i class="fa-solid fa-x ml-5"></i></button>
    </div>

</div> --}}

{{-- 
<div class="flex flex-col w-3/5 mx-auto my-8">

    <label for="project_priority" class="mb-2 text-sm font-medium">Project Priority</label>
    <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_priority" id="project_priority">
        <option value="" disabled>Please select one</option>
        <option value="LOW">Low</option>
        <option value="MEDIUM">Medium</option>
        <option value="HIGH">High</option>
    </select>
    
    @error('project_priority')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
</div>

<div class="flex flex-col w-3/5 mx-auto my-8">

    <label for="project_status" class="mb-2 text-sm font-medium">Project Status</label>        
    <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_status" id="project_status">
        <option value="" disabled>Please select one</option>
        <option value="Design">Design</option>
        <option value="Ready">Ready</option>
        <option value="In Progress">In Progress</option>
        <option value="On Hold">On Hold</option>
        <option value="Completed">Completed</option>
    </select>

    @error('project_status')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
</div>

<div class="flex flex-col w-3/5 mx-auto my-8">

    <label for="project_person" class="mb-2 text-sm font-medium">Project Person</label>
    <input wire:model="project_person" class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="project_person" type="email">
    
    @error('project_person')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
</div>


<div class="p-5 flex justify-end">
    <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click.prevent="update()">Save<i class="fa-solid fa-check ml-5"></i></button>
    <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click.prevent="cancel()">Cancel<i class="fa-solid fa-x ml-5"></i></button>
</div>
 --}}





{{-- 
@foreach ($forms as $form) --}}
<h2 id="accordion-collapse-heading-1">
    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
      <span class="flex items-center">
        1 asd
    </span>
      <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>

<div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
    <div class="sm:grid sm:grid-cols-4 flex">

            

        <div class="flex flex-col">
            <div class="p-5 text-base">
                {{-- <p class="py-2 px-4 ml-3">First Name</p>
                <p class="py-2 px-4 ml-3">Last Name</p>
                <p class="py-2 px-4 ml-3">Email</p>
                <p class="py-2 px-4 ml-3">Project Name</p> --}}
                <p class="py-2 px-4 ml-3">Project Priority</p>
                <p class="py-2 px-4 ml-3">Project Status</p>
          
                <p class="py-2 px-4 ml-3">Project Person</p>
                {{-- <p class="py-2 px-4 ml-3">Attachment</p> --}}
            </div>
        </div>

 

        <div class="sm:pl-10  grid col-span-2">
            <div class="flex flex-col">
                {{-- <div class="py-5">

                    <p class="py-2 px-4 ml-3">First Name</p>
                    <p class="py-2 px-4 ml-3">Last Name</p>
                    <p class="py-2 px-4 ml-3">Email</p>
                    <p class="py-2 px-4 ml-3">Project Name</p>
                    <p class="py-2 px-4 ml-3">Project Priority</p>
                    <p class="py-2 px-4 ml-3">Project Status</p>
              
                    <p class="py-2 px-4 ml-3">Project Person</p>
                    <p class="py-2 px-4 ml-3">Attachment</p>
                    <p class="py-2  ml-3">{{ $form->first_name }}</p>
                    <p class="py-2  ml-3">{{ $form->last_name }}</p>
                    <p class="py-2  ml-3">{{ $form->email }}</p>
                    <p class="py-2  ml-3">{{ $form->project_name }}</p>
                    <p class="py-2  ml-3">{{ $form->project_priority }}</p>
                    <div class="flex flex-col w-3/5 mx-auto my-8">

                        <label for="project_priority" class="mb-2 text-sm font-medium">Project Priority</label>
                        <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_priority" id="project_priority">
                            <option value="" disabled>Please select one</option>
                            <option value="LOW">Low</option>
                            <option value="MEDIUM">Medium</option>
                            <option value="HIGH">High</option>
                        </select>
                        
                        @error('project_priority')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
                    </div>
                    <p class="py-2  ml-3">{{ $form->project_status }}</p>
                    <p class="py-2  ml-3">{{ $form->project_person }}</p>
                    <a class="bg-white hover:bg-blue-200 font-semibold py-2 px-4 ml-3 border border-gray-400 rounded-lg shadow mr-4 text-black" target="_blank" href="{{ Storage::Url($form->attachment) }}">View</a>
                </div> --}}

                <div class="flex flex-col w-3/5 mx-auto ">

                    {{-- <label for="project_priority" class="mb-2 text-sm font-medium">Project Priority</label> --}}
                    <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_priority" id="project_priority">
                        <option value="" disabled>Please select one</option>
                        <option value="LOW">Low</option>
                        <option value="MEDIUM">Medium</option>
                        <option value="HIGH">High</option>
                    </select>
                    
                    @error('project_priority')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
                </div>
                
                <div class="flex flex-col w-3/5 mx-auto ">
                
                    {{-- <label for="project_status" class="mb-2 text-sm font-medium">Project Status</label>         --}}
                    <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_status" id="project_status">
                        <option value="" disabled>Please select one</option>
                        <option value="Design">Design</option>
                        <option value="Ready">Ready</option>
                        <option value="In Progress">In Progress</option>
                        <option value="On Hold">On Hold</option>
                        <option value="Completed">Completed</option>
                    </select>
                
                    @error('project_status')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
                </div>
                
                <div class="flex flex-col w-3/5 mx-auto ">
                
                    {{-- <label for="project_person" class="mb-2 text-sm font-medium">Project Person</label> --}}
                    <input wire:model="project_person" class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="project_person" type="email">
                    
                    @error('project_person')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
                </div>
                
                
                <div class="p-5 flex justify-end">
                    <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click.prevent="update()">Save<i class="fa-solid fa-check ml-5"></i></button>
                    <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click.prevent="cancel()">Cancel<i class="fa-solid fa-x ml-5"></i></button>
                </div>
                
            </div>
        </div>


        <div class="hidden sm:block p-4">
            {{-- <p class="text-sm italic flex justify-end">{{ $form->updated_at }}</p> --}}
            
            


            {{-- <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click="edit({{ $form->id }})">Edit<i class="fa-sharp fa-solid fa-pen ml-5"></i></button>
                <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click="delete({{ $form->id }})">Delete<i class="fa-solid fa-trash ml-5"></i></button>
            </div> --}}
         
        </div>

      


    </div>
        

  </div>
  {{-- @endforeach --}}
{{-- </form> --}}


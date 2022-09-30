<form action="">

    <input wire:model="form_id" type="hidden">

<div class="mt-5">
    
    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="first_name" class="mb-2 mt-10 text-sm font-medium">First Name</label>
        <input class="cursor-not-allowed shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="first_name" type="text" wire:model="first_name" disabled >
       
        @error('first_name')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="last_name" class="mb-2 text-sm font-medium">Last Name</label>
        <input class="cursor-not-allowed shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="last_name" type="text" wire:model="last_name"  disabled>
        
        @error('last_name')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="email" class="mb-2 text-sm font-medium">Email</label>
        <input class="cursor-not-allowed shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="email" type="email" wire:model="email" disabled>
        
        @error('email')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

    <div class="flex flex-col w-3/5 mx-auto my-8">

        <label for="project_name" class="mb-2 text-sm font-medium">Project Name</label>
        <input wire:model="project_name" class="cursor-not-allowed shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" id="project_name" type="text" disabled>
        
        @error('project_name')<span class="text-red-600 text-sm font-medium">{{ $message }}</span>@enderror
    </div>

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

</div>

</form>
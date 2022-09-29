<form action="">

    <input wire:model="form_id" type="hidden">

<div class="bg-blue-100">

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="first_name">First Name</label>
        <input class="p-2 rounded-lg ml-5" id="first_name" type="text" wire:model="first_name" readonly="readonly">
       
        @error('first_name')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="last_name">Last Name</label>
        <input class="p-2 rounded-lg ml-5" id="last_name" type="text" wire:model="last_name" readonly="readonly">
        
        @error('last_name')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="email">Email</label>
        <input class="p-2 rounded-lg ml-5" id="email" type="email" wire:model="email" readonly="readonly">
        
        @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="project_name">Project Name</label>
        <input wire:model="project_name" class="p-2 rounded-lg ml-5" id="project_name" type="text" readonly="readonly">
        
        @error('project_name')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="project_priority">Project Priority</label>
        <select class="p-2 rounded-lg ml-5" wire:model="project_priority" id="project_priority">
            <option value="" disabled>Please select one</option>
            <option value="LOW">Low</option>
            <option value="MEDIUM">Medium</option>
            <option value="HIGH">High</option>
        </select>
        
        @error('project_priority')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="project_status">Project Status</label>        
        <select class="p-2 rounded-lg ml-5" wire:model="project_status" id="project_status">
            <option value="" disabled>Please select one</option>
            <option value="Design">Design</option>
            <option value="Ready">Ready</option>
            <option value="In Progress">In Progress</option>
            <option value="On Hold">On Hold</option>
            <option value="Completed">Completed</option>
        </select>

        @error('project_status')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="project_person">Project Person</label>
        <input wire:model="project_person" class="p-2 rounded-lg ml-5" id="project_person" type="email">
        
        @error('project_person')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="p-5 flex justify-end">
        <button class="bg-black hover:bg-green-700 text-white rounded-lg py-3 px-5 font-bold mr-4" wire:click.prevent="update()">Save</button>
        <button class="bg-black hover:bg-red-700 text-white rounded-lg p-3 font-bold" wire:click.prevent="cancel()">Cancel</button>
    </div>

</div>

</form>
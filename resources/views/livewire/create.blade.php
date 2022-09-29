<form action="">

<div class="bg-blue-100">

    
    <div class="py-2 px-4 flex justify-center items-center">
        
        <label for="first_name" class="">First Name</label>
        <input wire:model="first_name" class="p-2 rounded-lg ml-5" id="first_name" type="text" placeholder="Your First Name">
        
        @error('first_name')<span class="text-red-600">{{ $message }}</span>@enderror
        
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="last_name">Last Name</label>
        <input wire:model="last_name" class="p-2 rounded-lg ml-5" id="last_name" type="text" placeholder="Your Last Name">
        
        @error('last_name')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="email">Email</label>
        <input wire:model="email" class="p-2 rounded-lg ml-5" id="email" type="email" placeholder="Your Email">
        
        @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>

    <div class="py-2 px-4 flex justify-center items-center">

        <label for="project_name">Project Name</label>
        <input wire:model="project_name" class="p-2 rounded-lg ml-5" id="project_name" type="text" placeholder="Name of your project">
        
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
        <input wire:model="project_person" class="p-2 rounded-lg ml-5" id="project_person" type="text" placeholder="Contact email">
        
        @error('project_person')<span class="text-red-600">{{ $message }}</span>@enderror
    </div>







    <div class="p-5 flex justify-end">
        <button class="bg-black hover:bg-green-700 text-white rounded-lg p-3 font-bold" wire:click.prevent="store()">Submit</button>
    </div>

</div>

</form>
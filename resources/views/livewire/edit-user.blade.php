<div class="p-8">
    <form wire:submit.prevent="update">
        <div class="flex flex-col w-4/5 mx-auto my-8">

            <label for="project_priority" class="mb-2 mt-10 text-sm font-medium">Project Priority</label>
            <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_priority" id="project_priority">
                <option value="" disabled>Please select one</option>
                <option value="LOW">Low</option>
                <option value="MEDIUM">Medium</option>
                <option value="HIGH">High</option>
            </select>
        
            @error('project_priority')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>
        
        <div class="flex flex-col w-4/5 mx-auto my-8">
        
            <label for="project_status" class="mb-2 text-sm font-medium">Project Status</label>        
            <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_status" id="project_status">
                <option value="" disabled>Please select one</option>
                <option value="Design">Design</option>
                <option value="Ready">Ready</option>
                <option value="In Progress">In Progress</option>
                <option value="On Hold">On Hold</option>
                <option value="Completed">Completed</option>
            </select>
        
            @error('project_status')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>
        
        <div class="flex flex-col w-4/5 mx-auto my-8">
        
            <label for="project_person" class="mb-2 text-sm font-medium">Project Person</label>
            <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" wire:model="project_person" id="project_person" type="text" placeholder="Contact Email">
            
            @error('project_person')<span class="text-red-600">{{ $message }}</span>@enderror
        </div>
        
        <div class="p-5 flex justify-end">
            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" wire:click.prevent="update()">Save<i class="fa-solid fa-check ml-5"></i></button>
            <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" wire:click.prevent="cancel()">Cancel<i class="fa-solid fa-x ml-5"></i></button>
        </div>
    
    </form>
</div>

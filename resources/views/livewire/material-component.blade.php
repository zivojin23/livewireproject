<div class="flex">




    
        <div class="mx-auto">
            <form wire:submit="storeMaterial">
                @csrf

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="id_number" class="mb-2 mt-10 text-sm font-medium">id_number</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="id_number" id="id_number" type="text" placeholder="id_number">  
                    @error('id_number')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>
    
                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="material_name" class="mb-2 mt-10 text-sm font-medium">material Name</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="material_name" id="material_name" type="text" placeholder="material name">  
                    @error('material_name')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="measurement_unit" class="mb-2 mt-10 text-sm font-medium">measurement_unit</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="measurement_unit" id="measurement_unit" type="text" placeholder="measurement_unit">  
                    @error('measurement_unit')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>
    
    @if ($editMode)
        <div class="p-5 flex justify-end">
            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                    wire:click.prevent="updateMaterial()" type="submit">Update</button>
            <button class="bg-red-500 hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                    wire:click.prevent="cancel()">Cancel</button>
        </div>
    @else 
        <div class="p-5 flex justify-end">
            <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                    wire:click.prevent="storeMaterial()" type="submit">Store new material type</button>
        </div> 
    @endif
            



            </form>
        </div>
  

    <div class="mt-10 mx-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Material ID</th>
                    <th scope="col" class="py-3 px-6">Unique Material Number</th>
                    <th scope="col" class="py-3 px-6">Material Name</th>
                    <th scope="col" class="py-3 px-6">Measurement Unit</th>
                    <th scope="col" class="py-3 px-6">
                        <input type="text" wire:model="">
                    </th>

                    {{-- <th scope="col" class="py-3 px-6">Role</th> --}}
                    <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)    
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $material->id }}</th>
                    <td class="py-4 px-6">{{ $material->id_number }}</td>
                    <td class="py-4 px-6">{{ $material->material_name }}</td>
                    <td class="py-4 px-6">{{ $material->measurement_unit }}</td>

                    <td class="py-4 px-6 text-right">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="editMaterial({{ $material->id }})">Edit</button>                        
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="deleteMaterial({{ $material->id }})">Delete</button>                        
                    </td>    
                </tr>
                @endforeach
                {{-- {{ $materials->links() }} --}}
            </tbody>
        </table>
    </div>
</div>
<div>
<div class="w-1/5 mx-auto mt-8">
    @if (session()->has('submitted'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('submitted') }}
        </div>    
    </div>
    @endif
    @if (session()->has('updated'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('updated') }}
        </div>    
    </div>
    @endif
    @if (session()->has('deleted'))
    <div class="bg-green-100 p-4 flex justify-center rounded-lg w-4/5 mx-auto">
        <div class="font-bold text-xl text-green-700">
            {{ session()->get('deleted') }}
        </div>    
    </div>
    @endif
</div>

<div class="flex">

    <div class="w-3/5 mx-auto">
        <form wire:submit="storeMaterial">
        @csrf

        <div class="w-3/5 mx-auto">

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="unique_number" class="mb-2 mt-10 text-sm font-medium">Unique Material Number</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="unique_number" id="unique_number" type="text" placeholder="E.g. 123rX5ffz6">  
                @error('unique_number')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="material_name" class="mb-2 text-sm font-medium">Name</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="material_name" id="material_name" type="text" placeholder="E.g. brick, oak, paper...">  
                @error('material_name')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="measurement_unit" class="mb-2 text-sm font-medium">Measurement Unit</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="measurement_unit" id="measurement_unit" type="text" placeholder="E.g. litre, ton, gram, meter, m2...">  
                @error('measurement_unit')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="quantity" class="mb-2 text-sm font-medium">Quantity</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="quantity" id="quantity" type="text" placeholder="E.g. 10, 100, 500...">  
                @error('quantity')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            @if ($editMode)
                <div class="p-5 flex justify-end">
                    <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" 
                            wire:click.prevent="updateMaterial()" type="submit">Update</button>
                    <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                            wire:click.prevent="cancel()">Cancel</button>
                </div>
            @else 
                <div class="p-5 flex justify-end">
                    <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                            wire:click.prevent="storeMaterial()" type="submit">Store material</button>
                </div> 
            @endif
    
        </div>
        </form>
    </div>

{{-- TABLE --}}
<div class="w-4/5 mx-auto mt-10">

<div class="flex justify-between mb-4">
    <div class="w-3/5">
        <input class="w-full shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300"
                wire:model.debounce.300ms="search" id="search" placeholder="Search by name or unique material number">
    </div>       
                
    <div class="w-3/5 flex items-center justify-end mr-4">
        <label class="text-right text-sm ml-5 mr-4" for="perPage">Records per page</label>
        <select class="w-1/6 shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300"
                wire:model="perPage" id="perPage">
            <option>2</option>
            <option>5</option>
            <option>10</option>
            <option>25</option>
            <option>50</option>
        </select>

        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>
</div>        

    <table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            {{-- <th scope="col" class="py-3 px-6">Material ID</th> --}}
            <th scope="col" class="py-3 px-6">Unique Material Number</th>
            <th scope="col" class="py-3 px-6">Name</th>
            <th scope="col" class="py-3 px-6">Measurement Unit</th>
            <th scope="col" class="py-3 px-6">Quantity</th>
            <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($materials as $material)    
        <tr class="bg-white border-b hover:bg-gray-50">
            {{-- <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">{{ $material->id }}</th> --}}
            <th  class="py-4 px-6 font-medium text-gray-900">{{ $material->unique_number }}</th>
            <td class="py-4 px-6">{{ $material->material_name }}</td>
            <td class="py-4 px-6">{{ $material->measurement_unit }}</td>
            <td class="py-4 px-6">{{ $material->quantity }}</td>

            <td class="py-4 px-6 text-right">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click="editMaterial({{ $material->id }})">Edit</button>                        
                <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click="deleteMaterial({{ $material->id }})">Delete</button>                        
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

    <div class="py-4">
        {{ $materials->links() }}
    </div>

</div>
{{-- TABLE --}}

</div>
</div>
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
        <form wire:submit="storeReceiver">
        @csrf

        <div class="w-3/5 mx-auto">

            <div class="flex flex-col w-4/5 mx-auto my-8">      
                <label for="material_id" class="mb-2 mt-10 text-sm font-medium">Material</label>        
                <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="material_id" id="material_id">
                    <option value="" disabled selected>-- Please select one --</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->material_name }}</option>
                        @endforeach
                </select>     
                @error('material_id')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="quantity" class="mb-2 text-sm font-medium">Quantity</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="quantity" id="quantity" type="text" placeholder="E.g. 20 kg, 500 l, 160 m2...">  
                @error('quantity')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">      
                <label for="supplier_id" class="mb-2 text-sm text-gray-400 font-medium">Supplier (optional)</label>        
                <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="supplier_id" id="supplier_id">
                    <option value="" disabled selected>-- Please select one --</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                </select>     
                @error('supplier_id')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="origin" class="mb-2 text-sm text-gray-400 font-medium">Country of Origin (optional)</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="origin" id="origin" type="text" placeholder="E.g. Serbia, Morocco...">  
                @error('origin')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="storeReceiver()" type="submit">Create new reciever</button>
            </div> 


        </div>
        </form>
    </div>


{{-- TABLE --}}
<div class="w-4/5 mx-auto mt-10">

    <div class="flex justify-between mb-4">
        <div class="w-3/5">
            <input class="w-full block p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    wire:model.debounce.300ms="search" id="search" placeholder="Search - in progress">
        </div>       
                    
        {{-- <div class="w-3/5 flex items-center justify-end mr-4">
            <label class="text-right text-sm ml-5 mr-4" for="perPage">Records per page</label>
            <select class="block w-1/6 p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
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
        </div> --}}
    </div>        
    
    <table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="py-3 px-6">Receiver ID</th>
            <th scope="col" class="py-3 px-6">Material ID</th>
            <th scope="col" class="py-3 px-6">Quantity</th>
            <th scope="col" class="py-3 px-6">Supplier ID</th>
            <th scope="col" class="py-3 px-6">Country of Origin</th>
            <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($receivers as $receiver)    
        <tr class="bg-white border-b hover:bg-gray-50">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">{{ $receiver->id }}</th>
            <td class="py-3 px-5">{{ $receiver->material_id }}</td>
            <td class="py-4 px-6">{{ $receiver->quantity }}</td>
            <td class="py-4 px-6">{{ $receiver->supplier_id }}</td>
            <td class="py-4 px-6">{{ $receiver->origin }}</td>

            <td class="py-4 px-6 text-right">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click="editReceiver({{ $receiver->id }})">Edit</button>                        
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click="deleteReceiver({{ $receiver->id }})">Delete</button>                        
            </td>       
        </tr>
        @endforeach
    </tbody>
    </table>
    
    <div class="py-2.5">
        {{-- {{ $receivers->links() }} --}}
    </div>
</div>
{{-- TABLE --}}

</div>
</div>
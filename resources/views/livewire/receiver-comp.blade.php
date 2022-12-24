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

            {{-- <div class="flex flex-col w-4/5 mx-auto my-8">      
                <label for="material_id" class="mb-2 mt-10 text-sm font-medium">Material</label>        
                <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="material_id" id="material_id">
                    <option value="" disabled selected>-- Please select one --</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->material_name }}</option>
                        @endforeach
                </select>     
                @error('material_id')<span class="text-red-600">{{ $message }}</span>@enderror
            </div> --}}

            @if ($material)
                {{ $material->material_name }}, 
                {{ $material->quantity }} {{ $material->measurement_unit }},
                {{ $material->price_per_unit }}$ per unit
            @else
                @livewire('auto-complete', ['table' => 'materials', 'event' => 'selectedMaterial'])
            @endif

            @livewire('search-dropdown')

            {{-- , key($material->id --}}
            {{-- , ['table' => 'materials'] --}}

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
                    <option value="" selected>-- Please select one --</option>
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

            {{-- <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="price" class="mb-2 text-sm font-medium">Price</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="price" id="price" type="text" placeholder="...">  
                @error('price')<span class="text-red-600">{{ $message }}</span>@enderror
            </div> --}}

            @if ($editMode)
                <div class="p-5 flex justify-end">
                    <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow mr-4" 
                            wire:click.prevent="updateReceiver()" type="submit">Update</button>
                    <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                            wire:click.prevent="cancel()">Cancel</button>
                </div>
            @else 
                <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="storeReceiver()" type="submit">Create new reciever</button>
                {{-- <button class="bg-red-500 hover:bg-red-700 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="receiverCost()" type="submit">dd($receiverCost)</button> --}}
                </div> 
                
            @endif


        </div>
        </form>
    </div>

    <div class="w-4/5 mx-auto mt-10">

        <div class="flex justify-between mb-4">
            <div class="w-3/5">
                <input class="w-full shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300"
                        wire:model.debounce.300ms="search" id="search" placeholder="Search by receiver quantity">
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
                    <th scope="col" class="py-3 px-6">Receiver ID</th>
                    <th scope="col" class="py-3 px-6">Material </th>
                    <th scope="col" class="py-3 px-6">Receiver Quantity</th>
                    <th scope="col" class="py-3 px-6">Material Total Quantity</th>
                    <th scope="col" class="py-3 px-6">Receiver Cost</th>
                    <th scope="col" class="py-3 px-6"><span class="sr-only"></span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receivers as $receiver)    
                <tr class="bg-white border-b hover:bg-gray-50">
                    <th  class="py-4 px-6 font-medium text-gray-900">{{ $receiver->id }}</th>
                    <td class="py-4 px-6">{{ $receiver->material->material_name }}</td>
                    <td class="py-4 px-6">{{ $receiver->quantity }}</td>
                    <td class="py-4 px-6">{{ $receiver->material->quantity }} {{ $receiver->material->measurement_unit }}</td>
                    <td class="py-4 px-6">{{ $receiver->quantity }} x {{ $receiver->material->price_per_unit }} $</td>
        
                    <td class="py-4 px-6 text-right">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="editReceiver({{ $receiver->id }})">Edit</button>                      
                        <button class="bg-white hover:bg-red-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click="deleteReceiver({{ $receiver->id }})">Delete</button>                 
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        
            <div class="py-4">
                {{ $receivers->links() }}
            </div>
        
        </div>


</div>
</div>


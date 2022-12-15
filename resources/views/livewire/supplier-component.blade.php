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
        <form wire:submit="storeSupplier">
        @csrf

        <div class="w-3/5 mx-auto">

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="supplier_name" class="mb-2 mt-10 text-sm font-medium">Name</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="supplier_name" id="supplier_name" type="text" placeholder="E.g. Joe & sons...">  
                @error('supplier_name')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="address" class="mb-2 text-sm font-medium">Address</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="address" id="address" type="text" placeholder="E.g. Crenshaw Boulevard...">  
                @error('address')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="PIB" class="mb-2 text-sm font-medium">PIB</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="PIB" id="PIB" type="text" placeholder="...">  
                @error('PIB')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="MB" class="mb-2 text-sm font-medium">MB</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="MB" id="MB" type="text" placeholder="...">  
                @error('MB')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="email" class="mb-2 text-sm font-medium">Email</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="email" id="email" type="email" placeholder="E.g. joe@email.com">  
                @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>
            
            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="contact_phone" class="mb-2 text-sm font-medium">Contact Phone</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="contact_phone" id="contact_phone" type="text" placeholder="E.g. +381615523122">  
                @error('contact_phone')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-col w-4/5 mx-auto my-8">
                <label for="contact_person" class="mb-2 text-sm font-medium">Contact Person</label>
                <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                        wire:model="contact_person" id="contact_person" type="text" placeholder="E.g. Johnny (assistant)">  
                @error('contact_person')<span class="text-red-600">{{ $message }}</span>@enderror
            </div>

            <div class="p-5 flex justify-end">
                <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                        wire:click.prevent="storeSupplier()" type="submit">Store new supplier</button>
            </div> 

        </div>
        </form>
    </div>

<div class="w-4/5 mx-auto mt-10">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">Supplier ID</th>
                <th scope="col" class="py-3 px-6">Name</th>
                <th scope="col" class="py-3 px-6">Address</th>
                <th scope="col" class="py-3 px-6">PIB</th>
                <th scope="col" class="py-3 px-6">MB</th>
                <th scope="col" class="py-3 px-6">Email</th>
                <th scope="col" class="py-3 px-6">Phone</th>
                <th scope="col" class="py-3 px-6">Contact Person</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)    
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{ $supplier->id }}</th>
                <td class="py-4 px-6">{{ $supplier->supplier_name }}</td>
                <td class="py-4 px-6">{{ $supplier->address }}</td>
                <td class="py-4 px-6">{{ $supplier->PIB }}</td>
                <td class="py-4 px-6">{{ $supplier->MB }}</td>
                <td class="py-4 px-6">{{ $supplier->email }}</td>
                <td class="py-4 px-6">{{ $supplier->contact_phone }}</td>
                <td class="py-4 px-6">{{ $supplier->contact_person }}</td>            
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
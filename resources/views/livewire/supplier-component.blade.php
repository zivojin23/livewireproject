<div>
    <div>
        <form wire:submit="storeSupplier">
            @csrf

            <div class="w-1/5 mx-auto">

                {{-- <div class="flex flex-col w-4/5 mx-auto my-8">      
                    <label for="material_id" class="mb-2 text-sm font-medium">material_id</label>        
                    <select class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="material_id" id="material_id">
                        <option value="" disabled selected>-- Please select one --</option>
                            @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material->material_name }}</option>
                            @endforeach
                    </select>     
                    @error('material_id')<span class="text-red-600">{{ $message }}</span>@enderror
                </div> --}}

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="supplier_name" class="mb-2 mt-10 text-sm font-medium">supplier_name</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="supplier_name" id="supplier_name" type="text" placeholder="placeholder">  
                    @error('supplier_name')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="address" class="mb-2 text-sm font-medium">address</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="address" id="address" type="text" placeholder="placeholder">  
                    @error('address')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="PIB" class="mb-2 text-sm font-medium">PIB</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="PIB" id="PIB" type="text" placeholder="placeholder">  
                    @error('PIB')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="MB" class="mb-2 text-sm font-medium">MB</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="MB" id="MB" type="text" placeholder="placeholder">  
                    @error('MB')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="email" class="mb-2 text-sm font-medium">email</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="email" id="email" type="email" placeholder="placeholder">  
                    @error('email')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>
                
                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="contact_phone" class="mb-2 text-sm font-medium">contact_phone</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="contact_phone" id="contact_phone" type="text" placeholder="placeholder">  
                    @error('contact_phone')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                <div class="flex flex-col w-4/5 mx-auto my-8">
                    <label for="contact_person" class="mb-2 text-sm font-medium">contact_person</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="contact_person" id="contact_person" type="text" placeholder="placeholder">  
                    @error('contact_person')<span class="text-red-600">{{ $message }}</span>@enderror
                </div>

                {{-- <div class="flex flex-col w-4/5 mx-auto my-8">      
                    <label for="supplier_id" class="mb-2 text-sm font-medium">supplier_id</label>        
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
                    <label for="origin" class="mb-2 mt-10 text-sm font-medium">origin</label>
                    <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                            wire:model="origin" id="origin" type="text" placeholder="country of origin">  
                    @error('origin')<span class="text-red-600">{{ $message }}</span>@enderror
                </div> --}}

                <div class="p-5 flex justify-end">
                    <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                            wire:click.prevent="storeSupplier()" type="submit">Store new supplier</button>
                </div> 


            </div>

        </form>
    </div>

    <div>

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

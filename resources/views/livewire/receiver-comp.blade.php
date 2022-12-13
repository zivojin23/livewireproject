<div>

        <div class="w-1/5 mx-auto">
            <form wire:submit="storeReceiver">
                @csrf
    
                <div>
    
                    <div class="flex flex-col w-4/5 mx-auto my-8">      
                        <label for="material_id" class="mb-2 mt-10 text-sm font-medium">material_id</label>        
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
                        <label for="quantity" class="mb-2 text-sm font-medium">quantity</label>
                        <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                                wire:model="quantity" id="quantity" type="text" placeholder="...">  
                        @error('quantity')<span class="text-red-600">{{ $message }}</span>@enderror
                    </div>
    
                    <div class="flex flex-col w-4/5 mx-auto my-8">      
                        <label for="supplier_id" class="mb-2 text-sm font-medium">supplier_id (optional)</label>        
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
                        <label for="origin" class="mb-2 text-sm font-medium">origin (optional)</label>
                        <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                                wire:model="origin" id="origin" type="text" placeholder="country of origin">  
                        @error('origin')<span class="text-red-600">{{ $message }}</span>@enderror
                    </div>
    
                    <div class="p-5 flex justify-end">
                        <button class="bg-white hover:bg-green-200 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow" 
                                wire:click.prevent="storeReceiver()" type="submit">Store new receiver</button>
                    </div> 
    
    
                </div>
    
            </form>
        </div>


    
</div>

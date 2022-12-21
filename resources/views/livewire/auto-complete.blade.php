<div>
   {{-- LIVEWIRE COMPONENT - AUTOCOMPLETE INPUT ZA MATERIJALE --}}

   {{-- <div class="flex flex-col w-4/5 mx-auto my-8">



        <label for="autocomplete" class="mb-2 text-sm font-medium">Material</label>
        <input class="shadow p-2.5 text-sm rounded-lg bg-gray-50 border border-gray-300" 
                wire:model="autocomplete" id="autocomplete" type="text">
           
            
            
            @if ($results)
                    
            <div class="relative">
                <div class="absolute w-full bg-white border">
                    @foreach ($results as $result)
                        <div class="p-2.5 hover:bg-red-700">{{ $result->material_name }}</div>
                    @endforeach
                </div>
            </div>
            
            @endif
            


        @error('autocomplete')<span class="text-red-600">{{ $message }}</span>@enderror
    </div> --}}

</div>

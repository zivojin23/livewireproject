<div>
    <div class="flex flex-col border">

        @unless ($selectedMaterial)
            <input wire:model="searchMaterial" class="p-2.5" placeholder="Search for material">
        @else
            <div>{{ $selectedMaterial->material_name }}</div>
        @endunless
        

        <div class="border">

            {{-- @foreach ($materials as $material)
                <button class="p-2.5" wire:click="selectMaterial({{ $material->id }})">
                        {{ $material->material_name}}
                    </button>
            @endforeach --}}

            <div class="relative">
                <div class="absolute w-full bg-white border">
                    @foreach ($materials as $material)
                        <button class="p-2.5 hover:bg-red-700" wire:click="selectMaterial({{ $material->id }})">
                            {{ $material->material_name }}
                        </button>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Material;

class SearchDropdown extends Component
{
    public $searchMaterial = '';
    public $selectedMaterialId = null;

    public function selectMaterial($id)
    {
        $this->selectedMaterialId = $id;
    }

    public function render()
    {
        return view('livewire.search-dropdown', [
            'materials' => $this->searchMaterial
                ?   Material::where('material_name', 'like', '%'.$this->searchMaterial.'%')->get()
                :   [],
            'selectedMaterial' => Material::find($this->selectedMaterialId)
        ]);
    }
}

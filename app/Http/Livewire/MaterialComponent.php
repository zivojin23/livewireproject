<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Material;

class MaterialComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public $material_id;
    public $unique_number;
    public $material_name;
    public $measurement_unit;
    public $quantity;
    public $editMode = false;

    protected $rules = [
        'unique_number'     => 'required|unique:materials',
        'material_name'     => 'required', 
        'measurement_unit'  => 'required',
        'quantity'          => 'required|numeric',
    ];

    public function storeMaterial()
    {
        $this->validate();
        
        Material::create([
            'unique_number'     => $this->unique_number,
            'material_name'     => $this->material_name,
            'measurement_unit'  => $this->measurement_unit,
            'quantity'          => $this->quantity
        ]);

        $this->reset(['unique_number','material_name', 'measurement_unit', 'quantity']);
        session()->flash('submitted', 'Submitted!');
    }

    public function editMaterial($id)
    {
        $material = Material::findOrFail($id);
        $this->material_id       = $material->id;
        $this->unique_number     = $material->unique_number;
        $this->material_name     = $material->material_name;
        $this->measurement_unit  = $material->measurement_unit;
        $this->quantity          = $material->quantity;
        $this->editMode          = true;
    }

    public function updateMaterial()
    {
        Material::find($this->material_id)->update([
            'material_id'        => $this->material_id,
            'unique_number'      => $this->unique_number,
            'material_name'      => $this->material_name,
            'measurement_unit'   => $this->measurement_unit,
            'quantity'           => $this->quantity,
        ]);

        $this->editMode = false;
        $this->reset(['material_id','unique_number','material_name', 'measurement_unit', 'quantity']);
        session()->flash('updated', 'Updated!');
    }
    // experiment
    public function updateMaterialById()
    {
        Material::find($this->material_id)->update([
            'quantity' => $this->quantity,
        ]);

        $this->editMode = false;
        $this->reset(['material_id','unique_number','material_name', 'measurement_unit', 'quantity']);
        session()->flash('updated', 'Updated!');
    }

    public function deleteMaterial($id)
    {
        Material::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted!');
    }

    public function cancel()
    {
        $this->reset(['material_id','unique_number','material_name', 'measurement_unit']);
        $this->editMode = false;
    }

    public function render()
    {
        return view('livewire.material-component', [
            'materials' => Material::where('unique_number', 'like', '%'.$this->search.'%')
                                    ->orWhere('material_name', 'like', '%'.$this->search.'%')
                                    ->paginate($this->perPage)
        ]);
    }
}

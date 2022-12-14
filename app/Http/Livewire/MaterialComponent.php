<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Material;

class MaterialComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;

    public $material_id;
    public $id_number;
    public $material_name;
    public $measurement_unit;
    public $editMode = false;

    public function storeMaterial()
    {
        Material::create([
            'id_number'         => $this->id_number,
            'material_name'     => $this->material_name,
            'measurement_unit'   => $this->measurement_unit
        ]);

        $this->reset(['id_number','material_name', 'measurement_unit']);
        session()->flash('submitted', 'Submitted!');
    }

    public function editMaterial($id)
    {
        $material = Material::findOrFail($id);
        $this->material_id      = $material->id;
        $this->id_number        = $material->id_number;
        $this->material_name    = $material->material_name;
        $this->measurement_unit = $material->measurement_unit;
        $this->editMode         = true;
    }

    public function updateMaterial()
    {
        Material::find($this->material_id)->update([
            'material_id'        => $this->material_id,
            'id_number'          => $this->id_number,
            'material_name'      => $this->material_name,
            'measurement_unit'   => $this->measurement_unit
        ]);

        $this->editMode = false;
        $this->reset(['material_id','id_number','material_name', 'measurement_unit']);
        session()->flash('updated', 'Updated!');
    }

    public function deleteMaterial($id)
    {
        Material::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted!');
    }

    public function cancel()
    {
        $this->reset(['material_id','id_number','material_name', 'measurement_unit']);
        $this->editMode = false;
    }

    public function render()
    {
        return view('livewire.material-component', [
            'materials' => Material::search($this->search)->paginate($this->perPage),
        ]);
    }
}

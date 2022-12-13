<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;

class SupplierComponent extends Component
{
    public $supplier_id;
    public $supplier_name;
    public $address;
    public $PIB;
    public $MB;
    public $email;
    public $contact_phone;
    public $contact_person;
    public $editMode = false;

    protected $rules = [
        'supplier_name'      => 'required',
        'address'            => 'required',
        'PIB'                => 'required',
        'MB'                 => 'required',
        'email'              => 'required|email',
        'contact_phone'      => 'required'
    ];

    public function storeSupplier()
    {
        $this->validate();

        Supplier::create([
            'supplier_name'     => $this->supplier_name,
            'address'           => $this->address,
            'PIB'               => $this->PIB,
            'MB'                => $this->MB,
            'email'             => $this->email,
            'contact_phone'     => $this->contact_phone,
            'contact_person'    => $this->contact_person
        ]);

        // $this->reset(['id_number','material_name', 'measurement_unit']);
        session()->flash('submitted', 'Submitted!');
    }

    public function editSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        $this->supplier_id      = $supplier->id;
        $this->supplier_name    = $supplier->supplier_name;
        $this->address          = $supplier->address;
        $this->PIB              = $supplier->PIB;
        $this->MB               = $supplier->MB;
        $this->email            = $supplier->email;
        $this->contact_phone    = $supplier->contact_phone;
        $this->contact_person   = $supplier->contact_person;
        $this->editMode         = true;
    }

    public function updateSupplier()
    {
        // Material::find($this->material_id)->update([
        //     'material_id'        => $this->material_id,
        //     'id_number'          => $this->id_number,
        //     'material_name'      => $this->material_name,
        //     'measurement_unit'   => $this->measurement_unit
        // ]);

        $this->editMode = false;
        // $this->reset(['material_id','id_number','material_name', 'measurement_unit']);
        session()->flash('updated', 'Updated!');
    }

    public function deleteSupplier($id)
    {
        Supplier::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted!');
    }

    public function render()
    {
        $suppliers = Supplier::get();
        return view('livewire.supplier-component', compact('suppliers'));
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Material;
use App\Models\Receiver;
use App\Models\Supplier;

class ReceiverComp extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5;

    public $material_id = '';
    public $quantity;
    public $supplier_id = '';
    public $origin;

    protected $rules = [
        'material_id'      => 'required',
        'quantity'         => 'required'
    ];
    
    public function storeReceiver()
    {
        Receiver::create([
            'material_id'     => $this->material_id,
            'quantity'        => $this->quantity,
            'supplier_id'     => $this->supplier_id,
            'origin'          => $this->origin
        ]);

        $this->reset(['material_id','quantity', 'supplier_id', 'origin']);
        session()->flash('submitted', 'Submitted!');
    }

    public function render()
    {
        $receivers = Receiver::all();
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('livewire.receiver-comp', [
            'materials' => $materials,
            'suppliers' => $suppliers,
            'receivers' => $receivers,
            // 'receivers' => Receiver::search($this->search)->paginate($this->perPage),
        ]);
    }
}

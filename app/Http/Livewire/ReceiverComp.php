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

    public $receiver_id;
    public $material_id = '';
    public $quantity;
    public $supplier_id = '';
    public $origin;
    public $price;
    public $editMode = false;

    protected $rules = [
        'material_id'      => 'required',
        'quantity'         => 'required|numeric',
        'price'            => 'required',

    ];
    
    public function storeReceiver()
    {
        $this->validate();

        Receiver::create([
            'material_id'     => $this->material_id,
            'quantity'        => $this->quantity,
            'supplier_id'     => $this->supplier_id,
            'origin'          => $this->origin,
            'price'           => $this->price,
        ]);

        $this->reset(['material_id','quantity', 'supplier_id', 'origin', 'price']);
        session()->flash('submitted', 'Submitted!');
    }

    public function editReceiver($id)
    {
        $receiver = Receiver::findOrFail($id);
        $this->receiver_id      = $receiver->id;
        $this->material_id      = $receiver->material_id;
        $this->quantity         = $receiver->quantity;
        $this->supplier_id      = $receiver->supplier_id;
        $this->origin           = $receiver->origin;
        $this->price            = $receiver->price;
        $this->editMode         = true;
    }

    public function updateReceiver()
    {
        Receiver::find($this->receiver_id)->update([
            'material_id'     => $this->material_id,
            'quantity'        => $this->quantity,
            'supplier_id'     => $this->supplier_id,
            'origin'          => $this->origin,
            'price'           => $this->price
        ]);

        $this->editMode = false;
        $this->reset(['material_id','quantity','supplier_id', 'origin', 'price']);
        session()->flash('updated', 'Updated!');
    }

    public function deleteReceiver($id)
    {
        Receiver::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted!');
    }

    public function cancel()
    {
        $this->reset(['material_id','quantity','supplier_id', 'origin', 'price']);
        $this->editMode = false;
    }

    public function render()
    {
        $materials = Material::all();
        $suppliers = Supplier::all();

        return view('livewire.receiver-comp', [
            'materials' => $materials,
            'suppliers' => $suppliers,
            'receivers' => Receiver::where('quantity', 'like', '%'.$this->search.'%')
                                    ->paginate($this->perPage),
        ]);
    }
}

// with('material')->where('material_id', 'like', '%'.$this->search.'%')
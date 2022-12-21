<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Material;
use App\Models\Receiver;
use App\Models\Supplier;
use App\Http\Livewire\AutoComplete;

class ReceiverComp extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public $receiver_id;
    public $material_id = '';
    public $quantity;
    public $supplier_id = '';
    public $origin;

    public $editMode = false;

    protected $rules = [
        'material_id'      => 'required',
        'quantity'         => 'required|numeric'
    ];
    
    public function storeReceiver()
    {
        $this->validate();

        $newReceiver = Receiver::create([
            'material_id'     => $this->material_id,
            'quantity'        => $this->quantity,
            'supplier_id'     => $this->supplier_id,
            'origin'          => $this->origin
        ]);

        $this->addToTotalStock($newReceiver);
        $this->reset(['material_id','quantity', 'supplier_id', 'origin']);
        session()->flash('submitted', 'Submitted!');
    }

    public function receiverCost($newReceiver, $receiver_id)
    {
        // $receiverCost = $newReceiver->quantity;
        // * $newReceiver->material->price_per_unit;
        // $newReceiver = Receiver::where('id', $this->receiver_id);
        dd($newReceiver->toJson(JSON_PRETTY_PRINT));
        // ->material->price_per_unit


    }
    

    public function addToTotalStock($newReceiver)
    {
        $quantity      = $newReceiver->quantity;
        $material_id   = $newReceiver->material->id;

        $receiverQty   = $newReceiver->quantity;
        $stockQty      = $newReceiver->material->quantity;
        $totalQty      = $receiverQty + $stockQty;

        Material::where('id', $material_id)->update([
            'quantity' => $totalQty
        ]);
    }

    public function editReceiver($id)
    {
        $receiver = Receiver::findOrFail($id);
        $this->receiver_id      = $receiver->id;
        $this->material_id      = $receiver->material_id;
        $this->quantity         = $receiver->quantity;
        $this->supplier_id      = $receiver->supplier_id;
        $this->origin           = $receiver->origin;
        $this->editMode         = true;
    }

    public function updateReceiver()
    {
        Receiver::find($this->receiver_id)->update([
            'material_id'     => $this->material_id,
            'quantity'        => $this->quantity,
            'supplier_id'     => $this->supplier_id,
            'origin'          => $this->origin
        ]);

        $this->editMode = false;
        $this->reset(['material_id','quantity','supplier_id', 'origin']);
        session()->flash('updated', 'Updated!');
    }

    public function deleteReceiver($id)
    {
        Receiver::findOrFail($id)->delete();
        session()->flash('deleted', 'Deleted!');
    }

    public function cancel()
    {
        $this->reset(['material_id','quantity','supplier_id', 'origin']);
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
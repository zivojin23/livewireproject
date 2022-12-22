<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Material;
use App\Models\Receiver;

class AutoComplete extends Component
{
    public $autocomplete;
    public $table;
    public $results = array();
    public $event;

    public function updatedAutocomplete()
    {
        if($this->autocomplete!='')
        {
            $this->results = DB::table($this->table)->where('material_name', 'like', '%'.$this->autocomplete.'%')->get();
        }
        else
        {
            $this->results = [];
        }
    }

    public function select($resultId)
    {
        // dd($resultId);
        $this->emitUp($this->event, $resultId);
        $this->reset('results');
    }

    public function render()
    {
        return view('livewire.auto-complete');
    }
}

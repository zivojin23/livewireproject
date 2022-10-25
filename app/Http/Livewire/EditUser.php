<?php

namespace App\Http\Livewire;

use App\Models\Form;
use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{

    public $project_priority = '';
    public $project_status = '';
    public $project_person;

    public $form_id;

    public Form $form;

    protected $rules = [

        'project_priority' => 'required',
        'project_status' => 'required',
        'project_person' => 'required|email',

        
    ];

    public function mount(Form $form)
    {
        $this->form = $form;
    }

    public function update()
    {
        $this->validate();

        Form::find($this->form_id)->fill([

            'project_priority' => $this->project_priority,
            'project_status' => $this->project_status,
            'project_person' => $this->project_person
        ])->save();

        session()->flash('updated', 'Updated!');

    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
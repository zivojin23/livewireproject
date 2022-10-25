<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Notifications\WelcomeEmailNotification;
Use App\Mail\WelcomeMail;
use App\Models\Form;
use App\Models\User;

class ProjectForm extends Component
{
    use WithFileUploads;

    public $forms;

    public $first_name;
    public $last_name;
    public $email;
    public $project_name;
    public $project_priority = '';
    public $project_status = '';
    public $project_person;
    public $attachment;

    public $form_id;
    public $updateForm = false;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'project_name' => 'required',
        'project_priority' => 'required',
        'project_status' => 'required',
        'project_person' => 'required|email',
        'attachment' => 'required',
        
    ];

    // protected $messages = [
    //     'email.required' => 'The Email Address cannot be empty.',
    //     'email.email' => 'The Email Address format is not valid.',
    // ];

    // public function __construct()
    // {
    //     $this->middleware('auth')->only('edit');
    // }

    public function mount()
    {
        $this->forms = Form::orderBy('updated_at', 'desc')->get();
    }

    public function store()
    {
        
        $this->validate();

        if (Auth::user()) {
            
            $this->first_name = Auth::user()->first_name;
            $this->last_name = Auth::user()->last_name;
            $this->email = Auth::user()->email;
        }

        

        Form::create([
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'email'             => $this->email,
            'project_name'      => $this->project_name,
            'project_priority'  => $this->project_priority,
            'project_status'    => $this->project_status,
            'project_person'    => $this->project_person,
            'attachment'        => $this->attachment->store('public/docs'),
            'user_id'           => Auth::id()
 
        ]);

        Mail::to($this->project_person)->send(new WelcomeMail());

        session()->flash('submitted', 'Submitted!');

        $this->reset(['first_name','last_name','email', 'project_name', 'project_priority', 'project_status', 'project_person', 'attachment']);

        // return redirect('/email');

    }

    public function edit($id)
    {
        $form = Form::findOrFail($id);
        $this->first_name = $form->first_name;
        $this->last_name = $form->last_name;
        $this->email = $form->email;
        $this->project_name = $form->project_name;
        $this->project_priority = $form->project_priority;
        $this->project_status = $form->project_status;
        $this->project_person = $form->project_person;

        $this->form_id = $form->id;
        $this->updateForm = true;

    }

    public function cancel()
    {
        $this->updateForm = false;

        $this->reset(['first_name','last_name','email', 'project_name', 'project_priority', 'project_status', 'project_person', 'attachment']);
    }

    public function update()
    {
        $this->validate();

        Form::find($this->form_id)->fill([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'project_name' => $this->project_name,
            'project_priority' => $this->project_priority,
            'project_status' => $this->project_status,
            'project_person' => $this->project_person
        ])->save();

        session()->flash('updated', 'Updated!');

        // $this->reset(['first_name','last_name','email', 'project_name', 'project_priority', 'project_status', 'project_person']);

    }

    public function delete($id)
    {

        Form::findOrFail($id)->delete();

        session()->flash('deleted', 'Deleted!');

        $this->reset(['first_name','last_name','email', 'project_name', 'project_priority', 'project_status', 'project_person', 'attachment']);

    }

    public function render()
    {
        return view('livewire.project-form');
    }


}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $contactId;

    protected $listeners = [
        'editContact' => 'edit',
        'createContact' => 'create',
    ];

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function save()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if ($this->contactId) {
            $contact = Auth::user()->contacts()->findOrFail($this->contactId);

            $contact->update($data);
        } else {
            Auth::user()->contacts()->create($data);
        }

        $this->reset(['name', 'email', 'phone', 'contactId']);
        $this->dispatchBrowserEvent('close-modal');



        $this->emit('refreshContacts');
    }

    public function edit($id)
    {
       
        $contact = Auth::user()->contacts()->findOrFail($id);
    
        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->contactId = $id;
    
        $this->dispatchBrowserEvent('open-modal');
    }
    
    
    public function create()
    {
        $this->reset(['name', 'email', 'phone', 'contactId']);
        $this->dispatchBrowserEvent('openModal');
    }
}

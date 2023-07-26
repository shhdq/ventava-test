<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactsList extends Component
{
    protected $listeners = [
        'refreshContacts' => '$refresh',
    ];

    public function delete($id)
    {
        $contact = Auth::user()->contacts()->findOrFail($id);

        $contact->delete();

        $this->emit('refreshContacts');
    }

    public function render()
    {
        return view('livewire.contacts-list', [
            'contacts' => Auth::user()->contacts,
        ]);
    }
}

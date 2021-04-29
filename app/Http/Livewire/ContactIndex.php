<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{
    public function render()
    {
        return view('livewire.contact-index', ["data" => Contact::latest()->get(), "id" => 1]);
    }
}

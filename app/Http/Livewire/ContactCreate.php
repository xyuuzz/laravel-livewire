<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactCreate extends Component
{
    public $contacts; // ini adalah properti milik class ini
    public function mount($contacts) //sedangkan yang ini adalah variabel yang dikirimkan oleh componentcontact-index
    {
        $this->contacts = $contacts;
    }
    // Code diatas tidak dibutuhkan, tetapi untuk dokumentasi saja


    public function render()
    {

        return view('livewire.contact-create');
    }
}

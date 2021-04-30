<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $listeners = [
        "contactUpdate", // jika tidak ada value / tidak berbentuk array asosiatif, maka nama method nya adalah default
    ];

    public $name, $contactId;
    public $number_phone;

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function contactUpdate($contact)
    {
        $this->name = $contact["name"];
        $this->number_phone = $contact["number_phone"];
        $this->contactId = $contact["id"];
    }

    public function update()
    {
        $this->validate([
            "name" => "required|string|min:3",
            "number_phone" => "required|string|max:15"
        ]);

        $contactUpdate = Contact::where('id', $this->contactId)->update([
            "name" => $this->name,
            "number_phone" => $this->number_phone
        ]);

        $this->resetInput();

        $this->emit("contactUpdated", $contactUpdate);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->number_phone = null;
    }

}

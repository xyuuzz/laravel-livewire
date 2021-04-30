<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
    // menerima value contacts yang dikirmkan oleh index, lalu mendefinisikanya
    public function __construct(private $contacts)
    {

    }
    // Code diatas tidak dibutuhkan, tetapi untuk dokumentasi saja


    public $name;
    public $number_phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
        // dibawah ini adalah cara mem-validate sebuah form pada livewire
        $this->validate([ // $this disini merepresentasikan data yang dikirim oleh form
            "name" => "required|string|min:3",
            "number_phone" => "required|string|max:15"
        ]);

        $data = Contact::create([
            "name" => $this->name,
            "number_phone" => $this->number_phone
        ]);

        $this->resetInput();

        // Disini kita akan mengirimkan data yang nanti akan masuk ke dalam method yang bernama contactStored,
        // Method ini dapat digunakan oleh seluruh component livewire, tapi dengan syarat nama method harus didefinisikan terlebih dahulu ke dalam property array bernama listeners
        $this->emit("contactStored", $data);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->number_phone = null;
    }
}

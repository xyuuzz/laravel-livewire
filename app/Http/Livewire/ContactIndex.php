<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    public $statusUpdate = false;
    public $paginate = 5;
    public $request;

    // property listeners menerima value dari method emit
    public $listeners = [
        "contactStored" => "handleContactStored", // contactStored adalah nama method dafault, sedangkan value contactStored adalah nama method baru untuk contactStored
        "contactUpdated" => "handleContactUpdated"
    ];



    protected $updatedQueryString = ["request"];

    public function mount()
    {
        $this->request = request()->query("request", $this->request);
    }



    public function render()
    {

        return view('livewire.contact-index', [
            "data" =>  $this->request === null ?
                        Contact::latest()->paginate($this->paginate) :
                        Contact::where("name", "LIKE", "%{$this->request}%")->latest()->paginate($this->paginate),
            "id" => 1
        ]);
    }


    public function getContact(Contact $contact)
    {
        $this->statusUpdate = true;
        $this->emit("contactUpdate", $contact);
    }

    public function destroyContact(Contact $data)
    {
        $data->delete();

        session()->flash('success', 'Contact Berhail di Hapus');
    }

    // handle listeners
    public function handleContactStored($data)
    {
        session()->flash("success", "Contact Berhasil dimasukan");
    }

    public function handleContactUpdated()
    {
        session()->flash('success', 'Contact Berhail di Update');
        $this->statusUpdate = false;
    }
}

<div>
    @if (session("success"))
        <div class="alert alert-success">
            {{session("success")}}
        </div>
    @endif

    @if ($statusUpdate)
        <livewire:contact-update ></livewire:contact-update>
        @else
        <livewire:contact-create :contacts=$data></livewire:contact-create>
    @endif
    {{-- :contacts=$data :
        :contacts => adalah variabel yang dimiliki oleh contact-index, atau yang dimiliki oleh si pemanggil component livewire

        $data => adalah nama variabel yang dikirimkan oleh contact-index atau si pemanggil component livewire yang value nya adalah :contact (yang ditetapkan)
    --}}

    <div class="row mt-3">
        <div class="col flex">
            <select wire:model='paginate' name="paginate" id="" class="form-control form-control-sm sw w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>

        <div class="col">
            <input wire:model='request' type="text" class="form-control form-control-sm w-auto" placeholder="Cari Contact">
        </div>
    </div>

    <hr>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $contact)
            <tr>
                <td scope="row">{{$id++}}</td>
                <td scope="row">{{$contact->name}}</td>
                <td scope="row">{{$contact->number_phone}}</td>
                <td>
                    <button wire:click="getContact({{$contact->id}})" type="button" class="btn btn-sm btn-info">Edit</button>

                    <button wire:click='destroyContact({{$contact->id}})' type="button" class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$data->links("vendor.livewire.bootstrap")}}
</div>


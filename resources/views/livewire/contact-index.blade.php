<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <livewire:contact-create :contacts=$data></livewire:contact-create>
    {{-- :contacts=$data :
        :contacts => adalah variabel yang dimiliki oleh contact-index, atau yang dimiliki oleh si pemanggil component livewire

        $data => adalah nama variabel yang dikirimkan oleh contact-index atau si pemanggil component livewire yang value nya adalah :contact (yang ditetapkan)
    --}}

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
                    <button class="btn btn-sm btn-info">Edit</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

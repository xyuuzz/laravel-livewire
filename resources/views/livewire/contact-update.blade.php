<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h4 class="text-dark">Formulir Pendaftaran</h4>
    <form action="" wire:submit.prevent="update">
        {{-- wire:submit.prevent => jika tombol submit form ditekan, maka jalankan method store yang ada di controller
            livewire  --}}
        <label for="name" class="form-label text-dark">Nama</label>
        <input wire:model="name" class="@error("name") is-invalid @enderror form-control mb-3" type="text" name="name" id="name" placeholder="Nama Anda" required>
        @error("name")
            <div class="invalid-feedback mb-3">
                <strong>{{$message}}</strong>
            </div>
        @enderror

        <label for="nomor_hp" class="form-label text-dark">Nomor HP</label>
        <input wire:model="number_phone" class="form-control mb-3 @error("name") is-invalid @enderror" type="text" placeholder="Nomor HP" name="number_phone" id="nomor_hp" required>
        @error("number_phone")
            <div class="invalid-feedback mb-3">
                <strong>{{$message}}</strong>
            </div>
        @enderror


        <button type="submit" class="btn btn-sml btn-primary mb-4">Update</button>
    </form>

</div>

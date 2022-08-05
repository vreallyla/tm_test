@if (isset($detail) || isset($add))
    <div class="w-1/2">
        <div class="bg-card rounded-lg w-full px-4 py-6">
            {{-- title --}}
            <div>
                <h4 class="text-2xl font-semibold">
                    {{ isset($detail) ? 'Ubah' : 'Tambah' }} Poli</h4>
            </div>

            {{-- form --}}
            <form class="pt-4 space-y-3" method="post"
                action="{{ isset($detail) ? route('poli.update', ['poli' => $detail->kode]) : route('poli.store') }}">
                @csrf
                @method(isset($detail) ? 'PUT' : 'POST')
                {{-- KODE --}}
                <x-forms.input :required="true" name="kode" label="Kode Poli"
                    value="{{ isset($detail) ? $detail->kode : '' }}" />

                {{-- NAMA --}}
                <x-forms.input :required="true" name="nama" label="Nama Poli"
                    value="{{ isset($detail) ? $detail->nama : '' }}" />

                <div class="flex gap-x-3">
                    <button class="mt-4 bg-teal-500 py-2 w-1/2 rounded-lg"
                        type="submit">{{ isset($detail) ? 'Ubah' : 'Tambah' }}</button>
                    <a href="{{ route('poli.index') }}"
                        class="mt-4 bg-badge py-2 w-1/2 rounded-lg text-center">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endif

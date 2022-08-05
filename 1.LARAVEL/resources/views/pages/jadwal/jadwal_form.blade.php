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
            <div>
                <label class="flex items-start gap-x-1" for="kode"><span>Kode</span> <svg
                        class="w-2 text-rose-400" stroke="currentColor" fill="currentColor"
                        stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z">
                        </path>
                    </svg></label>
                <input type="text" name="kode" id="kode" placeholder="isi kode..."
                    value="{{ isset($detail) ? $detail->kode : '' }}"
                    class="mt-0.5 w-full px-2 bg-badge rounded-lg py-1.5 text-white border border-slate-800 focus:border-sky-500 hover:border-sky-500 focus:hover:shadow-lg outline-0">
                @if (count($errors->get('kode')))
                    <span class="text-rose-400">{{ $errors->get('kode')[0] }}</span>
                @endif
            </div>
            <div>
                <label class="flex items-start gap-x-1" for="nama"><span>Nama</span> <svg
                        class="w-2 text-rose-400" stroke="currentColor" fill="currentColor"
                        stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 0a1 1 0 0 1 1 1v5.268l4.562-2.634a1 1 0 1 1 1 1.732L10 8l4.562 2.634a1 1 0 1 1-1 1.732L9 9.732V15a1 1 0 1 1-2 0V9.732l-4.562 2.634a1 1 0 1 1-1-1.732L6 8 1.438 5.366a1 1 0 0 1 1-1.732L7 6.268V1a1 1 0 0 1 1-1z">
                        </path>
                    </svg></label>
                <input type="text" name="nama" id="nama" placeholder="isi nama..."
                    value="{{ isset($detail) ? $detail->nama : '' }}" required
                    class="mt-0.5 w-full px-2 bg-badge rounded-lg py-1.5 text-white border border-slate-800 focus:border-sky-500 hover:border-sky-500 focus:hover:shadow-lg outline-0">
                @if (count($errors->get('nama')))
                    <span class="text-rose-400">{{ $errors->get('nama')[0] }}</span>
                @endif
            </div>
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

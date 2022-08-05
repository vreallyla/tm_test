<article class="bg-card rounded-lg h-[9.5rem]" x-data="{{ json_encode($dt) }}">
    <header class="flex flex-col items-center justify-center h-24">
        <h4 class="text-2xl">{{ $dt->nama }}</h4>
        <span class="text-icon">{{ $dt->kode }}</span>
    </header>
    <footer class="flex h-12 divide-x-2 divide-badge py-2 px-2">
        <div class="w-1/2 relative">
            <a href="{{ route('poli.edit', ['poli' => $dt->kode]) }}"
                class="group flex items-center justify-center gap-x-1.5 mx-auto">

                <svg class="text-icon text-xl hover:text-white" stroke="currentColor"
                    fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                    stroke-linejoin="round" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 20h9"></path>
                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                </svg>
                <span class="capitalize">Ubah</span>
            </a>
        </div>
        <div class="w-1/2 relative">
            <button @class([
                'group flex items-center gap-x-1.5 mx-auto',
                'opacity-70 cursor-not-allowed relative justify-center' => $dt->is_used
                    ? true
                    : false,
            ])
                @click="if(!is_used){deleteCode=kode;deleteName=nama}">

                <svg class="text-icon text-xl hover:text-white" stroke="currentColor"
                    fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em"
                    width="1em" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z">
                        </path>
                    </g>
                </svg>
                <span class="capitalize">Hapus</span>
                @if ($dt->is_used)
                    <div
                        class="hidden group-hover:block top-[-53px] w-[10rem] absolute bg-slate-900 text-icon px-2 rounded-md shadow-xl">
                        <span>Sudah digunakan di halaman
                            pegawai</span>
                    </div>
                @endif
            </button>
        </div>
    </footer>
</article>

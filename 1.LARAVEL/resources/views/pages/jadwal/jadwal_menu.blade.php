<div class="w-full bg-card rounded-lg space-y-2 py-4 px-6">
    <form class="w-full relative py-4" action="{{ route('poli.index') }}">
        @csrf
        <button type="submit" class="group absolute left-[15px] top-[27px]">
            <svg class="group-hover:text-white text-icon w-[25px]" stroke="currentColor" fill="none"
                stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </button>
        <input type="text" name="q" placeholder="Cari..." value="{{ $search }}"
            class="w-full pl-12 pr-4 bg-badge rounded-lg py-1.5 text-white border border-slate-800 focus:border-sky-500 hover:border-sky-500 focus:hover:shadow-lg outline-0">
    </form>
    <nav class="w-full relative">
        <ul class="text-white space-y-4">
            <li>
                <a class="group flex gap-x-2 items-center" href="{{ route('poli.create') }}">
                    <svg class="text-icon text-2xl group-hover:text-white" stroke="currentColor"
                        fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em"
                        width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M328 544h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8z">
                        </path>
                        <path
                            d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zm-40 728H184V184h656v656z">
                        </path>
                    </svg>

                    <span>Tambah Poli</span>
                </a>
            </li>
            {{-- <li>
                <button class="flex gap-x-2 items-center">

                    <svg class="text-icon text-2xl group-hover:text-white" stroke="currentColor"
                        fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em"
                        width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 2H8c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zM8 16V4h12l.002 12H8z">
                        </path>
                        <path
                            d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4V8zm8.933 3.519-1.726-1.726-1.414 1.414 3.274 3.274 5.702-6.84-1.538-1.282z">
                        </path>
                    </svg>

                    <span>Pilih Data</span>
                </button>
            </li> --}}
        </ul>
    </nav>
</div>

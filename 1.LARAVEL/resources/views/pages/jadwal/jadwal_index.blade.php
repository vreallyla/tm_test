<x-layouts.extend title="Pengaturan" page="jadwal">
    <div x-data="{ deleteName: null, deleteCode: null }">
        <div class="pt-8 flex gap-x-5">

            {{-- MENU --}}
            <div class="w-full space-y-4">
                <div class="w-full bg-card rounded-lg space-y-2 py-4 px-6">
                    <div class="flex items-center gap-x-3">
                        <form class="w-full relative py-4" action="http://localhost:8000/poli">
                            <input type="hidden" name="_token" value="TNvn500clF7NKJXdSt6xFBtv8yNTkSidb4NWQvyR"> <button
                                type="submit" class="group absolute left-[15px] top-[27px]">
                                <svg class="group-hover:text-white text-icon w-[25px]" stroke="currentColor"
                                    fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                    stroke-linejoin="round" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                            <input type="text" name="q" placeholder="Cari..." value=""
                                class="w-full pl-12 pr-4 bg-badge rounded-lg py-1.5 text-white border border-slate-800 focus:border-sky-500 hover:border-sky-500 focus:hover:shadow-lg outline-0">
                        </form>
                        <div class="flex-none"><a
                                class="group flex gap-x-1 items-center justify-center w-44 h-9 text-white bg-sky-500 hover:bg-sky-600 rounded-md"
                                href="http://localhost:8000/poli/tambah" style="height: 36px;">
                                <svg class="text-teal-100 text-2xl group-hover:text-white" stroke="currentColor"
                                    fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em"
                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M328 544h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8z">
                                    </path>
                                    <path
                                        d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zm-40 728H184V184h656v656z">
                                    </path>
                                </svg>

                                <span>Tambah Jadwal</span>
                            </a></div>
                    </div>
                    <nav class="w-full relative">
                        <ul class="text-white space-y-4">
                            <li>
                                <a class="group flex gap-x-2 items-center" href="http://localhost:8000/poli/tambah">
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

                        </ul>
                    </nav>
                </div>
            </div>

          
        </div>
        {{-- modal --}}
        <x-modal.message />
        <x-modal.delete />
    </div>
</x-layouts.extend>

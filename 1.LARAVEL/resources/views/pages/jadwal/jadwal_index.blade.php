<x-layouts.extend title="Pengaturan" page="jadwal">
    <div x-data="{ deleteName: null, deleteCode: null, openUpdate:false }">
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
                        <div class="flex-none"><button
                                class="group flex gap-x-1 items-center justify-center w-44 h-9 text-white bg-sky-500 hover:bg-sky-600 rounded-md"
                                @click="openUpdate=true"
                                style="height: 36px;">
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

                                <span>Atur Jadwal</span>
                            </button></div>
                    </div>
                    <nav class="w-full relative">
                        <ul class="text-white space-y-4">
                            <li>
                                <a href="{{ route('jadwal.export') }}"
                                    class="group flex gap-x-2 items-center bg-rose-500 hover:bg-rose-600 py-1 w-36 justify-center rounded-lg"
                                    href="http://localhost:8000/poli/tambah">

                                    <svg class=" text-2xl " stroke="currentColor" fill="currentColor" stroke-width="0"
                                        viewBox="0 0 24 24" height="1em" width="1em"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill="none" class="stroke-rose-100" stroke-width="2"
                                            d="M4.99787498,8.99999999 L4.99787498,0.999999992 L19.4999998,0.999999992 L22.9999998,4.50000005 L23,23 L4,23 M18,1 L18,6 L23,6 M3,12 L3.24999995,12 L4.49999995,12 C6.5,12 6.75,13.25 6.75,14 C6.75,14.75 6.5,16 4.49999995,16 L3.24999995,16 L3.24999995,18 L3,17.9999999 L3,12 Z M9.5,18 L9.5,12 C9.5,12 10.4473684,12 11.2052633,12 C12.3421053,12 13.5,12.5 13.5,15 C13.5,17.5 12.3421053,18 11.2052633,18 C10.4473684,18 9.5,18 9.5,18 Z M16.5,19 L16.5,12 L20.5,12 M16.5,15.5 L19.5,15.5">
                                        </path>
                                    </svg>

                                    <span>Export PDF</span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>


        </div>

        <div class="pt-8 flex gap-x-5">


            <div class="w-full space-y-4">
                <div class="w-full bg-card rounded-lg  max-h-[780px] overflow-auto">
                    <table class="w-full w-[1380px]">
                        <thead class="sticky top-0 z-[1]">
                            <tr class="bg-badge text-gray-300 h-12">
                                <th class="w-12 text-center sticky left-0 bg-badge">No</th>
                                <th class="w-klinik px-2 sticky left-10 bg-badge">Klinik</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jum'at</th>
                                <th>Sabtu</th>
                                <th>Minggu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @inject('hari', 'App\Models\Hari')
                            @foreach ($jadwal as $i => $item)
                                <tr class="bg-icon text-white h-10">
                                    <td class="w-no text-center sticky left-0 bg-icon">{{ $i + 1 }}</td>
                                    <td class="w-klinik px-2 sticky left-10 bg-icon">{{ $item->nama }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach ($item->mPegawai as $dt)
                                    <tr class="bg-slate-300 text-black h-8">
                                        <td class="w-no text-center sticky left-0 bg-slate-300"></td>
                                        <td class="w-klinik px-2 w-[180px] sticky left-10 bg-slate-300">{{ $dt->nama }}</td>
                                        @foreach ($hari->getJadwal($dt['id'])->get() as $dt)
                                            <td class="text-center">
                                                {{ $dt->jam_masuk ? $dt->jam_masuk . ' - ' . $dt->jam_pulang : '' }}
                                            </td>
                                        @endforeach
                                @endforeach
                            @endforeach


                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
        {{-- modal --}}
        <x-modal.message />
        <x-modal.delete />
        <x-modal.manage-jadwal :dokter="$dokter" :hari="$haris"/>
    </div>
</x-layouts.extend>

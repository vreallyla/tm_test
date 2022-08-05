@props(['page'])

<nav>
    <ul class="flex w-full">
        {{-- POLI --}}
        <x-buttons.menu title="Poli" :active="$page == 'poli'" url="{{route('poli.index')}}">
            <x-slot:icon>
                <svg class="h-6 w-6 {{ $page == 'poli' ? 'text-white' : 'text-icon group-hover:text-white' }}"
                    stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em"
                    width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m12.223 11.641-.223.22-.224-.22a2.224 2.224 0 0 0-3.125 0 2.13 2.13 0 0 0 0 3.07L12 18l3.349-3.289a2.13 2.13 0 0 0 0-3.07 2.225 2.225 0 0 0-3.126 0z">
                    </path>
                    <path
                        d="m21.707 11.293-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707zM18.001 20H6v-9.585l6-6 6 6V15l.001 5z">
                    </path>
                </svg>
            </x-slot:icon>
        </x-buttons.menu>

        {{-- PEGAWAI --}}
        <x-buttons.menu title="Pegawai" :active="$page == 'pegawai'" url="{{route('pegawai.index')}}">
            <x-slot:icon>

                <svg class="{{ $page == 'pegawai' ? 'text-white' : 'text-icon group-hover:text-white' }} h-6 w-6 group-hover:text-white"
                    stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em"
                    width="1em" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M7.39 16.539a8 8 0 1 1 9.221 0l2.083 4.76a.5.5 0 0 1-.459.701H5.765a.5.5 0 0 1-.459-.7l2.083-4.761zm6.735-.693l1.332-.941a6 6 0 1 0-6.913 0l1.331.941L8.058 20h7.884l-1.817-4.154zM8.119 10.97l1.94-.485a2 2 0 0 0 3.882 0l1.94.485a4.002 4.002 0 0 1-7.762 0z">
                        </path>
                    </g>
                </svg>
            </x-slot:icon>
        </x-buttons.menu>
        {{-- JADWAL --}}
        <x-buttons.menu title="Jadwal" :active="$page == 'jadwal'" url="{{route('jadwal.index')}}">
            <x-slot:icon>
                <svg class="{{ $page == 'jadwal' ? 'text-white' : 'text-icon group-hover:text-white' }} h-6 w-6 group-hover:text-white"
                    stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em"
                    width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z">
                    </path>
                    <path
                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z">
                    </path>
                </svg>
            </x-slot:icon>
        </x-buttons.menu>

    </ul>
</nav>

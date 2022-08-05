@props(['dokter' => [], 'hari' => []])
<div x-data="{}">

    <div id="manageJadwalModal" tabindex="-1" x-show="openUpdate"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
        aria-modal="true" role="dialog" style="
        background-color: #5153659c;
        display:none;
    ">
        <div class="relative p-4 w-full max-w-sm h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-canvas rounded-lg shadow dark:bg-gray-700">


                <!-- Modal body -->
                <form class="py-12 px-6 flex flex-col items-center text-white" action="{{route('jadwal.store')}}" method="POST">
                    <div class="grid grid-cols-2 gap-2">
@csrf
                        {{-- PEGAWAI --}}
                        <x-forms.select :required="true" name="m_pegawai_id" label="Pilih Dokter" :opts="$dokter"
                            value="{{ isset($detail) ? $detail->m_pegawai_id : '' }}" />
                        {{-- HARI --}}
                        <x-forms.select :required="true" name="hari_id" label="Pilih Hari" :opts="$hari"
                            value="{{ isset($detail) ? $detail->hari_id : '' }}" />
                        {{-- jam_masuk --}}
                        <x-forms.input type="time" :required="true" name="jam_masuk" label="Waktu Mulai"
                            value="{{ isset($detail) ? $detail->jam_masuk : '' }}" />
                        {{-- jam_pulang --}}
                        <x-forms.input type="time" :required="true" name="jam_pulang" label="Waktu Selesai"
                            value="{{ isset($detail) ? $detail->jam_pulang : '' }}" />
                    </div>
                    <div class="w-full">
                        <button type="submit"
                            class="bg-sky-500 hover:bg-sky-600 text-sky-100 hover:text-badge rounded-lg w-full py-2 mt-4">Simpan</button>
                        <button type="button" @click="openUpdate=false"
                            class="bg-slate-200 hover:bg-slate-300 text-slate-500 hover:text-slate-600 rounded-lg w-full py-2 mt-4">Kembali</button>
                    </div>
                </form>
                <div id="loaded-jadwal"
                    class="hidden absolute inset-0 bg-slate-100 opacity-50 flex items-center justify-center rounded-lg">
                    <svg class="animate-spin text-3xl" stroke="currentColor" fill="currentColor" stroke-width="0"
                        viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M512 1024c-69.1 0-136.2-13.5-199.3-40.2C251.7 958 197 921 150 874c-47-47-84-101.7-109.8-162.7C13.5 648.2 0 581.1 0 512c0-19.9 16.1-36 36-36s36 16.1 36 36c0 59.4 11.6 117 34.6 171.3 22.2 52.4 53.9 99.5 94.3 139.9 40.4 40.4 87.5 72.2 139.9 94.3C395 940.4 452.6 952 512 952c59.4 0 117-11.6 171.3-34.6 52.4-22.2 99.5-53.9 139.9-94.3 40.4-40.4 72.2-87.5 94.3-139.9C940.4 629 952 571.4 952 512c0-59.4-11.6-117-34.6-171.3a440.45 440.45 0 0 0-94.3-139.9 437.71 437.71 0 0 0-139.9-94.3C629 83.6 571.4 72 512 72c-19.9 0-36-16.1-36-36s16.1-36 36-36c69.1 0 136.2 13.5 199.3 40.2C772.3 66 827 103 874 150c47 47 83.9 101.8 109.7 162.7 26.7 63.1 40.2 130.2 40.2 199.3s-13.5 136.2-40.2 199.3C958 772.3 921 827 874 874c-47 47-101.8 83.9-162.7 109.7-63.1 26.8-130.2 40.3-199.3 40.3z">
                        </path>
                    </svg>

                </div>

            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const pegawai = document.querySelector('#m_pegawai_id');
        const hari = document.querySelector('#hari_id');
        const loading = document.querySelector('#loaded-jadwal');
        const jamMasuk = document.querySelector('#jam_masuk');
        const jamKeluar = document.querySelector('#jam_pulang');
        const fn = () => {
            const pegawaiVal = pegawai.value;
            const hariVal = hari.value;

            if (pegawaiVal && hariVal) {
                if (loading) {

                    loading.style.display = 'flex';
                }
                fetch('{{ route('jadwal.check') }}' + `?m_pegawai_id=${pegawaiVal}&hari_id=${hariVal}`)
                    .then((response) => response.json())
                    .then((data) => {
                        const masuk = data.jam_masuk;
                        const keluar = data.jam_pulang;

                        jamMasuk.value = masuk ? masuk.substr(0,5) : ''
                        jamKeluar.value = keluar ? keluar.substr(0,5) : ''

                        if (loading) {

                            loading.style.display = 'none';
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            }
        }

        if (pegawai)
            pegawai.addEventListener('change', fn)

        if (hari)
            hari.addEventListener('change', fn)
    });
</script>

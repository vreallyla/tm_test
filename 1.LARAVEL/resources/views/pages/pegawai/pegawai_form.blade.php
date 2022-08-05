@if (isset($detail) || isset($add))
    <div class="w-1/2">
        <div class="bg-card rounded-lg w-full px-4 py-6">
            {{-- title --}}
            <div>
                <h4 class="text-2xl font-semibold">
                    {{ isset($detail) ? 'Ubah' : 'Tambah' }} Pegawai</h4>
            </div>


            {{-- form --}}
            <form class="pt-4 space-y-3" method="post" enctype='multipart/form-data'
                action="{{ isset($detail) ? route('pegawai.update', ['pegawai' => $detail->no_pegawai]) : route('pegawai.store') }}">
                @csrf
                @method(isset($detail) ? 'PUT' : 'POST')

                {{-- NO_PEGAWAI --}}
                <x-forms.input name="no_pegawai" label="No. Pegawai" :disabled="true"
                    value="{{ isset($detail->no_pegawai) ? $detail->no_pegawai : '' }}" />

                {{-- SIP --}}
                <x-forms.input name="sip" label="SIP" :required="true"
                    value="{{ isset($detail->sip) ? $detail->sip : '' }}" />


                {{-- NAMA --}}
                <x-forms.input name="nama" label="Nama" :required="true"
                    value="{{ isset($detail->nama) ? $detail->nama : '' }}" />


                {{-- JENIS_KELAMIN --}}
                <x-forms.select name="jenis_kelamin" label="Jenis Kelamin" :opts="$jk_opt" :required="true"
                    value="{{ isset($detail->jenis_kelamin) ? $detail->jenis_kelamin : '' }}" />

                {{-- JOB_DESC --}}
                <x-forms.select name="job_desc_id" label="Jobdesc" :opts="$jobdesc" :required="true"
                    value="{{ isset($detail->kode_job_desc) ? $detail->kode_job_desc : '' }}" />

                {{-- POLI --}}
                <x-forms.select name="m_poli_id" label="Poli" :opts="$poli" :required="true"
                    value="{{ isset($detail->kode_poli) ? $detail->kode_poli : '' }}" />

                {{-- PHOTO --}}
                <x-forms.input name="photo" label="Photo" type="file" />

                {{-- ALAMAT --}}
                <x-forms.textarea name="alamat" label="Alamat" value="{{isset($detail->alamat)?$detail->alamat:''}}" />

                <div class="flex gap-x-3">
                    <button class="mt-4 bg-teal-500 py-2 w-1/2 rounded-lg"
                        type="submit">{{ isset($detail) ? 'Ubah' : 'Tambah' }}</button>
                    <a href="{{ route('pegawai.index') }}"
                        class="mt-4 bg-badge py-2 w-1/2 rounded-lg text-center">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endif

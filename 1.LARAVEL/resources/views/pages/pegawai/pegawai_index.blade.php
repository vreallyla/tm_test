<x-layouts.extend title="Pengaturan" page="pegawai">
    <div x-data="{ deleteName: null, deleteCode: null }">
        <div class="pt-8 flex gap-x-5">

            {{-- MENU --}}
            <div class="w-1/3 space-y-4">
                @include('pages.pegawai.pegawai_menu')
            </div>

            <div class="w-2/3 flex gap-x-5 text-white">
                <div
                    class="grid grid {{ isset($detail) || isset($add) ? 'grid-cols-1 w-1/2' : 'grid-cols-2 w-full' }} gap-6">

                    {{-- CARD DATA --}}
                    @each('pages.pegawai.pegawai_card', $pegawai, 'dt', 'components.cards.empty')
                </div>

                {{-- FORM --}}
                @include('pages.pegawai.pegawai_form')
            </div>
        </div>
        {{-- modal --}}
        <x-modal.message />
        <x-modal.delete path="{{route('pegawai.index')}}" />
    </div>
</x-layouts.extend>

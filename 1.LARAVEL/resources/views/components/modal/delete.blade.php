@props(['path'=>route('poli.index')])
<div x-data="{ path: '{{ $path }}' }">

    <div id="DeleteModal" tabindex="-1" x-show="deleteName"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
        aria-modal="true" role="dialog" style="
        background-color: #5153659c;
        display:none;
    ">
        <div class="relative p-4 w-full max-w-sm h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-canvas rounded-lg shadow dark:bg-gray-700">


                <!-- Modal body -->
                <div class="py-12 px-6 flex flex-col items-center">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em"
                        width="1em" xmlns="http://www.w3.org/2000/svg"
                        class="text-7xl text-icon animate-pulse mx-auto mb-2">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                        </path>
                    </svg>

                    <p class="text-base text-gray-500 text-center text-lg">Yakin untuk hapus data <span
                            x-text="deleteName"></span></p>
                    <div class="flex mx-auto gap-x-3">
                        <button @click="document.querySelector('#DeleteModal form').submit()"
                            class="bg-card hover:bg-icon text-gray-500 hover:text-badge rounded-lg w-16 py-2 mt-4"
                            type="button">YA</button>
                        <button @click="deleteName=null;deleteCode:null;"
                            class="bg-card hover:bg-icon text-gray-500 hover:text-badge rounded-lg w-16 py-2 mt-4"
                            type="button">TIDAK</button>
                    </div>
                </div>

                <form :action="path + '/' + deleteCode" method="post">
                    @csrf
                    @method('delete')
                </form>

            </div>
        </div>
    </div>
</div>

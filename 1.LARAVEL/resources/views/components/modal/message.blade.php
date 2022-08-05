<div x-data="{ open: {{ session('status') ? 'true' : 'false' }} }" x-init="setTimeout(() => { open = false }, 2000)">

    <div id="MessageModal" tabindex="-1" x-show="open"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
        aria-modal="true" role="dialog" style="
        background-color: #5153659c;
        display:none;
    ">
        <div class="relative p-4 w-full max-w-sm h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-canvas rounded-lg shadow dark:bg-gray-700">


                <!-- Modal body -->
                <div class="py-12 px-6 flex flex-col items-center"><svg stroke="currentColor" fill="currentColor"
                        stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em"
                        xmlns="http://www.w3.org/2000/svg" class="text-7xl text-icon animate-pulse mx-auto mb-2">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                        </path>
                    </svg>

                    <h4 class="text-base leading-relaxed text-gray-500 text-center text-3xl">Berhasil</h4>
                    <p class="text-base text-gray-500 text-center text-lg">{{ session('status') }}</p>
                    <button @click="open=false"
                        class="bg-card hover:bg-icon text-gray-500 hover:text-badge rounded-lg w-16 py-2 mt-4"
                        type="button">OK</button>
                </div>

            </div>
        </div>
    </div>
</div>

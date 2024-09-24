<div class="max-w-xl mx-auto">

    {{-- header --}}
    <header class="flex items-center gap-3">

        <x-avatar src="https://loremflickr.com/200/200?random" alt="User Avatar" class="w-12 h-12" />
        <div class="w-full gap-2 grid-grid-cols-7">
            <h5 class="text-sm font-semibold truncate"> {{ fake()->name }}</h5>
        </div>
        <div class="flex justify-end col-span-2 text-right">
            <button class="ml-auto text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path
                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                </svg>
            </button>
        </div>

    </header>


    {{-- main --}}
    <main>
        <div class="my-2">
            <x-video />
        </div>
    </main>



    {{-- footer --}}
    <footer>

    </footer>
</div>

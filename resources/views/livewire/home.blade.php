<div x-data="{

    canLoadMore: @entangle('canLoadMore')

}"
    @scroll.window.trottle="

scrollTop= window.scrollY ||window.scrollTop;
divHeight= window.innerHeight||document.documentElement.clientHeight;
scrollHeight = document.documentElement.scrollHeight;


isScrolled= scrollTop+ divHeight >= scrollHeight-1;

{{-- Check if user can load more  --}}

if(isScrolled && canLoadMore){

  @this.loadMore();
}


"
    class="w-full h-full">

    {{-- Header --}}
    <header class="sticky top-0 z-50 p-2 mb-2 bg-white md:hidden">

        <div class="grid items-center grid-cols-12 gap-2">

            <div class="col-span-3">

                <img src="{{ asset('assets/images/logo.png') }}" class="w-full h-12 max-w-lg" alt="logo">

            </div>

            <div class="flex justify-center col-span-8 px-2">

                <input type="text" placeholder="Search"
                    class="w-full bg-gray-100 border-0 rounded-lg outline-none focus:outline-none focus:ring-0 hover:ring-0">

            </div>

            <div class="flex justify-center col-span-1">

                <a href="#">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>

                    </span>
                </a>

            </div>


        </div>

    </header>


    {{-- main --}}
    <main class="grid gap-8 lg:grid-cols-12 md:mt-10">

        <aside class="overflow-hidden lg:col-span-8">

            {{-- Stories --}}
            <section>
                <ul class="flex items-center gap-2 overflow-x-auto scrollbar-hide">
                    @for ($i = 0; $i < 10; $i++)
                        <li class="flex flex-col justify-center w-20 gap-1 p-2">
                            <x-avatar src="https://loremflickr.com/200/200?random={{ $i }}" alt="User Avatar"
                                class="h-14 w-14" />
                            <p class="text-xs font-medium truncate">{{ fake()->name }}</p>
                        </li>
                    @endfor
                </ul>
            </section>


            {{-- Posts --}}
            <section class="p-2 mt-5 space-y-4">

                @if ($posts)

                    @foreach ($posts->take(10) as $post)
                        <livewire:post.item :post="$post" wire:key="post-{{ $post->id }}" />
                    @endforeach
                @else
                    <p class="flex justify-center foont-bold">
                        No posts yet.
                    </p>
                @endif

            </section>
        </aside>


        <aside class="hidden p-4 lg:col-span-4 lg:block">
            <div class="flex items-center gap-2">
                <x-avatar src="https://loremflickr.com/200/200?random" class="w-12 h-12" />
                <h4 class="font-medium">
                    {{ auth()->user()->name }}
                </h4>
            </div>


            {{-- Suggestions --}}
            <section class="mt-4">
                <h4 class="font-bold text-gray-700">Suggestions for you</h4>
                <ul class="my-3 space-y-3">
                    @for ($i = 0; $i < 5; $i++)
                        <li class="flex items-center gap-3">
                            <x-avatar src="https://loremflickr.com/200/200?random={{ $i }}"
                                class="w-12 h-12" />

                            <div class="grid w-full grid-cols-7 gap-2">

                                <div class="col-span-5">
                                    <h5 class="text-sm font-semibold truncate">{{ fake()->name }}</h5>
                                    <p class="text-xs truncate"> Followed by {{ fake()->name }}</p>
                                </div>

                                <div class="justify-end col-span-2 text-right lex">

                                    <button class="ml-auto text-sm font-bold text-blue-500">Follow</button>

                                </div>

                            </div>
                        </li>
                    @endfor
                </ul>

            </section>

            {{-- App Links --}}
            <section class="mt-12">
                <ol class="flex flex-wrap gap-1 text-sm list-none">
                    <li class="font-medium text-gray-500">
                        <a href="#" class="hover:underline">About</a>
                    </li>
                    <li class="font-medium text-gray-500">
                        <span class="mx-1">•</span>
                        <a href="#" class="hover:underline">Services</a>
                    </li>
                    <li class="font-medium text-gray-500">
                        <span class="mx-1">•</span>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                    <li class="font-medium text-gray-500">
                        <span class="mx-1">•</span>
                        <a href="#" class="hover:underline">Help</a>
                    </li>
                    <li class="font-medium text-gray-500">
                        <span class="mx-1">•</span>
                        <a href="#" class="hover:underline">Privacy</a>
                    </li>
                </ol>

                <div class="flex items-start my-4">
                    <h5 class="text-sm font-bold text-gray-700 uppercase">© 2024 instagram from meta</h5>
                </div>




            </section>


        </aside>

    </main>


</div>

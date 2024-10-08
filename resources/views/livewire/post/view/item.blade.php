<div class="grid w-full h-full gap-3 overflow-hidden lg:grid-cols-12">

    <aside class="items-center hidden w-full m-auto overflow-scroll scrollbar-hide lg:flex lg:col-span-7">

        <div
            class="relative flex overflow-x-scroll overscroll-contain w-[500px] selection:snap-x snap-mandatory gap-2 px-2">

            @foreach ($post->media as $key => $file)
                <div class="w-full h-full snap-always shrink-0 snap-center ">
                    @switch($file->mime)
                        @case('video')
                            <x-video source="{{ $file->url }}" />
                        @break

                        @case('image')
                            <img src="{{ $file->url }}" alt="Image" class="block object-scale-down w-full h-full">
                        @break

                        @default
                    @endswitch

                </div>
            @endforeach
        </div>


    </aside>

    <aside class="relative flex flex-col h-full gap-4 overflow-hidden overflow-y-scroll lg:col-span-5 scrollbar-hide">

        <header class="sticky top-0 z-10 flex items-center gap-3 py-2 bg-white border-b ">

            <x-avatar src="https://loremflickr.com/200/200?random=1" alt="User Avatar" class="w-10 h-10" />

            <div class="grid w-full grid-cols-7 gap-2">

                <div class="col-span-5 ">

                    <h5 class="text-sm font-semibold truncate "></h5>

                </div>

                <div class="flex justify-end col-span-2 text-right">
                    <button wire:click="$dispatch('closeModal')" type="button" class="font-bold"> X </button>
                </div>

            </div>

        </header>

        <main>
            <section class="flex flex-col gap-2">

                {{-- comments --}}
                <div class="flex items-center gap-3 py-2">
                    <x-avatar src="https://loremflickr.com/200/200?random" alt="User Avatar" class="mb-auto w-9 h-9" />

                    <div class="grid w-full grid-cols-7 gap-2 ">
                        {{-- comments --}}
                        <div class="flex flex-wrap col-span-6 text-sm ">
                            <p>
                                <span class="text-sm font-bold ">
                                    {{ $post->user->name }}
                                </span>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae laborum tenetur
                                quidem.
                            </p>
                        </div>

                        {{-- likes --}}
                        <div class="flex justify-end col-span-1 mb-auto text-right">
                            <button class="ml-auto text-sm font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </button>

                        </div>

                        {{-- footer --}}
                        <div class="flex items-center col-span-7 gap-2 text-sm text-gray-700 ">
                            <span>2d</span>
                            <span class="font-bold"> {{ $post->comments->count() }} </span>
                            <span class="font-semibold">Reply</span>
                        </div>
                    </div>


                </div>

                {{-- replies --}}
                <div class="flex items-center w-11/12 gap-3 py-2 ml-auto">
                    <x-avatar src="https://loremflickr.com/200/200?random" alt="User Avatar" class="w-8 h-8 mb-auto" />

                    <div class="grid w-full grid-cols-7 gap-2 ">
                        {{-- comments --}}
                        <div class="flex flex-wrap col-span-6 text-sm ">
                            <p>
                                <span class="text-sm font-bold ">
                                    {{ $post->user->name }}
                                </span>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae laborum tenetur
                                quidem.
                            </p>
                        </div>

                        {{-- likes --}}
                        <div class="flex justify-end col-span-1 mb-auto text-right">
                            <button class="ml-auto text-sm font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </button>

                        </div>

                        {{-- footer --}}
                        <div class="flex items-center col-span-7 gap-2 text-sm text-gray-700 ">
                            <span>2d</span>
                            <span class="font-bold"> {{ $post->comments->count() }} </span>
                            <span class="font-semibold">Reply</span>
                        </div>
                    </div>


                </div>

            </section>
        </main>


        <footer class="sticky z-10 mt-auto bg-white border-t bottom-7">
            <div class="flex items-center gap-4 my-2">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>
                </span>

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                    </svg>
                </span>

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-5 h-5 bi bi-send" viewBox="0 0 16 16">
                        <path
                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                    </svg>
                </span>

                <span class="ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                </span>
            </div>


            {{-- likes and views --}}
            <p class="text-sm font-bold"> 104 likes</p>

            {{-- name and comment --}}
            <div class="flex gap-2 text-sm font-medium">
                <p><strong class="font-extrabold">{{ $post->user->name }}</strong>
                    {{ $post->description }}</p>
            </div>


            {{-- view post modal --}}
            <button
                onclick="Livewire.dispatch('openModal',{component:'post.view.modal',arguments:{'post':{{ $post->id }}}})"
                class="text-sm font-medium text-slate-500">View all 456 comments</button>

            {{-- add comment --}}
            <form x-data="{ inputText: '' }" class="grid items-center w-full grid-cols-12">
                @csrf
                <input x-model="inputText" type="text" placeholder="Leave a comment"
                    class="col-span-10 px-0 border-0 rounded-lg outline-none placeholder:text-sm focus:outline-none hover:ring-0 focus:ring-0">
                <div class="flex justify-end col-span-1 ml-auto text-right ">
                    <button x-cloak x-show="inputText.length>0"
                        class="flex justify-end text-sm font-semibold text-blue-500">
                        Post
                    </button>
                </div>

                <span class="col-span-1 ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
                    </svg>
                </span>
            </form>
        </footer>

    </aside>

</div>

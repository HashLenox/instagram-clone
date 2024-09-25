<div class="bg-white lg:h-[600px] flex flex-col border gap-y-4 px-5">



    <header class="w-full px-2 py-4 border-b">
        <div class="flex justify-between ">
            <button wire:click="$dispatch('closeModal')" class="font-bold ">
                X
            </button>

            <div class="font-bold text-large">
                Create a New Post
            </div>

            <button @disabled(count($media) == 0) wire:loading.attr='disabled' wire:click='submit'
                class="font-bold text-blue-500 ">
                Share
            </button>
        </div>
    </header>

    <main class="grid w-full h-full grid-cols-12 gap-3 ">


        {{-- Media Adding --}}
        <aside class="items-center w-full m-auto lg:col-span-7 ">

            @if (count($media) == 0)
                {{-- button --}}
                <label for="customFileInput" class="flex flex-col gap-3 m-auto cursor-pointer max-w-fit ">
                    <input wire:model.live='media' id="customFileInput" type="file" multiple
                        accept=".jpg,.png,.jpeg,.mp4" class="sr-only">

                    <span class="m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-14">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </span>

                    <span class="p-2 px-4 text-sm text-white bg-blue-500 rounded-lg">
                        Upload files from Computer
                    </span>

                </label>
            @else
                <div class="flex w-full gap-2 px-2 overflow-x-auto h-96 snap-x snap-mandatory ">
                    @foreach ($media as $key => $file)
                        <div class="w-full h-full snap-always shrink-0 snap-center ">
                            @if (strpos($file->getMimeType(), 'image') !== false)
                                <img src="{{ $file->temporaryUrl() }}" alt=""
                                    class="object-contain w-full h-full">
                            @elseif (strpos($file->getMimeType(), 'video') !== false)
                                <x-video :source="$file->temporaryUrl()" />
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </aside>


        {{-- Post details Adding --}}
        <aside class="flex flex-col h-full gap-4 p-8 overflow-hidden border-l lg:col-span-5 ">
            <div class="flex items-center gap-2">
                <x-avatar class=" w-9 h-9" />
                <h5 class="font-bold"> {{ fake()->name }}</h5>
            </div>

            <div>
                <textarea wire:model='description' cols="30" rows="10"
                    class="w-full h-32 px-0 bg-white border-0 rounded-lg focus:border-0 focus:outline-none focus:ring-0"
                    placeholder="Add a Caption"></textarea>
            </div>

            <div class="items-center w-full">
                <input wire:model='location' type="text" placeholder="Add location"
                    class="w-full px-0 bg-white border-0 rounded-lg focus:border-0 focus:outline-none focus:ring-0">
            </div>

            {{-- Advanced settings --}}
            <div>
                <h6 class="mb-2 text-base font-medium text-gray-500"> Advanced Setting </h6>
                <ul>
                    <li>
                        <div class="flex items-center justify-between gap-3">
                            <span>Hide like and view counts on this post</span>
                            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                                <input wire:model='hide_like_view' type="checkbox" value="" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center justify-between gap-3">
                            <span>Allow commenting </span>
                            <label class="relative inline-flex items-center mb-5 cursor-pointer">
                                <input wire:model='allow_commenting' type="checkbox" value=""
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
    </main>

</div>

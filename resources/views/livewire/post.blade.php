<div>
    <x-navigations :activeItem=3 :key=3 />
    {{-- <livewire:components.test> --}}
        <div>
            <div class="justify-center flex mt-2 ">
                <div
                    class="w-8/12 bg-slate-50 dark:bg-slate-700 dark:border-slate-900 dark:text-white dark:shadow-slate-900 rounded shadow border p-3">
                    @auth
                    <form wire:submit.prevent='store' class="mb-4">
                        @csrf
                        <div class="mb-4">
                            {{-- <label for="body" class="sr-only">Body</label> --}}
                            <textarea name="body" wire:model='body' cols="30" rows="4"
                                class="bg-slate-200 dark:bg-slate-600 border-2 border-transparent shadow-slate-700 shadow dark:shadow-slate-900
                            dark:placeholder-slate-200 dark:text-slate-50 rounded-lg w-full p-4 @error('body') border-red-500 @enderror"
                                placeholder="Post something interesting !"></textarea>
                            @error('body')
                            <div class="text-red-500  mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                            @error('image')
                            <div class="text-red-500  mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                            
                            {{-- <div wire:loading wire:target="image">Uploading...</div> --}}
                        </div>
                        <div class="flex">
                            <button type="submit"
                                class="bg-primary-600  shadow-gray-400 dark:shadow-gray-800 hover:bg-main-400 shadow-lg  text-white px-4 py-2 rounded-lg font-medium">
                                Post
                            </button type='submit'>
                            <label type='submit'
                                class="cursor-pointer bg-primary-600 ml-2 shadow-gray-400 dark:shadow-gray-800 hover:bg-main-400 shadow-lg  text-white px-4 py-2 rounded-lg font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input id="image" name="image" wire:model='image' type="file" class="hidden" />
                            </label>
                        </div>

                    </form>
                    {{-- <button wire:click='$refresh'>
                        {{-- refresh --}}
                    {{-- </button> --}} 
                   
                    <div class="text-center">
                        <div wire:loading wire:target="image">
                            <svg class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-pink-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>

                    @if ($image)
                    <div class="flex justify-center">
                        {{-- <img class="mt-2 w-52" src="{{ $image->temporaryUrl() }}"> --}}
                        {{-- {{pathinfo(storage_path( $image->temporaryUrl() ), PATHINFO_EXTENSION)}} --}}
                        @if ( $image->extension() != 'mp4')
                            <img class="mt-2 w-52" src="{{ $image->temporaryUrl() }}">
                        @else
                        {{-- <div>    --}}
                            <iframe class="aspect-w-11" allowfullscreen src="{{ $image->temporaryUrl() }}" frameborder="0"></iframe>
                        {{-- </div> --}}
                        @endif
                        {{-- <iframe class="mt-2 w-52" src="{{ $image->temporaryUrl() }}" frameborder="0"></iframe> --}}
                        {{-- <i class="fas ml-5 fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click='removeTemp'>x</i> --}}
                        <button class="ml-1 mt-2  dark:bg-slate-400 rounded-tr-2xl rounded-br-2xl text-white hover:dark:text-gray-300 hover:dark:bg-slate-500 cursor-pointer" wire:click='removeTemp' >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    @endif

                    @endauth

                    <x-dialog />

                    
                    <x-notifications position='top-center' />
                    @if ($posts->count())
                    @foreach ($posts as $post)
                    {{-- <livewire:components.post :post='$post' :wire:key='$post->id'> --}}
                        @livewire('components.post', ['post' => $post, 'name' => $name], key($post->id))

                    @endforeach
                    @endif
                </div>
            </div>
        </div>
</div>
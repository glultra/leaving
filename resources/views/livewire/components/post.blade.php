<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <a href="#" class="font-bold text-blue-400 dark:text-blue-300">{{ $post->user->name }}</a>


    <span class="mb-2"> {{ $post->created_at->diffForHumans() }}</span>
    <div class="mt-4 mb-4 ">
        <div x-data="{ open : false }" class="p-2 shadow dark:shadow-slate-900 rounded ">
            <div x-show="!open" class="flex items-center">

                {{-- <div class="text-center ">
                    <div wire:loading wire:target="body">
                        <svg class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-pink-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div> --}}
                <div class=" flex-auto w-52 ">
                    
                    {{ $post->body }}
                </div>
                @can('delete', $post)
                <button type="button"
                    class="text-white mr-5 btn  px-4 py-2 font-medium rounded"
                    @click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="black" class="w-6 h-6">
                        <path class="dark:fill-slate-50" d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                      </svg>
                      
                    </button>
                <button class="mr-3 px-4 py-2  rounded" wire:click="checkForDeletion" name="button-{{$post->id}}">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" class="fill-black dark:fill-slate-50"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                @endcan

               
            </div>

            <div class="text-center">
                <div wire:loading wire:target="image">
                    <svg class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-pink-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image); }}" class="aspect-w-3"/>
            @endif

            <!-- container after clicked "EDIT" -->
            <div x-show="open" class="flex justify-between items-center">
                <input type="text"
                    class="w-full bg-white dark:bg-slate-600 rounded p-2 mr-4 border focus:outline-none focus:border-blue-500"
                    wire:model='newBody'>

                <div class="flex justify-center items-center space-x-2">
                    <button type="button" @click="open = false"
                        class="btn bg-red-400 hover:bg-red-500 px-4 py-2 font-medium rounded">
                        Cancel
                    </button>
                    <button type="button" wire:click="editText"  @click="open = false"
                        class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 font-medium rounded">
                        Save
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
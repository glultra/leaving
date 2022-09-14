<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <a href="#" class="font-bold text-blue-400 dark:text-blue-300">{{ $post->user->name }}</a>


    <span class="mb-2"> {{ $post->created_at->diffForHumans() }}</span>
    <div class="mt-4 mb-4 grid-flow-col grid-rows-1 grid-cols-2 grid">
        <div class="row-span-6 col-span-full ">
            {{ $post->body }}
        </div>
        <div class="">
            {{-- {{dd($post)}} --}}
            {{-- @can('delete', Post$post) --}}
            @if (auth()->user() == $post->user)
            <button wire:click="checkForDeletion({{$post->id}})" name="button-{{$post->id}}">
                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" class="fill-black dark:fill-red-400"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            @endif
        </div>
    </div>
</div>
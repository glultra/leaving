<div>
    {{-- Stop trying to control. --}}
    <x-navigations :activeItem=4 :key=4 />
        <ul class="list-group px-3 w-10/12 mx-auto mt-3 container-fluid text-white">
            @foreach ($users as $user)
            <li class="list-group-item text-black shadow-lg border dark:border-0 rounded p-2 dark:shadow-lg dark:shadow-black rounded-t-lg text-center cursor-pointer list-group-item-action mt-3 dark:bg-slate-800 dark:text-white" wire:click='checkconversation({{$user->id}})'>
                {{$user->name}}
            </li>
            @endforeach
        </ul>
</div>
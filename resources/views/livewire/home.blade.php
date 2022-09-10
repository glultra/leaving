<x-navigations />

<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="justify-center flex mt-2 ">
        <div class="w-8/12 dark:bg-slate-700 dark:border-slate-900 dark:text-white dark:shadow-slate-900 rounded shadow border p-3">
            @auth
                You're already signed up
            @endauth
            @guest
                You're guest sir
            @endguest
        </div>
    </div>
</div>

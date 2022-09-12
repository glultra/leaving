<div>
    <x-navigations :activeItem=2/>
    <x-notifications position="top-center" />

    <div>
        {{-- Because she competes with no one, no one can compete with her. --}}
        <div class="justify-center flex mt-2">
            <div class="w-8/12 dark:bg-slate-700 dark:border-slate-900 dark:text-white dark:shadow-slate-900 rounded shadow border p-3">
                You're at dashboard man.
            </div>
        </div>
    </div>
    @if (Session::has('test'))
    <div  x-data  
    x-init="
        window.$wireui.notify({
            title: 'Logged in!',
            description: 'Your account was successfully logged in.',
            icon: 'success'
        });
        ">
        {{ Session::forget('test') }}
    </div>
    @endif
</div>
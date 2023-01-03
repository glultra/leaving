<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8"> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social livewire</title>

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite('resources/js/bootstrap.js')
    @vite('resources/css/app.css')
    @livewireStyles
    @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- @vite('resources/js/app.js') --}}
    {{-- <wireui:scripts /> --}}

    {{-- <wireui:scripts /> --}}
    
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    

</head>

<body class="dark:bg-slate-800"> 
    {{-- <x-notifications position="top -center" /> --}}
    {{-- <x-notifications /> --}}
        {{ $slot }}
        
    {{-- <script type="module">
        import hotwiredTurbo from "https://cdn.skypack.dev/@hotwired/turbo"
    </script>
    <script  src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
    data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}

   
    <script>
        // window.livewire.on('redirect', url => Turbo.visit(url));
    </script>


    @livewireScripts

</body>

</html>
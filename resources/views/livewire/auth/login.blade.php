{{-- @section('script') --}}
{{-- @endsection --}}

<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{-- <div class="justify-center flex mt-2">
        <div class="w-8/12 dark:bg-gray-800 rounded shadow border p-3">
            From Login
        </div>
    </div> --}}
    <x-notifications position="top-right" />

    <div>
        <section class="bg-gray-50 dark:bg-gray-900">
            <a href=" {{ route('home') }} " class="m-3 fixed">
                <svg class="w-9 h-9 ml-5  dark:fill-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <div class="flex flex-col items-center justify-center px-6 py-6 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                    Flowbite    
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        {{-- @if (session()->has('message')) 
                            <div id="alert-border-2" class="flex p-4 mb-4 bg-red-100 border-t-4 border-red-500 dark:bg-red-200" role="alert">
                                <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <div class="ml-3 text-sm font-medium text-red-700">
                                    {{session('message')}}
                                </div>
                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 dark:bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:hover:bg-red-300 inline-flex h-8 w-8"  data-dismiss-target="#alert-border-2" aria-label="Close">
                                    <span class="sr-only">Dismiss</span>
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <script>
                                    function closeAlert(event){
                                        // #alert-border-2
                                        let element = event.target;
                                        while(element.nodeName !== "BUTTON"){
                                            element = element.parentNode;
                                        }
                                        element.parentNode.parentNode.removeChild(element.parentNode);

                                    }
                                    setTimeout(function () {
                                        $("#alert-border-2").hide();
                                    }, 2000);
                                </script>
                            </div>
                        @endif --}}
                        
                        <form class="space-y-4 md:space-y-6" wire:submit.prevent='store'>
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" wire:model='email' name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror

                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" wire:model='password' name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                {{-- <x-inputs.password wire:model='password' name='password' label="Secret 🙈" /> --}}

                                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror

                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                      <input id="remember" wire:model='remember' aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                                    </div>
                                    <div class="ml-3 text-sm">
                                      <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                    </div>
                                </div>
                                <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                            </div>
                            <button class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet? <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                            </p>
                          
                        </form>

                        <div x-data x-init="@this.on('error', () => { 
                                window.$wireui.notify({
                                    title: 'Checkout please',
                                    description: 'Email or password must be wrong.',
                                    icon: 'error',
                                })})"> {{-- listen for events on component --}}
                        </div>

                       
                    </div>

                </div>
            </div>
            
          </section>
    </div>
    
    {{-- @push('scripts') --}}
    <script>
        // document.addEventListener("livewire:load", () => console.log(window.$wireui))
        // livewire.on('error', ()=> {
        //     alert('hello world')
        // })
        // livewire.on('error', () => {
        //     window.$wireui.notify({
        //         title: 'Checkout please',
        //         description: 'Email or password must be wrong.',
        //         icon: 'error',
                
        //     })
        // });
    </script>
    {{-- @endpush --}}
</div>
